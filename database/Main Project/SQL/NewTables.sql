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

-- I / Deniz added the following (which is all commented), and I changed nothing above, so if what I did is bad, all that needs to be done is removed this comment and everything below it.
/*
CREATE TABLE Student(
    SSN INT,
    GPA DECIMAL(1,1),
    PhoneNumber INT,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    PRIMARY KEY(SSN)
);

CREATE TABLE Graduate (
    SSN INT,
    PRIMARY KEY(SSN),
    FOREIGN KEY SSN REFERENCES Student(SSN)
)

CREATE TABLE Supervisor(
    SupervisorID INT,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    PRIMARY KEY(SupervisorID)
);


CREATE TABLE Supervises(
    SSSN INT,
    GSSN INT,
    PRIMARY KEY(SSSN, GSSN),
    FOREIGN KEY (SSSN) REFERENCES Supervisor(SSN),
    FOREIGN KEY (GSSN) REFERENCES Graduate(SSN)
);

*/