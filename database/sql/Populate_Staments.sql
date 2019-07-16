INSERT INTO Instructor VALUES( 1, 'Nicholas Larsen');
INSERT INTO Instructor VALUES( 2, 'Ernest Steig');
INSERT INTO Instructor VALUES( 3, 'Melissa Roberts');
INSERT INTO Instructor VALUES( 4, 'Lisa Cranterson');
INSERT INTO Instructor VALUES( 5, 'Jake Ralph');
INSERT INTO Instructor VALUES( 6, 'Linda Torrents');
INSERT INTO Instructor VALUES( 7, 'Claire Devons');
INSERT INTO Instructor VALUES( 8, 'Isaac Harrison');
INSERT INTO Instructor VALUES( 9, 'Jeremy Kudo');
INSERT INTO Instructor VALUES( 10, 'Jessica Stevenson');

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

INSERT INTO Teach VALUES( 1, 1);
INSERT INTO Teach VALUES( 2, 2);
INSERT INTO Teach VALUES( 3, 3);
INSERT INTO Teach VALUES( 4, 4);
INSERT INTO Teach VALUES( 5, 5);
INSERT INTO Teach VALUES( 6, 6);
INSERT INTO Teach VALUES( 7, 7);
INSERT INTO Teach VALUES( 8, 8);
INSERT INTO Teach VALUES( 9, 9);
INSERT INTO Teach VALUES( 10, 10);

INSERT INTO Section VALUES( 1, 'Fall',2019);
INSERT INTO Section VALUES( 2, 'Winter',2020);
INSERT INTO Section VALUES( 3, 'Summer',2019);
INSERT INTO Section VALUES( 4, 'Fall',2019);
INSERT INTO Section VALUES( 5, 'Winter',2020);
INSERT INTO Section VALUES( 6, 'Summer',2019);
INSERT INTO Section VALUES( 7, 'Fall',2019);
INSERT INTO Section VALUES( 8, 'Winter',2020);
INSERT INTO Section VALUES( 9, 'Summer',2019);
INSERT INTO Section VALUES( 10, 'Fall',2019);

INSERT INTO EnrolledIn VALUES( 1, 2);
INSERT INTO EnrolledIn VALUES( 2, 3);
INSERT INTO EnrolledIn VALUES( 3, 4);
INSERT INTO EnrolledIn VALUES( 4, 5);
INSERT INTO EnrolledIn VALUES( 5, 6);
INSERT INTO EnrolledIn VALUES( 6, 7);
INSERT INTO EnrolledIn VALUES( 7, 8);
INSERT INTO EnrolledIn VALUES( 8, 9);
INSERT INTO EnrolledIn VALUES( 9, 10);
INSERT INTO EnrolledIn VALUES( 10, 1);

INSERT INTO Class VALUES(1, 08:45:00, 737,'A Building',150);
INSERT INTO Class VALUES(2, 09:30:00, 434,'B Building',125);
INSERT INTO Class VALUES(3, 10:00:00, 736,'C Building',100);
INSERT INTO Class VALUES(4, 11:45:00, 907,'D Building',145);
INSERT INTO Class VALUES(5, 12:45:00, 675,'E Building',190);
INSERT INTO Class VALUES(6, 10:30:00, 234,'F Building',250);
INSERT INTO Class VALUES(7, 11:00:00, 943,'G Building',203);
INSERT INTO Class VALUES(8, 10:45:00, 390,'H Building',109);
INSERT INTO Class VALUES(9, 11:15:00, 444,'I Building',121);
INSERT INTO Class VALUES(10, 12:30:00, 656,'J Building',153);

INSERT INTO Class VALUES(08:45:00, 'Monday',1,09:45:00);
INSERT INTO Class VALUES(09:30:00, 'Wednesday',2,10:45:00);
INSERT INTO Class VALUES(10:00:00, 'Tuesday',3,11:45:00);
INSERT INTO Class VALUES(11:45:00, 'Thursday',4,12:45:00);
INSERT INTO Class VALUES(12:45:00, 'Friday',5,13:45:00);
INSERT INTO Class VALUES(10:30:00, 'Monday',6,12:45:00);
INSERT INTO Class VALUES(11:00:00, 'Monday',7,12:45:00);
INSERT INTO Class VALUES(10:45:00, 'Wednesday',8,11:45:00);
INSERT INTO Class VALUES(11:15:00, 'Thursday,9,13:45:00);
INSERT INTO Class VALUES(12:30:00, 'Friday',10,14:45:00);

INSERT INTO Department VALUES('Computer Science', 1, 'A Building');
INSERT INTO Department VALUES('Mathematics', 2, 'B Building');
INSERT INTO Department VALUES('Biology', 3, 'C Building');
INSERT INTO Department VALUES('Physics', 4, 'D Building');
INSERT INTO Department VALUES('Engineering', 5, 'E Building');
INSERT INTO Department VALUES('French', 6, 'F Building');
INSERT INTO Department VALUES('Gender Studies', 7, 'G Building');
INSERT INTO Department VALUES('History', 8, 'H Building');
INSERT INTO Department VALUES('Anthropology', 9, 'I Building');
INSERT INTO Department VALUES('Jewish Studies', 10, 'J Building');

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
                         
INSERT INTO Program
VALUES
    ('Computer Science', 72);
INSERT INTO Program
VALUES
	('English', 72);
INSERT INTO Program
VALUES
    ('Computer Architecture', 72);
INSERT INTO Program
VALUES
    ('Computer Hardware', 72);
INSERT INTO Program
VALUES
    ('Computer Games', 72);
INSERT INTO Program
VALUES
    ('Arts', 72);
INSERT INTO Program
VALUES
    ('Business', 72);
INSERT INTO Program
VALUES
    ('Economics', 72);
INSERT INTO Program
VALUES
    ('Law', 72);
INSERT INTO Program
VALUES
    ('Mathematics', 72);

INSERT INTO Student
VALUES
    (566090795, 90, 'Linus', 'Torvards', 4.0, 'Computer Science');
INSERT INTO Student
VALUES
    (26457899, 90, 'Max', 'Phillips', 3.0, 'Mathematics');
INSERT INTO Student
VALUES
    (12345697, 90, 'Glen', 'Mackenzie', 3.2, 'Economics');
INSERT INTO Student
VALUES
    (76859321, 90, 'Andrew', 'Morrison', 2.0, 'Business');
INSERT INTO Student
VALUES
    (28764980, 90, 'Phil', 'Newton', 2.1, 'Computer Games');
INSERT INTO Student
VALUES
    (76890473, 90, 'John', 'Smith', 3.1, 'Computer Architecture');
INSERT INTO Student
VALUES
    (95837468, 90, 'John', 'Howard', 3.4, 'Law');
INSERT INTO Student
VALUES
    (059682736, 90, 'Marcus', 'Morris', 2.7, 'Computer Science');
INSERT INTO Student
VALUES
    (658936478, 90, 'James', 'Watson', 2.0, 'Mathematics');
INSERT INTO Student
VALUES
    (079683746, 90, 'Felix', 'Harris', 3.1, 'Computer Hardware');

INSERT INTO Belong
VALUES
	(1, 'Marcus', 'Rashford', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(2, 'Jesse', 'Lingard', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(3, 'Anthony', 'Martial', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(4, 'Luke', 'Shaw', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(5, 'Paul', 'Scholes', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(6, 'David', 'Beckham', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(7, 'Mason', 'Greenwood', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(8, 'Phil', 'Jones', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(9, 'James', 'Garner', 1, 'Computer Science');
INSERT INTO Belong
VALUES
	(10, 'Gary', 'Neville', 1, 'Computer Science');

INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);
INSERT INTO Undergraduate
VALUES
	(2, 2);

INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);
INSERT INTO Graduate
VALUES
	(2, 3, 1);

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

INSERT INTO Fund
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

