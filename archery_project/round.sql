
-- round 
select * from round;
INSERT INTO `archery`.`round` (`roundID`, `name`, `range`, `targetFaceID`) 
VALUES 
(1, 'WA90/1440', 90, 1),
(2, 'WA70/1440', 70, 1),
(3, 'WA60/1440', 60, 1),
(4, 'AA50/1440', 50, 1),
(5, 'AA40/1440', 40, 1),
(6, 'Long Sydney', 90, 1),
(7, 'Sydney', 70, 1),
(8, 'Long Brisbane', 70, 1),
(9, 'Brisbane', 60, 1),
(10, 'Adelaide', 50, 1),
(11, 'Short Adelaide', 40, 1),
(12, 'Hobart', 30, 1),
(13, 'Perth', 30, 1),
(14, 'Canberra WA60/900', 30, 1),
(15, 'Short Canberra', 30, 1),
(16, 'Junior Canberra', 30, 1),
(17, 'Mini Canberra', 30, 1),
(18, 'Grange', 90, 1),
(19, 'Melbourne', 90, 1),
(20, 'Darwin', 90, 1),
(21, 'Geelong', 90, 1),
(22, 'Newcastle', 90, 1),
(23, 'Holt', 90, 1),
(24, 'Drake', 90, 1),
(25, 'Wollongong', 72, 1),
(26, 'Townsville', 72, 1),
(27, 'Launceston', 72, 1),
(28, 'WA70/720', 72, 1),
(29, 'WA60/720', 72, 1),
(30, 'WA50/720', 72, 1),
(31, 'AA50/720', 72, 1),
(32, 'AAB50/720', 72, 1),
(33, 'AA40/720', 72, 1),
(34, 'AA30/720', 72, 1),
(35, 'AAB20/720', 72, 1),
(36, 'VI Outdoor', 144, 2),
(37, 'VI 30m Round', 72, 2),
(38, 'Another Round', 100, 2),
(39, 'Yet Another Round', 80, 2),
(40, 'New Round', 110, 2),
(41, 'Round X', 120, 2),
(42, 'Round Y', 130, 2);
select * from round;

-- select * from round 
-- WHERE name = "WA60/1440";