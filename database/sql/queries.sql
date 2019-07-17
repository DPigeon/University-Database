/* All queries needed for the warmUp project */

/* Query 1 - WORKS */
SELECT S.STID, S.FirstName, S.LastName
FROM Student S INNER JOIN EnrolledIn E ON S.STID = E.STID
INNER JOIN Section Se ON E.SeID = Se.SeID INNER JOIN Course C ON Se.CID = C.CID
WHERE C.CName='COMP352' AND (E.Grade='A' OR E.Grade='A+');

/* Query 2 - WORKS */
SELECT Student.STID, FirstName, LastName, COUNT(Program.PName)
FROM Student INNER JOIN Belong B on Student.STID = B.STID inner join Program ON Student.PName = Program.PName
GROUP BY Student.STID
HAVING COUNT(Program.PName)>1;

/* Query 3 */
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

/* Query 4 */
SELECT DISTINCT P.PName, P.TotalCredit
FROM Program P, department
WHERE DName='ComputerScience';

/* Query 5 */
/*
SELECT U.UName, U.UID
FROM Undergraduate as U
WHERE advisor=NULL;
*/
//cCHANGED 5
SELECT S.STID, S.firstName
FROM Undergraduate U, Students S, Belong B
WHERE B.Advisor=NULL AND S.STID=U.STID AND B.STID=S.STID;
/* Query 6 */
SELECT STID, FirstName, LastName, AssignmentMarking
FROM TeachingAssistant INNER JOIN Section ON TeachingAssistant.STID = Section.STID,
	Section INNER JOIN Course ON Section.CID = Course.CID
WHERE CName='COMP353' AND Semester='Summer' AND Year=2019;

/* Query 7 */
SELECT Instructor.Name
FROM Graduate INNER JOIN Instructors ON Graduate.SupervisorID = Instructor.IID,
	Instructor INNER JOIN Department ON Instructor.DName = Department.DName
GROUP BY Instructor.Name
HAVING DName = 'ComputerScience' AND COUNT(*) >= 20;/* 

/* Query 8 */
SELECT CName, SID, Class.Building, Class.Number, Class.Capacity, Instructor.Name, COUNT(STID)
FROM Department INNER JOIN Course ON Department.DName = Course.DName,
	Department INNER JOIN Instructor ON Department.DName = Instructor.DName,
	Instructor INNER JOIN Section ON Instructor.IID = Section.IID,
	Section INNER JOIN Class ON Class.CLID = Section.SID,
	Timeslot INNER JOIN Class ON Class.CLID = Timeslot.CLID,
	Student INNER JOIN Section ON Section.STID = Student.STID
WHERE DName = 'ComputerScience';

/* Query 9 */
SELECT DName, COUNT(CID)
FROM Department INNER JOIN Course ON Department.DName = Course.DName
GROUP BY DName;

/* Query 10 */
SELECT PName, COUNT(STID)
FROM  Belong ;
GROUP BY PName;
/*
SELECT PName, COUNT(STID)
FROM Program INNER JOIN Student ON Student.STID = Program.STID
GROUP BY PName;
*/
