/* Query 1 - WORKS */
/*
 Find ID, first name and last name of all the students who have taken
Database course and received an A or A+ grade for the course.
 */
SELECT S.STID as Student_ID, S.FirstName as First_name, S.LastName as Last_name
FROM Student S
    INNER JOIN EnrolledIn E ON S.STID = E.STID
    INNER JOIN Section Se ON E.SeID = Se.SeID
    INNER JOIN Has ON Has.SeID=Se.SeID
    INNER JOIN Course C ON Has.CID = C.CID
WHERE C.CName='COMP352' AND (E.Grade='A' OR E.Grade='A+');

/* Query 2 - WORKS */
/*
 Find ID, first name, last name and number of programs of students who
are enrolled in at least two different programs in the Computer Science
department.
 */
SELECT Student.STID as Student_ID, FirstName as First_name, LastName as Last_name, COUNT(Program.PName) as Number_of_Programs
FROM Student
    INNER JOIN Belong B ON Student.STID = B.STID
    INNER JOIN Program ON B.PName = Program.PName
GROUP BY Student.STID
HAVING COUNT(Program.PName)>1;

/* Query 3 WORKS*/
/*
 Find the name of all the instructors who taught Comp 352 in the fall term
of 2018 but have never taught the same course before
 */
SELECT I.Name, C.CName, S.Year, S.Semester, I.IID, S.SeID, C.CID
FROM Instructor I
    INNER JOIN Teach T ON T.IID = I.IID
    INNER JOIN Section S ON T.SeID = S.SeID
    INNER JOIN Has H ON S.SeID = H.SeID
    INNER JOIN Course C ON H.CID = C.CID
WHERE C.CName = 'COMP352' AND S.Year = 2018 AND S.Semester = 'Fall';


/* Query 4  WORKS */
/*
 Find the name of all the programs offered by the Computer Science
department along with the number of credits required for completion in
each program
 */
SELECT DISTINCT P.PName as Program, P.TotalCredits as Total_credits
FROM Under
    INNER JOIN Program P ON Under.PName = P.PName
WHERE Under.DName='Computer Science';

/*CHANGED 5 WORKS*/
/*
 Find the name and IDs of all the undergraduate students who do not have
an advisor.
 */
SELECT DISTINCT S.STID as Student_ID, S.firstName as First_name
FROM Student S
    INNER JOIN Belong B ON B.STID=S.STID
    INNER JOIN Undergraduate U ON U.STID=S.STID
WHERE B.Advisor='';

/* Query 6 WORKS */
/*
 Find the ID, name and assignment mandate of all the graduate students
who are assigned as teaching assistants to Comp 353 for the summer term
of 2019.
 */
SELECT S.STID as Student_ID, S.FirstName as First_name, S.LastName as Last_name, TA.AssignmentMarking as assignment_mandate
FROM Section
    INNER JOIN Has ON Has.SeID=Section.SeID
    INNER JOIN Course ON Has.CID=Course.CID
    INNER JOIN AssignTo A ON Section.SeID = A.SeID
    INNER JOIN TeachingAssistant TA ON A.TAID = TA.TAID
    INNER JOIN Teach T ON Section.SeID = T.SeID
    INNER JOIN EnrolledIn EI ON Section.SeID = EI.SeID
    INNER JOIN Student S on EI.STID = S.STID
WHERE CName='COMP353' AND Semester='Summer' AND Year=2019;

/* Query 7 WORKS  */
/*
 Find the name of all the supervisors in the Computer Science department
who have supervised at least 20 students.
 */
SELECT Instructor.Name
FROM Instructor
    INNER JOIN Supervisor S ON Instructor.IID = S.IID
    INNER JOIN Supervises S2 ON S.SupID = S2.SupID
GROUP BY Instructor.Name
HAVING COUNT(*) >= 20;

/* Query 8 WORKS*/
/*
Find the details of all the courses offered by the Computer Science
department for the summer term of 2019. Details include Course name,
section, room location, start and end time, professor teaching the course,
max class capacity and number of enrolled students.
 */
SELECT Course.CName as Course_name , Section.SeID as 'Section', Class.Building, Class.ClassNum as Room_location, Class.Capacity as Room_capacity, ClassTimeslot.StartTime as Class_start_time, ClassTimeslot.EndTime as Class_end_time
FROM Course
    INNER JOIN Has ON Course.CID = Has.CID
    INNER JOIN Section ON Has.SeID = Section.SeID
    INNER JOIN EnrolledIn EI ON Section.SeID = EI.SeID
    INNER JOIN Student S ON EI.STID = S.STID
    INNER JOIN Belong B ON S.STID = B.STID
    INNER JOIN Program P ON B.PName = P.PName
    INNER JOIN Under U ON P.PName = U.PName
    INNER JOIN Department D ON U.DName = D.DName
    INNER JOIN ClassTimeslot ON Section.SeID = ClassTimeslot.SeID
    INNER JOIN Class ON ClassTimeslot.CLID = Class.CLID
WHERE D.DName = 'Computer Science' AND Section.Semester='Summer' AND Section.Year=2019;

/* Query 9 */
/*
 For each department, find the total number of courses offered by the
department.
 */
SELECT D.DName as Department, COUNT(Course.CID) as Number_of_courses
FROM Course
    INNER JOIN Has ON Course.CID = Has.CID
    INNER JOIN Section ON Has.SeID = Section.SeID
    INNER JOIN EnrolledIn EI ON Section.SeID = EI.SeID
    INNER JOIN Student S ON EI.STID = S.STID
    INNER JOIN Belong B ON S.STID = B.STID
    INNER JOIN Program P ON B.PName = P.PName
    INNER JOIN Under U ON P.PName = U.PName
    INNER JOIN Department D ON U.DName = D.DName
GROUP BY D.DName;

/* Query 10 */
/*
For each program, find the total number of students enrolled into the
program.
 */
SELECT Program.PName as Program, COUNT(S.STID) as Enrolled_Students
FROM Program
    INNER JOIN Belong B ON Program.PName = B.PName
    INNER JOIN Student S ON B.STID = S.STID
GROUP BY Program.PName;