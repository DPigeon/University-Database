/* All queries needed for the warmUp project */

/* 
Query 1 */SELECT Student.STID, FirstName, LastName
FROM Student INNER JOIN Course ON Course.CID = Student.CID,
	Student INNER JOIN EnrolledIn ON Student.STID = EnrolledIn.STID
WHERE CName='COMP352' AND (Grade='A' OR Grade='A+');

/* 

Query 2 */SELECT Student.STID, FirstName, LastName, COUNT(Program.PName)
FROM Student INNER JOIN Program ON Student.PName = Program.PName
GROUP BY Student.STID
HAVING COUNT(Program.PName)>1;

/* 

Query 3 */SELECT Instructor.name, count(Instructor.Name)
FROM Section INNER JOIN Course ON Section.CID = Course.CID,
	Section INNER JOIN Instructor ON Instructor.IID = Section.IID
GROUP BY Instructor.name
Having CName='COMP352' AND Semester='Fall' AND Year=2018 AND count(Instructor.Name)=1;

/* 

Query 4 */SELECT DISTINCT P.PName, P.TotalCredit
FROM Program P, department
WHERE DName='ComputerScience';

/*

Query 5 */SELECT U.UName, U.UID
FROM Undergraduate as U
WHERE advisor=NULL;

/* 

Query 6 */SELECT STID, FirstName, LastName, AssignmentMarking
FROM TeachingAssistant INNER JOIN Section ON TeachingAssistant.STID = Section.STID,
	Section INNER JOIN Course ON Section.CID = Course.CID
WHERE CName='COMP353' AND Semester='Summer' AND Year=2019;

/* 

Query 7 */SELECT Instructor.Name
FROM Graduate INNER JOIN Instructors ON Graduate.SupervisorID = Instructor.IID,
	Instructor INNER JOIN Department ON Instructor.DName = Department.DName
GROUP BY Instructor.Name
HAVING DName = 'ComputerScience' AND COUNT(*) >= 20;/* 

Query 8 */SELECT CName, SID, Class.Building, Class.Number, Class.Capacity, Instructor.Name, COUNT(STID)
FROM Department INNER JOIN Course ON Department.DName = Course.DName,
	Department INNER JOIN Instructor ON Department.DName = Instructor.DName,
	Instructor INNER JOIN Section ON Instructor.IID = Section.IID,
	Section INNER JOIN Class ON Class.CLID = Section.SID,
	Timeslot INNER JOIN Class ON Class.CLID = Timeslot.CLID,
	Student INNER JOIN Section ON Section.STID = Student.STID
WHERE DName = 'ComputerScience';

/* 

Query 9 */SELECT DName, COUNT(CID)
FROM Department INNER JOIN Course ON Department.DName = Course.DName
GROUP BY DName;

/* 
	  
Query 10 */SELECT PName, COUNT(STID)
FROM Program INNER JOIN Student ON Student.STID = Program.STID
GROUP BY PName;

/*