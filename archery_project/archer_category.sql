select * from archer_category;
INSERT INTO archer_category (archerID, categoryID, competitionID, equipmentID)
SELECT archerID, categoryID, 
       FLOOR(RAND() * 500) + 1 AS competitionID,  -- random between 1 to 500 for competitionID
       FLOOR(RAND() * 5) + 1 AS equipmentID     -- random between 1 to 5 for equipmentID
FROM archer;
select * from archer_category;

-- change equipment that archer use 
update archer_category set equipmentID = '' where archerID = ''; 