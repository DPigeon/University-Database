/* Note: 'input' will be an input from the UI on the php UI */

/* i)
 * Create/Delete/Edit/Display a faculty member. 
 */

INSERT INTO Instructor
VALUES(IID, ISSN, Phone, FirstName, SupID, Email, LastName);

UPDATE Instructor 
  SET input = input 
  WHERE IID = input;

/* Display */
SELECT *
FROM Instructor;

DELETE FROM Instructor
  WHERE IID = input;

/* ii)
 * Create/Delete/Edit/Display a Student. 
 */

INSERT INTO Student
VALUES(STID, Credit, FirstName, LastName, GPA, SSN, Phone, Email);

DELETE FROM Student
  WHERE STID = input;

/* Display */
SELECT *
FROM Student;

UPDATE Student 
  SET input = input 
  WHERE STID = input;

/* iii)
 * Create/Delete/Edit/Display a Teaching Assistant 
 */

/* Check if STID is in Graduate table first */
INSERT INTO TeachingAssistant
VALUES(TAID, TotalHours, AssignmentMarking, LabInstructor, NbCourses, TutorialSession);

DELETE FROM TeachingAssistant
  WHERE TAID = input;

/* Display */
SELECT S.FirstName, S.LastName, S.Email, S.Credit, S.GPA
FROM Student S INNER JOIN IsTA TA on TA.STID = S.STID
WHERE S.GPA > 3.2;

UPDATE TeachingAssistant
  SET input = input 
  WHERE TAID = input;

/* iv)
 * Give a list of all campuses.
 */

SELECT distinct Name
FROM Campus
GROUP BY Name;

/* v)
 * Give a list of buildings on a given campus. 
 */

SELECT BName
FROM BlockCamp
WHERE CampID = 7;

/* vi)
 * Give details of a specific building (this include address of the building,
 * number of floors, number of rooms in each floor, and details of each room
 * such as room type, capacity of the room and existing facilities in the room
 * if it is a classroom or a lab.
 */

SELECT B.Address, B.NumFloors, B.NumRooms, R.type, CASE
  WHEN R.Type='Labroom' or R.Type='Classroom' THEN R.Capacity
  END as 'Capacity', CASE
  WHEN R.Type='Labroom' or R.Type='Classroom' THEN F.equipment
  END as 'Equipment'
FROM Block B
  INNER JOIN BlockRoom BR on B.BName=BR.BName
  INNER JOIN Room R on R.RoID=BR.RoID
  INNER JOIN Contains C on R.RoID=C.RoID
  INNER JOIN Facility F on F.facID=C.facID
WHERE B.BName = 'B Block';


/* vii)
 * Get a list of all programs available in a specific department along with the
 * number of credits required for completion in each program.
 */

SELECT P.PName, P.TotalCredits
FROM Program P
  INNER JOIN Under U on P.PName = U.PName
  INNER JOIN Department D on D.DName=U.DName
WHERE D.DName='Engineering';

/* viii)
 * Get a list of all courses offered in a given term by a specific program.
 */

SELECT C.CName, P.PName
FROM Section S
  INNER JOIN Has H on S.SeID = H.SeID
  INNER JOIN Course C on C.CID = H.CID
  INNER JOIN Within W on W.CID = C.CID
  INNER JOIN Department D on W.DName = D.DName
  INNER JOIN Under U on U.DName = D.DName
  INNER JOIN Program P on P.PName = U.PName
WHERE S.Semester='Fall' AND P.PName = 'Canadian History'
GROUP BY P.PName;

/* ix)
 * Get the details of all the courses offered by a specific department for a
 * specific term. Details include Course name, section, room location, start
 * and end time, professor teaching the course, max class capacity and
 * number of enrolled students.
 */

SELECT distinct C.CName, T.IID , I.FirstName, I.LastName, S.SeID, S.Year, S.Semester, CT.DayWeek, CT.StartTime, CT.EndTime, CT.RoID, R.Capacity, B.Address
FROM Instructor I
  INNER JOIN Teach T on I.IID = T.IID
  INNER JOIN Section S on T.SeID = S.SeID
  INNER JOIN Has H on S.SeID = H.SeID
  INNER JOIN Course C on H.CID = C.CID
  INNER JOIN Within W on C.CID = W.CID
  INNER JOIN Department D on D.DName = W.DName
  INNER JOIN DeptCamp DC on DC.DName = D.DName
  INNER JOIN ClassTimeslot CT on S.SeID = CT.SeID
  INNER JOIN Room R on R.RoID=CT.RoID
  INNER JOIN BlockRoom on R.RoID = BlockRoom.RoID
  InNER JOIN Block B on BlockRoom.BName = B.BName
WHERE D.DName = 'Physics' AND S.Semester = 'Winter';


/* x)
 * SELECT C.CName, S.SeID, B.Address, CLT.startTime,CLT.endtime
 * FROM Course C, Section S, ClassTimeSlot CLT, Block B
 */

SELECT S.STID, S.FirstName, S.LastName
FROM Student S, Belong B, Section SEC, EnrolledIn E
WHERE B.PName='Arts' AND B.STID=S.STID AND Semester='Summer' AND E.SeID=SEC.SeID AND E.STID=S.STID;

/* xi)
 * Find the name of all the instructors who taught a given course on a
 * specific term.
 */

SELECT I.FirstName, I.LastName
FROM Course C
  INNER JOIN Has H on H.CID = C.CID
  INNER JOIN Section S on H.SeID = S.SeID
  INNER JOIN Teach T on T.SeID = S.SeID
  INNER JOIN Instructor I on T.IID = I.IID
WHERE C.CName = 'COMP352' AND S.Semester = 'Summer';

/* xii)
 * Give a list of all supervisors in a given department.
 */

SELECT I.FirstName, I.LastName, D.DName
FROM Instructor I
  INNER JOIN Work W on I.IID = W.IID
  INNER JOIN Department D on D.DName = W.DName
  INNER JOIN Supervisor S on S.SupID=I.IID
Where D.DName='Computer Science'
GROUP BY I.FirstName;

/* xiii)
 * Give a list of all the advisors in a given department.
 */

SELECT B.Advisor, D.DName
FROM Belong B
  INNER JOIN Program P on P.PName = B.PName
  INNER JOIN Under U on U.PName = P.PName
  INNER JOIN Department D on U.DName = D.DName
WHERE D.DName = 'Anthropology'
GROUP BY B.Advisor;

/* xiv)
 * Find the name and IDs of all the graduate students who are supervised by
 * a specific Professor.
 */

SELECT ST.FirstName, ST.LastName, ST.STID
FROM Student ST
  INNER JOIN Graduate G on ST.STID = G.STID
  INNER JOIN Supervises SP on G.STID = SP.STID
  INNER JOIN Supervisor S on SP.SupID = S.SupID
  INNER JOIN Instructor I on I.IID= S.SupID
WHERE I.IID = 1;

/* xv)
 * Find the ID, name and assignment mandate of all the graduate students
 * who are assigned as teaching assistants to a specific course on a given
 * term.
 */

select Student.STID, Student.FirstName, Student.LastName, TeachingAssistant.AssignmentMarking
from Student
  INNER JOIN Graduate on Student.STID = Graduate.STID
  INNER JOIN IsTA on IsTA.STID=Graduate.STID
  INNER JOIN TeachingAssistant on TeachingAssistant.TAID=IsTA.TAID
  INNER JOIN AssignTo on AssignTo.TAID=TeachingAssistant.TAID
  INNER JOIN Section S on AssignTo.SeID = S.SeID
  INNER JOIN Has H on S.SeID = H.SeID
  INNER JOIN Course C on H.CID = C.CID
WHERE C.CID='1' and Semester='Summer';

/* xvi)
 * Find the name, IDs and total amount of funds received by all the graduate
 * students who received research funds in a given term.
 */

SELECT S.STID, S.FirstName, S.LastName, SUM(RF.Amount)
FROM Graduate G , Student S, Fund F, ResearchFunding RF
WHERE S.STID=G.STID AND G.STID = F.STID AND F.RID = RF.RID
GROUP BY F.STID;


/* xvii)
 * For each department, find the total number of courses offered by the
 * department and the name of its chairman
 */

SELECT D.DName, D.Chairman, Count(*)
FROM Department D, Within W
WHERE  D.DName=W.DName
GROUP BY W.DName;

/* xviii)
 * For each program, find the total number of students enrolled into the
 * program.
 */

SELECT P.PName, Count(*)
FROM Program P, Under U
WHERE P.PName=U.PName
GROUP BY U.DName;

/*SELECT B.PName, COUNT(S.STID)
FROM Student S, Belong B
WHERE B.STID = S.STID
GROUP BY B.PName;*/

/* xix)
 * Give a list of courses taken by a specific student in a given term.
 */

SELECT C.CName
FROM Course C
  INNER JOIN Has H ON C.CID = H.CID
  INNER JOIN Section Se ON Se.SeID = H.SeID
  INNER JOIN EnrolledIn E ON Se.SeID = E.SeID
  INNER JOIN Student S ON S.STID = E.STID
WHERE S.FirstName = 'James' AND Se.Semester = 'Summer';

/* xx)
 * Register a student in a specific course.
 */

/* Gets the section ID we need */
SELECT Se.SeID
FROM Course C
  INNER JOIN Has H ON C.CID = H.CID
  INNER JOIN Section Se ON Se.SeID = H.SeID
WHERE C.CName = 'COMP249' AND Se.Semester = 'Winter' AND Se.Year = 2020;

/* Gets the student ID we need */
SELECT St.STID
FROM Student St
WHERE St.SSN = '453';

/* We register a student with a section ID and a student ID */
INSERT INTO EnrolledIn
VALUES
  (S.STID, Se.SeID, NULL);

/* xxi)
 * Drop a course from a specific student (look at other dependant tables too)
 */

/* Gets the student ID we need */
SELECT St.STID
FROM Student St
WHERE St.SSN = '453';

/* Gets the section ID we need */
SELECT Se.SeID
FROM Course C
  INNER JOIN Has H ON C.CID = H.CID
  INNER JOIN Section Se ON Se.SeID = H.SeID
WHERE C.CName = 'Bio202' AND Se.Semester = 'Winter' AND Se.Year = 2020;

/* We drop a course from a specific student */
DELETE FROM EnrolledIn
  WHERE STID = 'St.STID' AND SeID = 'Se.SeID'

/* xxii)
 * Give a detailed report for a specific student (This include personal data,
 * academic history, courses taken and grades received for each course,
 * GPA, etc.)
 */

SELECT SHA.City, SHA.Province, SHA.CivicNumber, SHA.PostalCode, SDH.DegreeName, SDH.OverallAvg, SDH.InstitutionName, SDH.DateReceived, E.Grade, C.CName
FROM StHomeAddress SHA, StDegHist SDH, Student S
  INNER JOIN EnrolledIn E ON S.STID = E.STID
  INNER JOIN Section Se ON Se.SeID = E.SeID
  INNER JOIN Has H ON Se.SeID = H.SeID
  INNER JOIN Course C ON C.CID = H.CID
WHERE S.STID = 7 AND SHA.STID = 7 AND SDH.STID = 7
GROUP BY S.STID;
Find the prereq of a course
Select C.CName
From Course C
Where CID IN (Select P.CID1
FROM Course C, PrereqFollow P
Where CName='COMP400' AND C.CID=P.CID2);
Find the FOLLOW of a course
Select C.CName
From Course C
Where CID IN (Select P.CID2
FROM Course C, PrereqFollow P
Where CName='COMP352' AND C.CID=P.CID1);





