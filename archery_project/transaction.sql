-- 1. An archery club has to record both individual and competition scores.
-- For archer who participate in a competition, enter competitionID. If not, competitionID will be null
Insert into score(archerID, roundID, competitionID, time, categoryID, arrow1, arrow2, arrow3, arrow4, arrow5, arrow6, totalScore) values ();

-- 2. Show total scores and scores for each arrow for an archer.
Select totalScore from score where archerID = "" Order by totalScore desc;
Select 'arrow...' from score where archerID = "";

-- 3. Sort scores by date and score (highest first)
Select s.archerID, s.totalScore, c.date 
from score as s 
join competition as c
where s.competitionID = c.competitionID 
order by date, totalScore desc;

-- 4.Show scores in a specific date or in a range date
Select s.archerID, s.totalScore, c.date 
from score as s 
join competition as c
where s.competitionID = c.competitionID
and c.date = '2024-10-23' ;

-- specific archer 
Select s.archerID, s.totalScore, c.date 
from score as s 
join competition as c
where s.competitionID = c.competitionID
and c.date = "" and s.archerID = "";

-- range date 
Select s.archerID, s.totalScore, c.date 
from score as s 
join competition as c
where s.competitionID = c.competitionID
and (c.date between "" and "") ;

-- 5. Archers have to be able to look up definitions of rounds, competitions equipments and category
Select * from round where name = "";
Select * from round where roundID = "" ;
select * from competition where name = "";
select * from competition where competitionID = "";
select * from equipment where equipmentID = "";
select * from equipment where type = "";
select * from equipment where description = "";
-- 6. Archer also need to be able to find out equivalent rounds. 
Select * from score;

-- 7. Get the top 5 score
select a.archerID, a.name, vs.finalScore 
from archer as a 
join validscore as vs 
join score as s
where vs.scoreID = s.scoreID order by finalScore desc limit 5;
-- create index for final score
Create index idx_highest_score on validscore(finalScore);
-- 8. Change valid score 
update validscore set finalScore = "" where scoreID = ""; 

-- for coach who want to view the archer information and their result to define the suitable coaching for them.
select a.archerID, a.name, s.arrow1, s.arrow2, s.arrow3, s.arrow4, s.arrow5, s.arrow6, s.totalScore
from archer as a
join score as s 
where a.archerID = "2";
