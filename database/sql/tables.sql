/* Tables */

/* Table Student should be fine */
CREATE TABLE Student /* */
(
    STID INT PRIMARY KEY,
    PName char (30) REFERENCES Program (PName),
    SeID INT REFERENCES Section (SeID),
    Credit INT,
    FirstName CHAR (30),
    LastName CHAR (30),
    GPA FLOAT
);

CREATE TABLE EnrolledIn
(
    STID INT,
    SeID INT,
    Grade CHAR (2),
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (STID) REFERENCES Student (STID)
);

CREATE TABLE Belong
(
    STID INT,
    PName CHAR (30),
    Advisor CHAR (30),
    FOREIGN KEY (STID) REFERENCES Student (STID),
    FOREIGN KEY (PName) REFERENCES Program (PName)
);

CREATE TABLE Undergraduate /* */
(
    STID INT PRIMARY KEY,
    FOREIGN KEY (STID) REFERENCES Student (STID)
);

CREATE TABLE Graduate /* */
(
    STID INT PRIMARY KEY,
    SupervisorID INT,
    TAID INT,
    RID INT,
    FOREIGN KEY (STID) REFERENCES Student (STID),
    FOREIGN KEY (TAID) REFERENCES TeachingAssistant (TAID),
    FOREIGN KEY (RID) REFERENCES ResearchFunding (RID)
);

CREATE TABLE ReseachFunding
(
    RID INT PRIMARY KEY,
    Amount INT,
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
);

CREATE TABLE TeachingAssistant
(
    TAID INT PRIMARY KEY,
    TotalHours INT,
    AssignmentMarking CHAR(1),
    LabInstructor CHAR(1),
    NumCourses INT,
    TutorialSession CHAR(1),
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
);

CREATE TABLE Section
(
    SeID INT PRIMARY KEY,
    IID INT REFERENCES Instructor (IID),
    STID INT REFERENCES Student (STID),
    CLID INT REFERENCES Class (CLID),
    CID INT REFERENCES Course (CID),
    Semester CHAR (30),
    Year INT,
);

CREATE TABLE Work
(
    DName INT,
    IID INT,
    FOREIGN KEY (DName) REFERENCES Department (DName),
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);
CREATE TABLE Teach
(
    SeID INT,
    IID INT,
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);

CREATE TABLE Class
(
    CLID INT PRIMARY KEY,
    StartTime INT REFERENCES Timeslot (StartTime),
    DayWeek INT REFERENCES Timeslot (DayWeek),
    ClassNum INT,
    Building CHAR (30),
    Capacity INT
);

CREATE TABLE Timeslot
(
    StartTime TIME PRIMARY KEY,
    DayWeek CHAR (30) PRIMARY KEY,
    CLID INT REFERENCES Class (CLID),
    CLID INT,
    Endtime TIME
);

CREATE TABLE Department
(
    DName CHAR (30) PRIMARY KEY,
    IID INT REFERENCES Instructor (IID),
    Building CHAR (30)
);

CREATE TABLE Program
(
    PName CHAR (30) PRIMARY KEY,
    DName CHAR (30) REFERENCES Department (DName),
    STID INT REFERENCES Student (STID),
    TotalCredits INT
);

CREATE TABLE Course
(
    CID INT PRIMARY KEY,
    CName CHAR (30) REFERENCES Class (CName),
    DName CHAR (30) REFERENCES Department (DName)
);

CREATE TABLE Has
(
    CID INT,
    SeID INT,
    FOREIGN KEY (CID) REFERENCES Course (CID),
    FOREIGN KEY (SeID) REFERENCES Section (SeID)
);

CREATE TABLE Contain
(
    SeID INT,
    CLID INT,
    FOREIGN KEY (SeID) REFERENCES Section (SeID)
);

