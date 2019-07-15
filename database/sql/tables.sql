/* Tables */

/* Table Student should be fine */
CREATE TABLE Student
(
    STID INT,
    PName char (30) REFERENCES Program (PName),
    SeID INT REFERENCES Section (SeID),
    Credit INT,
    FirstName CHAR (30),
    LastName CHAR (30),
    GPA FLOAT,
    PRIMARY KEY (STID)
);

INSERT INTO Student
VALUES
    (566090795, 90, 'Linus', 'Torvards', 4.0, 'ComputerScience');

CREATE TABLE Belong
(
    STID INT,
    PName CHAR (30),
    Advisor CHAR (30),
    FOREIGN KEY (STID) REFERENCES Student (STID),
    FOREIGN KEY (PName) REFERENCES Program (PName)
);

CREATE TABLE Undergraduate
(
    STID INT,
    FOREIGN KEY (STID) REFERENCES Student (STID)
);

CREATE TABLE Graduate
(
    STID INT,
    SupervisorID INT,
    FOREIGN KEY (STID) REFERENCES Student (STID)
);

CREATE TABLE ReseachFunding
(
    RID INT,
    STID INT,
    Amount INT,
    PRIMARY KEY (RID),
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
);

CREATE TABLE TeachingAssistant
(
    TAID INT,
    TotalHours INT,
    AssignmentMarking CHAR(1),
    LabInstructor CHAR(1),
    NumCourses INT,
    TutorialSession CHAR(1),
    PRIMARY KEY (TAID),
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
);
CREATE TABLE Fund
(
    TAID INT,
    RID INT,
    //edit adding STID INT
    STID INT,
    FOREIGN KEY (STID) REFERENCES Graduate (STID)
)
//adding instructor
CREATE TABLE Instructor 
(
    IID INT,
    Name CHAR(30),
    PRIMARY KEY (IID));
    
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

CREATE TABLE Section
(
    SeID INT,
    Semester CHAR (30),
    Year INT,
    PRIMARY KEY (SeID),
);

CREATE TABLE EnrolledIn
(
    STID INT,
    SeID INT,
    Grade CHAR (2),
    FOREIGN KEY (SeID) REFERENCES Section (SeID),
    FOREIGN KEY (STID) REFERENCES Student (STID)
);

CREATE TABLE Class
(
    CLID INT,
    StartTime INT,
    ClassNum INT,
    Building CHAR (30),
    Capacity INT,
    PRIMARY KEY (CLID),
    FOREIGN KEY (StartTime) REFERENCES Timeslot (StartTime),
    FOREIGN KEY (DayWeek) REFERENCES Timeslot (DayWeek)
);

CREATE TABLE Timeslot
(
    StartTime TIME,
    /* hour minutes seconds */
    DayWeek CHAR (30),
    CLID INT,
    Endtime TIME,
    PRIMARY KEY (StartTime),
    PRIMARY KEY (DayWeek),
    FOREIGN KEY (CLID) REFERENCES Class (CLID)
);

CREATE TABLE Department
(
    DName CHAR (30),
    IID INT,
    Building CHAR (30),
    PRIMARY KEY (DName),
    FOREIGN KEY (IID) REFERENCES Instructor (IID)
);

CREATE TABLE Program
(
    PName CHAR (30),
    STID INT,
    TotalCredits INT,
    PRIMARY KEY (PName),
    FOREIGN KEY (STID) REFERENCES Student (STID)
);
INSERT INTO Program
VALUES
    ('Computer Science', 72);

CREATE TABLE Course
(
    CID INT,
    CName CHAR (30),
    DName CHAR (30),
    PRIMARY KEY (CID),
    FOREIGN KEY (DName) REFERENCES Department (DName)
);


