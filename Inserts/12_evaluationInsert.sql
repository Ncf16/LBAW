--Evaluation
 SET SCHEMA 'final';INSERT INTO evaluation VALUES (1, 1, '2015-11-20 11:00:00', 20, 'GroupWork', 1);
INSERT INTO evaluation VALUES (4, 1, '2016-04-20 11:00:00', 20, 'GroupWork', 1);
INSERT INTO evaluation VALUES (7, 2, '2016-01-13 11:00:00', 30, 'GroupWork', 1);
INSERT INTO evaluation VALUES (11, 3, '2016-01-18 11:00:00', 20, 'GroupWork', 1);
INSERT INTO evaluation VALUES (14, 4, '2015-12-21 11:00:00', 25, 'GroupWork', 1);
INSERT INTO evaluation VALUES (18, 6, '2015-12-21 11:00:00', 20, 'GroupWork', 1);
INSERT INTO evaluation VALUES (21, 7, '2015-10-20 11:00:00', 25, 'GroupWork', 1);
INSERT INTO evaluation VALUES (24, 7, '2016-04-10 11:00:00', 20, 'GroupWork', 1);
INSERT INTO evaluation VALUES (2, 1, '2016-06-10 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (5, 2, '2015-10-20 11:00:00', 25, 'Test', 1);
INSERT INTO evaluation VALUES (8, 2, '2016-04-10 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (9, 3, '2015-11-10 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (3, 1, '2016-01-13 11:00:00', 20, 'Exam', 1);
INSERT INTO evaluation VALUES (6, 2, '2015-12-21 11:00:00', 25, 'Exam', 1);
INSERT INTO evaluation VALUES (10, 3, '2015-12-24 11:00:00', 20, 'Exam', 1);
INSERT INTO evaluation VALUES (17, 6, '2016-11-20 11:00:00', 20, 'Exam', 1);
INSERT INTO evaluation VALUES (23, 7, '2016-01-13 11:00:00', 30, 'Exam', 1);
INSERT INTO evaluation VALUES (26, 8, '2015-12-24 11:00:00', 20, 'Exam', 1);
INSERT INTO evaluation VALUES (12, 3, '2016-04-20 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (15, 4, '2016-02-13 11:00:00', 30, 'Test', 1);
INSERT INTO evaluation VALUES (16, 4, '2016-03-10 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (19, 6, '2016-01-13 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (20, 6, '2016-04-20 11:00:00', 20, 'Test', 1);
INSERT INTO evaluation VALUES (22, 7, '2015-12-21 11:00:00', 25, 'Test', 1);
INSERT INTO evaluation VALUES (25, 8, '2015-11-10 11:00:00', 20, 'Test', 1);


--
-- Data for Name: exam; Type: TABLE DATA; Schema: final; Owner: lbaw1562
--

INSERT INTO exam VALUES (3, 80, 1);
INSERT INTO exam VALUES (10, 80, 1);
INSERT INTO exam VALUES (6, 80, 1);
INSERT INTO exam VALUES (17, 80, 1);
INSERT INTO exam VALUES (23, 80, 1);
INSERT INTO exam VALUES (26, 80, 1);


--
-- Data for Name: grade; Type: TABLE DATA; Schema: final; Owner: lbaw1562
--

INSERT INTO grade VALUES (2, 1, NULL, 1);
INSERT INTO grade VALUES (189, 1, NULL, 1);
INSERT INTO grade VALUES (117, 1, NULL, 1);
INSERT INTO grade VALUES (343, 1, NULL, 1);
INSERT INTO grade VALUES (944, 1, NULL, 1);
INSERT INTO grade VALUES (2, 2, NULL, 1);
INSERT INTO grade VALUES (189, 2, NULL, 1);
INSERT INTO grade VALUES (117, 2, NULL, 1);
INSERT INTO grade VALUES (343, 2, NULL, 1);
INSERT INTO grade VALUES (944, 2, NULL, 1);
INSERT INTO grade VALUES (2, 3, NULL, 1);
INSERT INTO grade VALUES (189, 3, NULL, 1);
INSERT INTO grade VALUES (117, 3, NULL, 1);
INSERT INTO grade VALUES (343, 3, NULL, 1);
INSERT INTO grade VALUES (944, 3, NULL, 1);
INSERT INTO grade VALUES (2, 4, NULL, 1);
INSERT INTO grade VALUES (189, 4, NULL, 1);
INSERT INTO grade VALUES (117, 4, NULL, 1);
INSERT INTO grade VALUES (343, 4, NULL, 1);
INSERT INTO grade VALUES (944, 4, NULL, 1);
INSERT INTO grade VALUES (2, 5, NULL, 1);
INSERT INTO grade VALUES (2, 6, NULL, 1);
INSERT INTO grade VALUES (2, 7, NULL, 1);
INSERT INTO grade VALUES (2, 8, NULL, 1);
INSERT INTO grade VALUES (2, 14, NULL, 1);
INSERT INTO grade VALUES (2, 15, NULL, 1);
INSERT INTO grade VALUES (2, 16, NULL, 1);


--
-- Data for Name: groupwork; Type: TABLE DATA; Schema: final; Owner: lbaw1562
--

INSERT INTO groupwork VALUES (1, 3, 2, 1);
INSERT INTO groupwork VALUES (4, 3, 3, 1);
INSERT INTO groupwork VALUES (7, 3, 2, 1);
INSERT INTO groupwork VALUES (11, 3, 3, 1);
INSERT INTO groupwork VALUES (14, 3, 2, 1);
INSERT INTO groupwork VALUES (18, 3, 3, 1);
INSERT INTO groupwork VALUES (21, 3, 2, 1);
INSERT INTO groupwork VALUES (24, 3, 3, 1);
