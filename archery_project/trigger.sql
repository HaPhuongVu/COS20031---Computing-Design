-- Select * from score;
DELIMITER //

CREATE TRIGGER calculate_totalScore
BEFORE INSERT ON score
FOR EACH ROW
BEGIN
    DECLARE calculatedScore INT;
    
    -- Calculate totalScore
    SET calculatedScore = COALESCE(NEW.arrow1, 0) + COALESCE(NEW.arrow2, 0) + COALESCE(NEW.arrow3, 0) + COALESCE(NEW.arrow4, 0) + COALESCE(NEW.arrow5, 0) + COALESCE(NEW.arrow6, 0);
    
    -- Assign the calculated totalScore to the NEW row being inserted
    SET NEW.totalScore = calculatedScore;
END //

DELIMITER //

CREATE TRIGGER set_time
BEFORE INSERT ON score
FOR EACH ROW
BEGIN
    SET NEW.time = CURTIME();
END //

DELIMITER ;


-- create trigger to automatically set category based on gender and age 
DELIMITER //

CREATE TRIGGER set_category
BEFORE INSERT ON archer
FOR EACH ROW
BEGIN
    DECLARE cat_id INT;

    -- Check if the archer is female and aged 14
    IF NEW.gender = 'Female' AND NEW.age < 14 THEN
        SET cat_id = 15; 
    ELSEIF NEW.gender = 'Male' AND NEW.age < 14 THEN 
        SET cat_id = 16;
	elseif NEW.gender = 'Female' AND NEW.age < 16 THEN
        SET cat_id = 14;
    elseif NEW.gender = 'Male' AND NEW.age < 16 THEN 
        SET cat_id = 13;
	elseif NEW.gender = 'Female' AND NEW.age < 18 THEN
        SET cat_id = 12; 
    ELSEIF NEW.gender = 'Male' AND NEW.age < 18 THEN 
        SET cat_id = 11;
	ELSEIF NEW.gender = 'Female' AND NEW.age < 21 THEN
        SET cat_id = 10;
    elseif NEW.gender = 'Male' AND NEW.age < 21 THEN 
        SET cat_id = 9;
	elseif NEW.gender = 'Female' AND NEW.age >= 70 THEN
        SET cat_id = 7; 
    elseif NEW.gender = 'Male' AND NEW.age >= 70 THEN 
        SET cat_id = 8;
	elseif NEW.gender = 'Female' AND NEW.age >= 60 THEN
        SET cat_id = 5; 
    elseif NEW.gender = 'Male' AND NEW.age >= 60 THEN 
        SET cat_id = 6;
	elseif NEW.gender = 'Female' AND NEW.age >= 50 THEN
        SET cat_id = 3; 
    ELSEIF NEW.gender = 'Male' AND NEW.age >= 50 THEN 
        SET cat_id = 4;
	ELSEIF NEW.gender = 'Female' THEN
        SET cat_id = 1; 
    ELSEIF NEW.gender = 'Male' THEN 
        SET cat_id = 2;
    ELSE
        SET cat_id = NULL; -- Default categoryID (adjust as needed)
    END IF;

    -- Set the categoryID for the new archer
    SET NEW.categoryID = cat_id;
END //

DELIMITER ;
