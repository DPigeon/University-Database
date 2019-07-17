/* All queries needed for the warmUp project */

/* Query 1 - WORKS */
/*
 Find ID, first name and last name of all the students who have taken
Database course and received an A or A+ grade for the course.
 */
SELECT S.STID, S.FirstName, S.LastName
FROM Student S INNER JOIN EnrolledIn E ON S.STID = E.STID
INNER JOIN Section Se ON E.SeID = Se.SeID INNER JOIN Has ON Has.SeID=Se.SeID INNER JOIN Course C ON Has.CID = C.CID
WHERE C.CName='COMP352' AND (E.Grade='A' OR E.Grade='A+');

/* Query 2 - WORKS */
/*
 Find ID, first name, last name and number of programs of students who
are enrolled in at least two different programs in the Computer Science
department.
 */
SELECT Student.STID, FirstName, LastName, COUNT(Program.PName)
FROM Student INNER JOIN Belong B on Student.STID = B.STID inner join Program ON B.PName = Program.PName
GROUP BY Student.STID
HAVING COUNT(Program.PName)>1;

/* Query 3 TODO*/
/*
 Find the name of all the instructors who taught Comp 352 in the fall term
of 2018 but have never taught the same course before
 */
SELECT I.name
from Instructor I INNER JOIN Section S ON S.IID = I.IID INNER JOIN Course C ON C.CID = S.CID
WHERE C.CName='COMP352' AND S.Semester='Fall' AND S.Year=2018
GROUP BY I.IID, S.Year
HAVING S.Year < 2018 AND COUNT(S.Year)=1;

/*work in progress:
SELECT I.Name
FROM Instructor I INNER JOIN Section S ON S.IID = I.IID INNER JOIN Course C ON C.CID = S.CID
WHERE I.Name IN (
    SELECT II.Name
    FROM Instructor II INNER JOIN Section SS ON SS.IID = II.IID INNER JOIN Course CC ON CC.CID = SS.CID
    WHERE CC.CName='COMP352' AND SS.Semester='Fall' AND SS.Year=2018
    ) AND ;
  */

/* Query 4  WORKS */
/*
 Find the name of all the programs offered by the Computer Science
department along with the number of credits required for completion in
each program
 */
SELECT DISTINCT P.Pname, P.TotalCredits
FROM Under inner join Program P on Under.PName = P.PName
WHERE Under.DName='Computer Science';

/*CHANGED 5 WORKS*/
/*
 Find the name and IDs of all the undergraduate students who do not have
an advisor.
 */
SELECT distinct S.STID, S.firstName
FROM Student S INNER JOIN Belong B ON B.STID=S.STID INNER JOIN Undergraduate U ON U.STID=S.STID
WHERE B.Advisor='';

/* Query 6 WORKS */
/*
 Find the ID, name and assignment mandate of all the graduate students
who are assigned as teaching assistants to Comp 353 for the summer term
of 2019.
 */
SELECT S.STID, S.FirstName, S.LastName, TA.AssignmentMarking /* assignment marking */
FROM Section INNER JOIN Has
    ON Has.SeID=Section.SeID
    INNER JOIN Course
        on Has.CID=Course.CID
    INNER JOIN AssignTo A
        on Section.SeID = A.SeID
    INNER JOIN TeachingAssistant TA on A.TAID = TA.TAID
    INNER JOIN Teach T
        on Section.SeID = T.SeID
    INNER JOIN EnrolledIn EI
        on Section.SeID = EI.SeID
    INNER JOIN Student S
        on EI.STID = S.STID
WHERE CName='COMP353' AND Semester='Summer' AND Year=2019;

/* Query 7 TODO */
/*
 Find the name of all the supervisors in the Computer Science department
who have supervised at least 20 students.
 */
SELECT Graduate.SupervisorID
FROM Graduate INNER JOIN Instructors ON Graduate.SupervisorID = Instructor.IID,
	Instructor INNER JOIN Department ON Instructor.DName = Department.DName
GROUP BY Instructor.Name
HAVING Department.DName = 'ComputerScience' AND COUNT(*) >= 3;


/* Query 8 WORKS*/
/*
Find the details of all the courses offered by the Computer Science
department for the summer term of 2019. Details include Course name,
section, room location, start and end time, professor teaching the course,
max class capacity and number of enrolled students.
 */
SELECT Course.CName, Section.SeID, Class.Building, Class.ClassNum, Class.Capacity, ClassTimeslot.StartTime, ClassTimeslot.EndTime
FROM Course INNER JOIN Has
    ON Course.CID = Has.CID
    INNER JOIN Section
        ON Has.SeID = Section.SeID
    INNER JOIN EnrolledIn EI on Section.SeID = EI.SeID
    INNER JOIN Student S on EI.STID = S.STID
    INNER JOIN Belong B on S.STID = B.STID
    INNER JOIN Program P on B.PName = P.PName
    INNER JOIN Under U on P.PName = U.PName
    INNER JOIN Department D on U.DName = D.DName
    INNER JOIN ClassTimeslot
        ON Section.SeID = ClassTimeslot.SeID
    INNER JOIN Class
        ON ClassTimeslot.CLID = Class.CLID
WHERE D.DName = 'Computer Science' AND Section.Semester='Summer' AND Section.Year=2019;

/* Query 9 */
/*
 For each department, find the total number of courses offered by the
department.
 */
SELECT D.DName, COUNT(Course.CID)
FROM Course INNER JOIN Has
    ON Course.CID = Has.CID
    INNER JOIN Section
        ON Has.SeID = Section.SeID
    INNER JOIN EnrolledIn EI on Section.SeID = EI.SeID
    INNER JOIN Student S on EI.STID = S.STID
    INNER JOIN Belong B on S.STID = B.STID
    INNER JOIN Program P on B.PName = P.PName
    INNER JOIN Under U on P.PName = U.PName
    INNER JOIN Department D on U.DName = D.DName
GROUP BY D.DName;

/* Query 10 */
/*
For each program, find the total number of students enrolled into the
program.
 */
SELECT Program.PName, COUNT(S.STID)
FROM  Program INNER JOIN Belong B on Program.PName = B.PName INNER JOIN Student S on B.STID = S.STID
GROUP BY Program.PName;


