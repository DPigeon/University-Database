/* Tables */

/* Table Student should be fine */
CREATE TABLE Student
(
    STID INT,
    PName char(30),
    SeID INT,
    Credit INT,
    FirstName CHAR (30),
    LastName CHAR (30),
    GPA FLOAT,
    PName CHAR (30),
    SeID INT,
    CLID INT,
    StartTime INT DEFAULT NULL,
    IID INT,
    DName INT,
    PRIMARY KEY (STID)
);

CREATE TABLE Belong
(
    STID INT,
    PName CHAR (30),
    Advisor CHAR (30),
    PRIMARY KEY (STID, PName)
);

CREATE TABLE Undergraduate
(
    STID INT
);

CREATE TABLE Graduate
(
    STID INT,
    SupervisorID INT
);

CREATE TABLE ReseachFunding
(
    RID INT,
    STID INT,
    Amount INT,
    PRIMARY KEY(RID)
);

CREATE TABLE TeachingAssistant
(
    TAID INT,
    TotalHours INT,
    AssignmentMarking CHAR(1),
    LabInstructor CHAR(1),
    NumCourses INT,
    TutorialSession CHAR(1),
    PRIMARY KEY (TAID)
);
CREATE TABLE Fund
(
    TAID INT,
    RID INT,
    PRIMARY KEY(TAID)
);

/*CREATE TABLE Work
(
    DName INT,
    IID INT,
);*/

/*CREATE TABLE Teach
(
    SeID INT,
    IID INT,
);*/

CREATE TABLE Section
(
    SeID INT,
    Semester CHAR (30),
    Year INT,
<<<<<<< Updated upstream
    PRIMARY KEY (SeID),
=======
    PRIMARY KEY (SeID)
>>>>>>> Stashed changes
);

CREATE TABLE EnrolledIn
(
    STID INT,
    SeID INT,
    Grade CHAR (2),
    PRIMARY KEY(STID, SeID)
);

CREATE TABLE Class
(
    CLID INT,
    StartTime INT,
    ClassNum INT,
    Building CHAR (30),
    Capacity INT,
    PRIMARY KEY (CLID)
);

CREATE TABLE Timeslot
(
    StartTime TIME,
    /* hour minutes seconds */
    DayWeek CHAR (30),
    CLID INT,
    Endtime TIME,
    PRIMARY KEY (StartTime, DayWeek)
    
);

CREATE TABLE Department
(
    DName CHAR (30),
    IID INT,
    Building CHAR (30),
    PRIMARY KEY (DName)
);

CREATE TABLE Program
(
    PName CHAR (30),
    STID INT,
    TotalCredits INT,
    PRIMARY KEY(PName)
);

CREATE TABLE Course
(
    CID INT,
    CName CHAR (30),
    DName CHAR (30),
    PRIMARY KEY (CID)
);

/*CREATE TABLE PrereqFollow
(
    CID INT,
    PRIMARY KEY(CID)
);*/


CREATE TABLE Supervisor
(
    SupervisorName VARCHAR(20),
    SupervisorID INT,
    PRIMARY KEY(SupervisorID)
);

/* ALTER TABLES TO ADD FOREIGN KEY(S) (because tables would then be interdependent
   and all tables must exist before foreign keys can be chosen) */

-- Student table's foreign key(s)
ALTER TABLE Student ADD FOREIGN KEY (PName) REFERENCES Program (PName);
ALTER TABLE Student ADD FOREIGN KEY (SeID) REFERENCES Section (SeID);
ALTER TABLE Student ADD FOREIGN KEY (CLID) REFERENCES Class (CLID);
ALTER TABLE Student ADD FOREIGN KEY (StartTime) REFERENCES Timeslot (StartTime);
ALTER TABLE Student ADD FOREIGN KEY (IID) REFERENCES Instructor (IID);
ALTER TABLE Student ADD FOREIGN KEY (DName) REFERENCES Department (DName);

-- Belong table's foreign key(s)
-- N/A

-- Undergraduate table's foreign key(s)
ALTER TABLE Undergraduate ADD FOREIGN KEY (STID) REFERENCES Student (STID);

-- Graduate table's foreign key(s)
ALTER TABLE Graduate ADD FOREIGN KEY (STID) REFERENCES Student (STID);

-- ResearchFunding table's foreign key(s)
ALTER TABLE ResearchFunding ADD FOREIGN KEY (STID) REFERENCES Graduate (STID);

-- TeachingAssistant table's foreign key(s)
ALTER TABLE TeachingAssistant ADD FOREIGN KEY (STID) REFERENCES Graduate (STID);

-- Fund table's foreign key(s)
ALTER TABLE Fund ADD FOREIGN KEY (TAID) REFERENCES Graduate (STID);
ALTER TABLE Fund ADD FOREIGN KEY (RID) REFERENCES Graduate (STID);

-- Work table's foreign key(s) [THIS SEEMS TO BE AN UNUSED TABLE, SO I'M COMMENTING THE SYNTAX BELOW]
--ALTER TABLE Work ADD FOREIGN KEY (DName) REFERENCES Department (DName);
--ALTER TABLE Work ADD FOREIGN KEY (IID) REFERENCES Instructor (IID);


-- Teach table's foreign key(s) [THIS SEEMS TO BE AN UNUSED TABLE, SO I'M COMMENTING THE SYNTAX BELOW]
--ALTER TABLE Teach ADD FOREIGN KEY (SeID) REFERENCES Section (SeID),
--ALTER TABLE Teach ADD FOREIGN KEY (IID) REFERENCES Instructor (IID)

-- Section table's foreign key(s)
ALTER TABLE Section ADD FOREIGN KEY (PName) REFERENCES Program (PName);
ALTER TABLE Section ADD FOREIGN KEY (CLID) REFERENCES Class (CLID);
ALTER TABLE Section ADD FOREIGN KEY (STID) REFERENCES Student (STID);

-- EnrolledIn table's foreign key(s)
ALTER TABLE EnrolledIn ADD FOREIGN KEY (SeID) REFERENCES Section (SeID);
ALTER TABLE EnrolledIn ADD FOREIGN KEY (STID) REFERENCES Student (STID);

-- Class table's foreign key(s)
ALTER TABLE Class ADD FOREIGN KEY (StartTime) REFERENCES Timeslot(StartTime);
ALTER TABLE Class ADD FOREIGN KEY (DayWeek) REFERENCES Timeslot (DayWeek);

-- Timeslot table's foreign key(s)
ALTER TABLE Timeslot ADD FOREIGN KEY (CLID) REFERENCES Class(CLID);

-- Department table's foreign key(s)
ALTER TABLE Department ADD FOREIGN KEY (IID) REFERENCES Instructor (IID);

-- Program table's foreign key(s)
ALTER TABLE Program ADD FOREIGN KEY (STID) REFERENCES Student (STID);

-- Course table's foreign key(s)
ALTER TABLE Course ADD FOREIGN KEY (DName) REFERENCES Department (DName);

-- PrereqFollow table's foreign key(s) [THIS SEEMS TO BE AN UNUSED TABLE, SO I'M COMMENTING THE SYNTAX BELOW]
--ALTER TABLE PrereqFollow ADD FOREIGN KEY (CID) REFERENCES Course (CID);

-- Supervisor table's foreign key(s)
-- N/A

-- INSERTION OF VALUES INTO TABLES

-- Value(s) to insert into Student table
INSERT INTO Student VALUES(566090795, 90, 'Linus', 'Torvards', 4.0, 'ComputerScience');

-- Value(s) to insert into Program table
INSERT INTO Program VALUES('Computer Science', 72);
