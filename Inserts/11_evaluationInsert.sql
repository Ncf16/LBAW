--Evaluation
 SET SCHEMA 'final';
INSERT INTO Evaluation(20,'2015-11-20 11:00:00',1);
INSERT INTO Evaluation(20,'2015-12-21 11:00:00',1);
INSERT INTO Evaluation(20,'2016-01-13 11:00:00',1);
INSERT INTO Evaluation(20,'2016-04-20 11:00:00',1);

INSERT INTO GroupWork(1,2,3);
INSERT INTO Test(2,90);
INSERT INTO Test(3,80);
INSERT INTO Exam(3,80);

INSERT INTO Evaluation(25,'2015-10-20 11:00:00',2);
INSERT INTO Evaluation(25,'2015-12-21 11:00:00',2);
INSERT INTO Evaluation(30,'2016-01-13 11:00:00',2);
INSERT INTO Evaluation(20,'2016-04-10 11:00:00',2);

INSERT INTO GroupWork(4,3,3);
INSERT INTO Test(5,90);
INSERT INTO Test(6,80);

INSERT INTO Evaluation(20,'2015-11-10 11:00:00',3);
INSERT INTO Evaluation(20,'2015-12-24 11:00:00',3);
INSERT INTO Evaluation(20,'2016-01-18 11:00:00',3);
INSERT INTO Evaluation(20,'2016-04-20 11:00:00',3);

INSERT INTO GroupWork(7,2,3);
INSERT INTO Test(8,90);
INSERT INTO Test(9,80);
INSERT INTO Exam(10,80);

INSERT INTO Evaluation(25,'2015-11-20 11:00:00',4);
INSERT INTO Evaluation(25,'2015-12-21 11:00:00',4);
INSERT INTO Evaluation(30,'2016-02-13 11:00:00',4);
INSERT INTO Evaluation(20,'2016-03-10 11:00:00',4);

INSERT INTO GroupWork(11,3,3);
INSERT INTO Test(12,90);
INSERT INTO Exam(6,80);


INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (1,90,1,'2015-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (1,90,1,'2015-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (1,90,1,'2015-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (2,90,2,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,16);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (2,90,2,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,16);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (2,90,2,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,16);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (3,90,3,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,24);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (3,90,3,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,24);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (3,90,3,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,24);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (4,90,4,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,36);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (4,90,4,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,36);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (4,90,4,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,36);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (5,90,5,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,37);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (5,90,5,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,37);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (5,90,5,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,37);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (6,90,6,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,63);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (6,90,6,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,63);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (6,90,6,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,63);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (7,90,7,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (7,90,7,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (7,90,7,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (8,90,8,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (8,90,8,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (8,90,8,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (9,90,9,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (9,90,9,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (9,90,9,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (10,90,10,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (10,90,10,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (10,90,10,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);


-- Course 1, Syllabus 2016/2017   (done)
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (11,90,11,'2016-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (11,90,11,'2016-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (11,90,11,'2016-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,64);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (12,90,12,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (12,90,12,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (12,90,12,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,68);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (13,90,13,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (13,90,13,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (13,90,13,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,79);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (14,90,14,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (14,90,14,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (14,90,14,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,85);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (15,90,15,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,110);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (15,90,15,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,110);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (15,90,15,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,110);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (16,90,16,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,112);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (16,90,16,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,112);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (16,90,16,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,112);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (17,90,17,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,122);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (17,90,17,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,122);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (17,90,17,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,122);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (18,90,18,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,130);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (18,90,18,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,130);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (18,90,18,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,130);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (19,90,19,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (19,90,19,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (19,90,19,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,15);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (20,90,20,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,139);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (20,90,20,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,139);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (20,90,20,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,139);


-- Course 2, Syllabus 2015/2016 (done)
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (21,90,21,'2015-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (21,90,21,'2015-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (21,90,21,'2015-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (22,90,22,'2015-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (22,90,22,'2015-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (22,90,22,'2015-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (23,90,23,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (23,90,23,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (23,90,23,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (24,90,24,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (24,90,24,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (24,90,24,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (25,90,25,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (25,90,25,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (25,90,25,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (26,90,26,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (26,90,26,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (26,90,26,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (27,90,27,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (27,90,27,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (27,90,27,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);


-- Course 2, Syllabus 2016/2017
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (28,90,28,'2016-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (28,90,28,'2016-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (28,90,28,'2016-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (29,90,29,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (29,90,29,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (29,90,29,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (30,90,30,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (30,90,30,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (30,90,30,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (31,90,31,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (31,90,31,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (31,90,31,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (32,90,32,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (32,90,32,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (32,90,32,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (33,90,33,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (33,90,33,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (33,90,33,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);


-- Course 3, Syllabus 2015/2016 (done)
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (34,90,34,'2015-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (34,90,34,'2015-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (34,90,34,'2015-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,147);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (35,90,35,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (35,90,35,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (35,90,35,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,155);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (36,90,36,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (36,90,36,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (36,90,36,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,162);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (37,90,37,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (37,90,37,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (37,90,37,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,166);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (38,90,38,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (38,90,38,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (38,90,38,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,172);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (39,90,39,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (39,90,39,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (39,90,39,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,180);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (40,90,40,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,185);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (40,90,40,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,185);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (40,90,40,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,185);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (41,90,41,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,217);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (41,90,41,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,217);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (41,90,41,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,217);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (42,90,42,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,234);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (42,90,42,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,234);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (42,90,42,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,234);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (43,90,43,'2016-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (43,90,43,'2016-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (43,90,43,'2016-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (44,90,44,'2015-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (44,90,44,'2015-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (44,90,44,'2015-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,235);


-- Course 3, Syllabus 2016/2017 (done)
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (45,90,45,'2016-10-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (45,90,45,'2016-11-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (45,90,45,'2016-12-06 13:00:00','orci Maecenas dui eros sapien ac lacus',1,251);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (46,90,46,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (46,90,46,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (46,90,46,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,259);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (47,90,47,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (47,90,47,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (47,90,47,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,264);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (48,90,48,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (48,90,48,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (48,90,48,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,267);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (49,90,49,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (49,90,49,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (49,90,49,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,268);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (50,90,50,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (50,90,50,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (50,90,50,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,282);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (51,90,51,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,293);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (51,90,51,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,293);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (51,90,51,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,293);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (52,90,52,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,295);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (52,90,52,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,295);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (52,90,52,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,295);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (53,90,53,'2016-10-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,302);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (53,90,53,'2016-11-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,302);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (53,90,53,'2016-12-07 13:00:00','orci Maecenas dui eros sapien ac lacus',1,302);

INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (54,90,54,'2017-03-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,305);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (54,90,54,'2017-04-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,305);
INSERT INTO Class (occurrenceid,duration,roomid,classdate,summary,visible,teacherCode) VALUES (54,90,54,'2017-05-20 13:00:00','orci Maecenas dui eros sapien ac lacus',1,305);





INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (11,'2016-01-04',15);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (73,'2016-03-23',5);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (3,'2016-01-18',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (5,'2016-02-06',8);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (29,'2016-01-16',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (81,'2016-02-25',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (96,'2016-02-19',8);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (22,'2016-01-12',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (18,'2016-01-29',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (84,'2016-03-11',8);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (38,'2016-01-31',12);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (1,'2016-03-10',4);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (19,'2016-01-05',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (62,'2016-02-25',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (7,'2016-02-05',19);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (83,'2016-04-04',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (60,'2016-01-07',4);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (50,'2016-02-07',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (8,'2016-04-01',5);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (84,'2016-04-06',19);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (88,'2016-02-20',20);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (33,'2016-02-23',27);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (38,'2016-01-13',16);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (26,'2016-01-18',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (99,'2016-04-11',21);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (34,'2016-01-06',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (95,'2016-01-04',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (11,'2016-02-03',4);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (49,'2016-03-12',5);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (84,'2016-01-04',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (35,'2016-02-19',15);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (22,'2016-03-19',15);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (20,'2016-03-01',21);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (64,'2016-02-21',12);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (49,'2016-01-08',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (92,'2016-01-04',15);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (8,'2016-01-01',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (91,'2016-02-03',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (26,'2016-03-07',5);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (46,'2016-02-11',4);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (63,'2016-03-24',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (4,'2016-03-31',37);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (6,'2016-01-23',12);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (81,'2016-03-16',12);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (30,'2016-04-10',15);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (11,'2016-02-15',34);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (71,'2016-02-06',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (61,'2016-01-05',5);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (40,'2016-03-17',24);
INSERT INTO Evaluation(weight,evaluationDate,cuOccurrenceID) VALUES (73,'2016-02-06',13);

--GroupWork
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (4,2,3);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (10,3,4);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (6,3,5);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (9,2,2);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (2,2,3);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (1,2,2);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (7,2,2);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (8,2,2);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (12,3,4);
INSERT INTO GroupWork(evaluationID,minElements,maxElements) VALUES (11,2,3);

-- Test
INSERT INTO Test(evaluationID,duration) VALUES (15,126);
INSERT INTO Test(evaluationID,duration) VALUES (16,17);
INSERT INTO Test(evaluationID,duration) VALUES (17,185);
INSERT INTO Test(evaluationID,duration) VALUES (18,99);
INSERT INTO Test(evaluationID,duration) VALUES (19,216);
INSERT INTO Test(evaluationID,duration) VALUES (20,200);
INSERT INTO Test(evaluationID,duration) VALUES (21,221);
INSERT INTO Test(evaluationID,duration) VALUES (22,166);
INSERT INTO Test(evaluationID,duration) VALUES (23,35);
INSERT INTO Test(evaluationID,duration) VALUES (24,155);
INSERT INTO Test(evaluationID,duration) VALUES (25,14);
INSERT INTO Test(evaluationID,duration) VALUES (26,198);
INSERT INTO Test(evaluationID,duration) VALUES (27,17);
INSERT INTO Test(evaluationID,duration) VALUES (28,222);
INSERT INTO Test(evaluationID,duration) VALUES (29,146);
INSERT INTO Test(evaluationID,duration) VALUES (30,89);
INSERT INTO Test(evaluationID,duration) VALUES (31,43);
INSERT INTO Test(evaluationID,duration) VALUES (32,222);
INSERT INTO Test(evaluationID,duration) VALUES (33,115);
INSERT INTO Test(evaluationID,duration) VALUES (34,47);
INSERT INTO Test(evaluationID,duration) VALUES (35,100);
INSERT INTO Test(evaluationID,duration) VALUES (36,211);
INSERT INTO Test(evaluationID,duration) VALUES (37,26);
INSERT INTO Test(evaluationID,duration) VALUES (38,84);
INSERT INTO Test(evaluationID,duration) VALUES (39,77);

--Exam
INSERT INTO Exam(evaluationID,duration) VALUES (15,98);
INSERT INTO Exam(evaluationID,duration) VALUES (16,199);
INSERT INTO Exam(evaluationID,duration) VALUES (17,153);
INSERT INTO Exam(evaluationID,duration) VALUES (18,178);
INSERT INTO Exam(evaluationID,duration) VALUES (19,45);
INSERT INTO Exam(evaluationID,duration) VALUES (20,37);
INSERT INTO Exam(evaluationID,duration) VALUES (21,155);
INSERT INTO Exam(evaluationID,duration) VALUES (22,30);
INSERT INTO Exam(evaluationID,duration) VALUES (23,30);
INSERT INTO Exam(evaluationID,duration) VALUES (24,130);
