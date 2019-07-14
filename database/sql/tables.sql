/* - Student: all attributes from table+ID renamed to STID+many to one relation ‘’Belong’’ i.e added primary key Pname from program
   - I removed the M to 1  relation Study to department because a student can study in many departments and this link is encapsulated in the ‘’Belong’’
   - **Edit M to M not M to 1 added Belong table removed advisor from student** 
*/

/* Note from David: shouldn't we define our PRIMARY KEY and FOREIGN KEY ? */
CREATE TABLE Student
(
    STID INT,
    Credit INT,
    FirstName CHAR (30),
    LastName CHAR (30),
    GPA FLOAT,
    PName CHAR (30)
);

INSERT INTO Student
VALUES
    (566090795, 90, 'Linus', 'Torvards', 4.0, 'ComputerScience');

CREATE TABLE Belong
(
    STID INT,
    PName CHAR (30),
    Advisor CHAR (30)
);

/* - Undergraduate: redundant but there is so much to add for grad student I didn’t want to combine in Student */
CREATE TABLE Undergraduate
(
    STID INT
);

/* Graduate: not using null value approach, May need to make a relation to professor i.e SupervisedBy IID instead of an attribute, May need to specify if in thesis based program or course based (can also be done by Null for supervisorID i.e no supervisor because in course based */
CREATE TABLE Graduate
(
    STID INT,
    SupervisorID INT
);

/* ResearchFunding: I changed to a weak entity set and added the attribute ammount */
CREATE TABLE ReseachFunding
(
    RID INT,
    STID INT,
    Amount INT
);

/* 
- Teaching assistant: changed to isa from graduate CHAR(1) b/c Y/N whether assigned or not
- **Changed to Work because can work 2 teaching ass jobs + added CID the course teaching**
*/
CREATE TABLE TeachingAssistant
(
    CID INT,
    TotalHours INT,
    AssignmentMarking CHAR(1),
    LabInstructor CHAR(1),
    TutorialSession CHAR(1)
);
CREATE TABLE Fund
(
    CID INT,
    STID INT
);

/* Instructor copy pasted attributes ID renamed to IID */

/* Work/teach Many to Many tables with 2 primary keys as seen in class */
CREATE TABLE Work
(
    DID INT,
    IID INT
);
CREATE TABLE Teach
(
    SID INT,
    IID INT
);

/* Section ID renamed to SID all attributes from picture */
CREATE TABLE Section
(
    SID INT,
    CLID INT,
    CID INT,
    Semester CHAR (30),
    Year INT
);

/* Take Many to Many from class 2 primary keys, grade is 2 char because Letter+ ‘-’or’+’ I.e A-or D+ */
CREATE TABLE EnrolledIn
(
    STID INT,
    SID INT,
    Grade CHAR (2)
);

/* Class put Number to be key and did the Weak relation */
CREATE TABLE Class
(
    CLID INT,
    Number INT,
    Building CHAR (30),
    Capacity INT
);

/*
- TimeSlot Start time is key and did weak relation 
- I am unsure about wether or not this should be a weak relation or attribute or what To discuss… 
*/
CREATE TABLE Timeslot
(
    StartTime TIME,
    Weekday CHAR (30),
    CLID INT,
    Endtime TIME
);

/* Department copy pasted from picture changed Name to DName */
CREATE TABLE Department
(
    DName CHAR (30),
    Building CHAR (30)
);

/* Program c/p from pic changed name to PName */
CREATE TABLE Program
(
    PName CHAR (30),
    TotalCredits INT
);
INSERT INTO Program
VALUES
    ('Computer Science', 72);

/* There were multiple has so I renamed when appropriate to the intials of the two being linke i.e program –has—department renamed to Program—Pdhas—Department */
CREATE TABLE Under
(
    PName CHAR (30),
    DName CHAR (30)
);

/* 
- Note university –has—dep is redundant as there is only 1 university so it is not included
- Course id changed to CID and name changed to Cname added 1 to1 prerequisite Id attricute 
*/
CREATE TABLE Course
(
    CID INT,
    CName CHAR (30),
    DName CHAR (30)
);
CREATE TABLE PrereqFollow
(
    CID INT,
    PrereqCID INT
);

/* 
- DChas: DEPARTMENT has course many to many
- CShas Course has section many to 1 
*/



