INSERT INTO Instructor VALUES( 10, 'Computer Science', 'Nicholas Larsen');
INSERT INTO Instructor VALUES( 2, 'Mathematics', 'Ernest Steig');
INSERT INTO Instructor VALUES( 3, 'Biology', 'Melissa Roberts');
INSERT INTO Instructor VALUES( 1, 'Physics', 'Lisa Cranterson');
INSERT INTO Instructor VALUES( 4, 'Engineering', 'Jake Ralph');
INSERT INTO Instructor VALUES( 7, 'French', 'Linda Torrents');
INSERT INTO Instructor VALUES( 5, 'Gender Studies', 'Claire Devons');
INSERT INTO Instructor VALUES( 9, 'History', 'Isaac Harrison');
INSERT INTO Instructor VALUES( 6, 'Anthropology', 'Jeremy Kudo');
INSERT INTO Instructor VALUES( 8, 'Jewish Studies', 'Jessica Stevenson');

INSERT INTO Work VALUES( 'Physics', 1);
INSERT INTO Work VALUES( 'Mathematics', 2);
INSERT INTO Work VALUES( 'Biology', 3);
INSERT INTO Work VALUES( 'Engineering', 4);
INSERT INTO Work VALUES( 'Gender Studies', 5);
INSERT INTO Work VALUES( 'Anthropology', 6);
INSERT INTO Work VALUES( 'French', 7);
INSERT INTO Work VALUES( 'Jewish Studies', 8);
INSERT INTO Work VALUES( 'History', 9);
INSERT INTO Work VALUES( 'Computer Science', 10);

INSERT INTO Teach VALUES( 1, 10);
INSERT INTO Teach VALUES( 2, 9);
INSERT INTO Teach VALUES( 3, 8);
INSERT INTO Teach VALUES( 4, 7);
INSERT INTO Teach VALUES( 5, 6);
INSERT INTO Teach VALUES( 6, 5);
INSERT INTO Teach VALUES( 7, 4);
INSERT INTO Teach VALUES( 8, 3);
INSERT INTO Teach VALUES( 9, 2);
INSERT INTO Teach VALUES( 10, 1);

INSERT INTO Section VALUES( 1, 10, 10, 4, 1, 'Fall',2018);
INSERT INTO Section VALUES( 2, 9, 9, 5, 5, 'Winter',2020);
INSERT INTO Section VALUES( 3, 8, 8, 6, 6, 'Summer',2019);
INSERT INTO Section VALUES( 4, 7, 7, 7, 7, 'Fall',2019);
INSERT INTO Section VALUES( 5, 6, 6, 8, 8, 'Winter',2020);
INSERT INTO Section VALUES( 6, 5, 5, 9, 9, 'Summer',2019);
INSERT INTO Section VALUES( 7, 4, 4, 10, 10, 'Fall',2019);
INSERT INTO Section VALUES( 8, 3, 3, 1, 1, 'Winter',2020);
INSERT INTO Section VALUES( 9, 2, 2, 2, 2, 'Summer',2019);
INSERT INTO Section VALUES( 10, 1, 1, 3, 3, 'Fall',2019);

INSERT INTO EnrolledIn VALUES( 10, 1, 'F');
INSERT INTO EnrolledIn VALUES( 9, 2, 'D-');
INSERT INTO EnrolledIn VALUES( 8, 3, 'D');
INSERT INTO EnrolledIn VALUES( 7, 4, 'D+');
INSERT INTO EnrolledIn VALUES( 6, 5, 'A+');
INSERT INTO EnrolledIn VALUES( 5, 6, 'C');
INSERT INTO EnrolledIn VALUES( 4, 7, 'C+');
INSERT INTO EnrolledIn VALUES( 3, 8, 'A');
INSERT INTO EnrolledIn VALUES( 2, 9, 'A');
INSERT INTO EnrolledIn VALUES( 1, 10, 'A+');

INSERT INTO Class VALUES(1, '08:45:00', 'Monday', 737,'A Building',150);
INSERT INTO Class VALUES(2, '09:30:00', 'Wednesday', 434,'B Building',125);
INSERT INTO Class VALUES(3, '10:00:00', 'Tuesday', 736,'C Building',100);
INSERT INTO Class VALUES(4, '11:45:00', 'Thursday', 907,'D Building',145);
INSERT INTO Class VALUES(5, '12:45:00', 'Friday', 675,'E Building',190);
INSERT INTO Class VALUES(6, '10:30:00', 'Monday', 234,'F Building',250);
INSERT INTO Class VALUES(7, '11:00:00', 'Monday', 943,'G Building',203);
INSERT INTO Class VALUES(8, '10:45:00', 'Wednesday', 390,'H Building',109);
INSERT INTO Class VALUES(9, '11:15:00', 'Thursday', 444,'I Building',121);
INSERT INTO Class VALUES(10, '12:30:00', 'Friday', 656,'J Building',153);



INSERT INTO Timeslot VALUES('08:45:00', 'Monday',1, '09:45:00');
INSERT INTO Timeslot VALUES('09:30:00', 'Wednesday',2,'10:45:00');
INSERT INTO Timeslot VALUES('10:00:00', 'Tuesday',3,'11:45:00');
INSERT INTO Timeslot VALUES('11:45:00', 'Thursday',4,'12:45:00');
INSERT INTO Timeslot VALUES('12:45:00', 'Friday',5,'13:45:00');
INSERT INTO Timeslot VALUES('10:30:00', 'Monday',6,'12:45:00');
INSERT INTO Timeslot VALUES('11:00:00', 'Monday',7,'12:45:00');
INSERT INTO Timeslot VALUES('10:45:00', 'Wednesday',8,'11:45:00');
INSERT INTO Timeslot VALUES('11:15:00', 'Thursday',9,'13:45:00');
INSERT INTO Timeslot VALUES('12:30:00', 'Friday',10,'14:45:00');








INSERT INTO Department VALUES('Computer Science', 10, 'A Building');
INSERT INTO Department VALUES('Mathematics', 2, 'B Building');
INSERT INTO Department VALUES('Biology', 3, 'C Building');
INSERT INTO Department VALUES('Physics', 1, 'D Building');
INSERT INTO Department VALUES('Engineering', 4, 'E Building');
INSERT INTO Department VALUES('French', 7, 'F Building');
INSERT INTO Department VALUES('Gender Studies', 5, 'G Building');
INSERT INTO Department VALUES('History', 9, 'H Building');
INSERT INTO Department VALUES('Anthropology', 6, 'I Building');
INSERT INTO Department VALUES('Jewish Studies', 8, 'J Building');



INSERT INTO Course VALUES( 1,'Operating Systems' ,'Computer Science');
INSERT INTO Course VALUES( 2,'Mechanics' ,'Physics');
INSERT INTO Course VALUES( 3,'Advanced French Language' ,'French');
INSERT INTO Course VALUES( 4,'Sexuality' ,'Gender Studies');
INSERT INTO Course VALUES( 5,'MicroBiology' ,'Biology');
INSERT INTO Course VALUES( 6,'Algebra' ,'Mathematics');
INSERT INTO Course VALUES( 7,'The Roman Empire' ,'History');
INSERT INTO Course VALUES( 8,'Flammable Materials' ,'Engineering');
INSERT INTO Course VALUES( 9,'Evolution' ,'Anthropology');
INSERT INTO Course VALUES( 10,'Talmudic Studies' ,'Jewish Studies');
                    
					     
INSERT INTO Program VALUES ('Computer Science', 'Engineering', 1, 72);
INSERT INTO Program VALUES ('Computer Architecture', 'Engineering', 2, 72);
INSERT INTO Program VALUES ('Computer Hardware', 'Engineering', 3, 72);
INSERT INTO Program VALUES ('Computer Games', 'Engineering', 4, 72);
INSERT INTO Program VALUES ('Arts', 'Anthropology', 5, 72);
INSERT INTO Program VALUES ('Business','Jewish Studies', 6, 72);
INSERT INTO Program VALUES ('Economics', 'Jewish Studies', 7, 72);
INSERT INTO Program VALUES ('Law', 'Jewish Studies', 8, 72);
INSERT INTO Program VALUES ('Mathematics', 'Mathematics', 9, 72);
INSERT INTO Program VALUES ('English', 'Jewish Studies', 10, 72);

INSERT INTO Student
VALUES
    (10, 'Computer Science', 1, 90, 'Linus', 'Torvards', 4.0);
INSERT INTO Student
VALUES
    (9, 'Mathematics', 2, 90, 'Max', 'Phillips', 3.0);
INSERT INTO Student
VALUES
    (8, 'Economics', 3, 90, 'Mackenzie', 'Johnson', 3.2);
INSERT INTO Student
VALUES
    (7, 'Business', 4, 90, 'Andrew', 'Morrison', 2.0);
INSERT INTO Student
VALUES
    (6, 'Computer Games', 5, 90, 'Phil', 'Newton', 2.1);
INSERT INTO Student
VALUES
    (5, 'Computer Architecture', 6, 90, 'John', 'Smith', 3.1);
INSERT INTO Student
VALUES
    (4, 'Law', 7, 90, 'John', 'Howard', 3.4);
INSERT INTO Student
VALUES
    (3, 'Computer Science', 8, 90, 'Marcus', 'Morris', 2.7);
INSERT INTO Student
VALUES
    (2, 'Mathematics', 9, 90, 'James', 'Watson', 2.0);
INSERT INTO Student
VALUES
    (1, 'Computer Hardware', 10, 90, 'Felix', 'Harris', 3.1);

INSERT INTO Belong
VALUES
	(1, 'Computer Science', 'Marcus Rashford');
INSERT INTO Belong
VALUES
	(2, 'Computer Science', 'Jesse Lingard');
INSERT INTO Belong
VALUES
	(3, 'Computer Science', 'Anthony Martial');
INSERT INTO Belong
VALUES
	(4, 'Computer Science', 'Luke Shaw');
INSERT INTO Belong
VALUES
	(5, 'Computer Science', 'Paul Scholes');
INSERT INTO Belong
VALUES
	(6, 'Computer Science', 'David Beckham');
INSERT INTO Belong
VALUES
	(7, 'Computer Science', 'Mason Greenwood');
INSERT INTO Belong
VALUES
	(8, 'Computer Science', 'Phil Jones');
INSERT INTO Belong
VALUES
	(9, 'Computer Science', 'James Garner');
INSERT INTO Belong
VALUES
	(10, 'Computer Science', 'Gary Neville');

INSERT INTO Undergraduate
VALUES
	(1);
INSERT INTO Undergraduate
VALUES
	(2);
INSERT INTO Undergraduate
VALUES
	(3);
INSERT INTO Undergraduate
VALUES
	(4);
INSERT INTO Undergraduate
VALUES
	(5);
INSERT INTO Undergraduate
VALUES
	(6);
INSERT INTO Undergraduate
VALUES
	(7);
INSERT INTO Undergraduate
VALUES
	(8);
INSERT INTO Undergraduate
VALUES
	(9);
INSERT INTO Undergraduate
VALUES
	(10);

INSERT INTO Graduate
VALUES
	(1, 3, 1, 1);
INSERT INTO Graduate
VALUES
	(2, 2, 2, 2);
INSERT INTO Graduate
VALUES
	(3, 1, 3, 3);
INSERT INTO Graduate
VALUES
	(4, 3, 4, 4);
INSERT INTO Graduate
VALUES
	(5, 2, 5, 5);
INSERT INTO Graduate
VALUES
	(6, 1, 6, 6);
INSERT INTO Graduate
VALUES
	(7, 4, 7, 7);
INSERT INTO Graduate
VALUES
	(8, 4, 7, 7);
INSERT INTO Graduate
VALUE
	(9, 3, 8, 8);
INSERT INTO Graduate
VALUES
	(10, 1, 9, 9);

INSERT INTO ResearchFunding
VALUES
	(1, 1, 1000);
INSERT INTO ResearchFunding
VALUES
	(2, 1, 10000);
INSERT INTO ResearchFunding
VALUES
	(3, 1, 4000);
INSERT INTO ResearchFunding
VALUES
	(4, 1, 5000);
INSERT INTO ResearchFunding
VALUES
	(5, 1, 2000);
INSERT INTO ResearchFunding
VALUES
	(6, 1, 500);
INSERT INTO ResearchFunding
VALUES
	(7, 1, 200);
INSERT INTO ResearchFunding
VALUES
	(8, 1, 300);
INSERT INTO ResearchFunding
VALUES
	(9, 1, 450);
INSERT INTO ResearchFunding
VALUES
	(10, 1, 900);

/*INSERT INTO Fund
VALUES
	(1, 2, 3);
INSERT INTO Fund
VALUES
	(2, 2, 3);
INSERT INTO Fund
VALUES
	(3, 2, 3);
INSERT INTO Fund
VALUES
	(4, 2, 3);
INSERT INTO Fund
VALUES
	(5, 2, 3);
INSERT INTO Fund
VALUES
	(6, 2, 3);
INSERT INTO Fund
VALUES
	(7, 2, 3);
INSERT INTO Fund
VALUES
	(8, 2, 3);
INSERT INTO Fund
VALUES
	(9, 2, 3);
INSERT INTO Fund
VALUES
	(10, 2, 3);
*/

INSERT INTO Has VALUES(1,1);
INSERT INTO Has VALUES(2,2);
INSERT INTO Has VALUES(3,3);
INSERT INTO Has VALUES(4,4);
INSERT INTO Has VALUES(5,5);
INSERT INTO Has VALUES(6,6);
INSERT INTO Has VALUES(7,7);
INSERT INTO Has VALUES(8,8);
INSERT INTO Has VALUES(9,9);
INSERT INTO Has VALUES(10,10);

INSERT INTO TeachingAssistant VALUES(11,1,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(12,2,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(13,3,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(14,4,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(15,5,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(16,6,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(17,7,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(18,8,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(19,9,20,'y','n',1,'y');
INSERT INTO TeachingAssistant VALUES(20,10,20,'y','n',1,'y');

INSERT INTO Contain VALUES(1,1);
INSERT INTO Contain VALUES(2,2);
INSERT INTO Contain VALUES(3,3);
INSERT INTO Contain VALUES(4,4);
INSERT INTO Contain VALUES(5,5);
INSERT INTO Contain VALUES(6,6);
INSERT INTO Contain VALUES(7,7);
INSERT INTO Contain VALUES(8,8);
INSERT INTO Contain VALUES(9,9);
INSERT INTO Contain VALUES(10,10);