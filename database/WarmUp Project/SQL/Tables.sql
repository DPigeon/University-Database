CREATE TABLE AssignTo
(
    SeID INT,
    TAID INT,
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (TAID) REFERENCES TeachingAssistant (TAID)
);
CREATE TABLE Belong
(
    STID INT,
    PName CHAR (30),
    Advisor CHAR (30),
    FOREIGN KEY (STID) REFERENCES Student (STID),
    FOREIGN KEY (PName) REFERENCES Program (PName)
);
CREATE TABLE Class
(
    CLID INT PRIMARY KEY,
    ClassNum INT,
    Building CHAR (30),
    Capacity INT
);
CREATE TABLE ClassTimeslot
(
    StartTime TIME,
    DayWeek CHAR (30),
    CLID INT,
    SeID INT,
    EndTime TIME,
    PRIMARY KEY (StartTime, DayWeek),
    FOREIGN KEY (CLID) REFERENCES Class (CLID),
    FOREIGN KEY (SeID) REFERENCES Section (SeID)
);
CREATE TABLE Course
(
    CID INT PRIMARY KEY,
    CName CHAR (30) REFERENCES Class (CName),
);
CREATE TABLE Department
(
    DName CHAR (30) PRIMARY KEY,
    Building CHAR (30)
);
CREATE TABLE EnrolledIn
(
    STID INT,
    SeID INT,
    Grade CHAR (2),
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (STID) REFERENCES Student (STID)
);
CREATE TABLE Fund
(
    STID INT,
    TAID INT,
    RID INT,
    FOREIGN KEY (STID) REFERENCES Graduate (STID),
    FOREIGN KEY (TAID) REFERENCES TeachingAssistant (TAID),
    FOREIGN KEY (RID) REFERENCES ResearchFunding (RID)
);
CREATE TABLE Graduate
(
    STID INT PRIMARY KEY,
    FOREIGN KEY (STID) REFERENCES Student (STID)
);
CREATE TABLE Has
(
    CID INT,
    SeID INT,
    FOREIGN KEY (CID) REFERENCES Course (CID),
    FOREIGN KEY (SeID) REFERENCES Section (SeID)
);
CREATE TABLE Instructor
(
    IID INT PRIMARY KEY,
    Name CHAR(30),
    Supervised INT
);
CREATE TABLE Program
(
    PName CHAR (30) PRIMARY KEY,
    TotalCredits INT
);
CREATE TABLE ResearchFunding
(
    RID INT PRIMARY KEY,
    Amount INT
);
CREATE TABLE Section
(
    SeID INT PRIMARY KEY,
    Semester CHAR (30),
    Year INT
);
CREATE TABLE Student
(
    STID INT PRIMARY KEY,
    Credit INT,
    FirstName CHAR (30),
    LastName CHAR (30),
    GPA FLOAT
);
CREATE TABLE Supervises
(
    SupID INT,
    STID INT,
    FOREIGN KEY (SupID) REFERENCES Supervisor (SupID),
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
);
CREATE TABLE Supervisor
(
    SupID INT PRIMARY KEY,
    IID INT,
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);
CREATE TABLE Teach
(
    SeID INT,
    IID INT,
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);
CREATE TABLE TeachingAssistant
(
    TAID INT PRIMARY KEY,
    TotalHours INT,
    AssignmentMarking CHAR(1),
    LabInstructor CHAR(1),
    NumCourses INT,
    TutorialSession CHAR(1)
);
CREATE TABLE Under
(
    DName CHAR(30),
    PName CHAR(30),
    FOREIGN KEY (DName) REFERENCES Department (DName),
    FOREIGN KEY (PName) REFERENCES Program (PName)
);
CREATE TABLE Undergraduate
(
    STID INT PRIMARY KEY,
    FOREIGN KEY (STID) REFERENCES Student (STID)
);
CREATE TABLE Within
(
    CID INT,
    DName CHAR(30) REFERENCES Department (DName),
    FOREIGN KEY (CID) REFERENCES Course (CID)
);
CREATE TABLE Work
(
    DName INT,
    IID INT,
    FOREIGN KEY (DName) REFERENCES Department (DName),
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);



