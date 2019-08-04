CREATE TABLE Campus
(
    CampID INT PRIMARY KEY,
    Name CHAR(30)
);

CREATE TABLE Block
(
    Name CHAR(30) PRIMARY KEY,
    Address VARCHAR(30),
    NumFloors INT
);

CREATE TABLE Room
(
    RoID INT PRIMARY KEY
);

CREATE TABLE DeptCamp
(
    DName CHAR(30),
    Chairman CHAR(30),
    CampID INT,
    FOREIGN KEY (DName) REFERENCES Department (DName),
    FOREIGN KEY (Chairman) REFERENCES Department (Chairman)
);
Create TABLE Within
(
    CID INT,
    DName CHAR(30),
    FOREIGN KEY (CID) REFERENCES Course (CID)
)

CREATE TABLE BlockCamp
(
    Name CHAR(30),
    CampID INT,
    FOREIGN KEY (Name) REFERENCES Building (Name),
);

CREATE TABLE BlockRoom
(
    Name CHAR(30),
    RoID INT,
    FOREIGN KEY (Name) REFERENCES Building (Name),
    FOREIGN KEY (RoID) REFERENCES Room (RoID)
);

CREATE TABLE Office
(
    RoID INT PRIMARY KEY,
    FOREIGN KEY (RoID) REFERENCES Room (RoID)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ConferenceRoom
(
    RoID INT PRIMARY KEY,
    FOREIGN KEY (RoID) REFERENCES Room (RoID)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Facilities
(
    Equipement CHAR(30)
);

/* Have to check these two tables (Follow and PreReq) */
CREATE TABLE Follow
(
    CID INT
);

CREATE TABLE PreReq
(
    CID INT,
    PreReq INT
);

CREATE TABLE StDegHist
(
    DegreeName CHAR(30),
    OverallAvg FLOAT,
    InstitutionName CHAR(30),
    DateReceived DATE
);

CREATE TABLE StHomeAddress
(
    City CHAR(30),
    Province CHAR(30),
    CivicNumber INT,
    PostalCode INT
);

CREATE TABLE GradAwards
(
    AwardName CHAR(30),
    DateReceived DATE
);

CREATE TABLE GradUniversityDegrees
(
    UniDegree CHAR(30),
    UniName CHAR(30)
);

CREATE TABLE GradPublications
(
    PubName CHAR(30),
    PubDate DATE
);

CREATE TABLE GradExperience
(
    JobPosition CHAR(30),
    TimeHeld FLOAT
);

CREATE TABLE InsExperience
(
    JobPosition CHAR(30),
    TimeHeld FLOAT
);

CREATE TABLE InsAwards
(
    AwardName CHAR(30),
    DateReceived DATE
);

CREATE TABLE InsPublication
(
    PubName CHAR(30),
    PubDate CHAR(30)
);

CREATE TABLE InsUniversityDegrees
(
    UniName CHAR(30),
    UniDegree CHAR(30)
);

CREATE TABLE AssignHist
(
    AssignID INT PRIMARY KEY
);

CREATE TABLE Contracts
(
    Course INT PRIMARY KEY,
    Date DATE,
    Amount FLOAT
);

CREATE TABLE SalaryHist
(
    Salary FLOAT PRIMARY KEY
);

CREATE TABLE InsHomeAddress
(
    City CHAR(30),
    Province CHAR(30),
    CivicNumber INT,
    PostalCode INT
);

/* is good Deniz */

CREATE TABLE Student
(
    STID INT,
    SSN INT,
    Email CHAR(30),
    GPA FLOAT,
    Credit INT,
    Phone INT,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    PRIMARY KEY(STID, SSN)
);

CREATE TABLE Graduate
(
    STID INT,
    SSN INT,
    Thesis INT DEFAULT 0,
    PRIMARY KEY(STID, SSN),
    FOREIGN KEY (STID) REFERENCES Student(STID),
    FOREIGN KEY (SSN) REFERENCES Student(SSN)
);

CREATE TABLE Supervisor
(
    SupervisorID INT,
    PRIMARY KEY(SupervisorID)
);


CREATE TABLE Supervises
(
    SupID INT,
    STID INT,
    SSN INT,
    FOREIGN KEY (SupID) REFERENCES Supervisor(SupID),
    FOREIGN KEY (STID) REFERENCES Graduate(STID),
    FOREIGN KEY (SSN) REFERENCES Graduate(SSN)
);

