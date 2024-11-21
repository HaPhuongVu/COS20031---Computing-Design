SET SQL_SAFE_UPDATES = 0;
-- change the random range for arrow score
select * from score;
INSERT INTO score (archerID, roundID, competitionID, time, categoryID, arrow1, arrow2, arrow3, arrow4, arrow5, arrow6, totalScore)
SELECT 
    ac.archerID AS archerID,
    -- random roundid
    FLOOR(RAND() * 42) + 1 AS roundID, 
    ac.competitionID AS competitionID,
    -- use RAND() to generate random time
    SEC_TO_TIME(FLOOR(RAND() * 86400)) AS time, -- get random time in a day
    ac.archerCatID AS categoryID,
    FLOOR(RAND() * 11)  AS arrow1, -- Random score for arrow
    FLOOR(RAND() * 11)  AS arrow2,
    FLOOR(RAND() * 11)  AS arrow3,
    FLOOR(RAND() * 11) AS arrow4,
    FLOOR(RAND() * 11) AS arrow5,
    FLOOR(RAND() * 11) AS arrow6,
    0 AS totalScore -- sum of all the arrow
FROM 
    archer_category as ac
    JOIN archer as a ON ac.archerID = a.archerID
    JOIN competition as c ON ac.competitionID = c.competitionID;
    
-- Update totalScore as the sum of arrow1 to arrow6 for each row
UPDATE score
SET totalScore = arrow1 + arrow2 + arrow3 + arrow4 + arrow5 + arrow6;

-- update score set arrow1 = 0 where scoreID = 512 ;
-- delete from score where scoreID = 513;
-- select * from score where scoreID = 517;
SELECT * FROM score where scoreID = 514;
-- WHERE totalScore = 34;

-- Insert into score (archerID, roundID, competitionID, time, categoryID, arrow1, arrow2, arrow3, arrow4, arrow5, arrow6) VALUES (1,1,1,2,1,2,3,4,5,6,7)
