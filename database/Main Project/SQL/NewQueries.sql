/* Note: 'input' will be an input from the UI on the php UI */

/* i)
 * Create/Delete/Edit/Display a faculty member. 
 */

INSERT INTO Instructor
VALUES(IID, ISSN, Phone, FirstName, SupID, Email, LastName);

UPDATE Instructor 
SET input = input 
WHERE IID = input

/* Display */
SELECT *
FROM Instructor

DELETE FROM Instructor
WHERE IID = input

/* ii)
 * Create/Delete/Edit/Display a Student. 
 */

INSERT INTO Student
VALUES(STID, Credit, FirstName, LastName, GPA, SSN, Phone, Email);

DELETE FROM Student
WHERE STID = input

/* Display */
SELECT *
FROM Student;

UPDATE Student 
SET input = input 
WHERE STID = input

/* iii)
 * Create/Delete/Edit/Display a Teaching Assistant 
 */

/* Check if STID is in Graduate table first */
INSERT INTO TeachingAssistant
VALUES(TAID, TotalHours, AssignmentMarking, LabInstructor, NbCourses, TutorialSession);

DELETE FROM TeachingAssistant
WHERE TAID = input

/* Display */
SELECT S.FirstName, S.LastName, S.Email, S.Credit, S.GPA
FROM Student S INNER JOIN IsTA TA on TA.STID = S.STID
WHERE S.GPA > 3.2

UPDATE TeachingAssistant
SET input = input 
WHERE TAID = input

/* iv)
 * Give a list of all campuses.
 */

SELECT distinct Name
FROM Campus
GROUP BY Name

/* v)
 * Give a list of buildings on a given campus. 
 */

SELECT BName
FROM BlockCamp
WHERE CampID = 2

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
FROM Block B inner join BlockRoom BR on B.BName=BR.BName inner join Room R on R.RoID=BR.RoID inner join Contains C on R.RoID=C.RoID inner join Facility F on F.facID=C.facID
WHERE B.BName = 'input'


/* vii)
 * Get a list of all programs available in a specific department along with the
 * number of credits required for completion in each program.
 */

SELECT P.Pname, P.TotalCredits
FROM Program P inner join Under U on P.PName = U.PName inner join Department D on D.DName=U.DName
WHERE D.DName='input'

/* viii)
 * Get a list of all courses offered in a given term by a specific program.
 */

SELECT C.Cname, P.Pname
FROM Section S inner join Has H on S.SeID = H.SeID inner join Course C on C.CID = H.CID inner join Within W on W.CID = C.CID inner join Department D on W.Dname = D.Dname inner join Under U on U.Dname = D.Dname inner join Program P on P.Pname = U.Pname
WHERE S.Semester='input'
GROUP BY P.Pname

/* ix)
 * Get the details of all the courses offered by a specific department for a
 * specific term. Details include Course name, section, room location, start
 * and end time, professor teaching the course, max class capacity and
 * number of enrolled students.
 */


/* Not completed yet */
SELECT distinct C.Cname, S.SeID, CT.StartTime, CT.EndTime, B.Address, I.FirstName, R.Capacity
FROM Instructor I inner join Teach T on I.IID = T.IID inner join Section S inner join Has H on S.SeID = H.SeID inner join Course C on H.CID = C.CID inner join Within W on C.CID = W.CID inner join Department D on D.Dname = W.Dname inner join DeptCamp DC on DC.Dname = D.Dname inner join Campus Ca on Ca.CampID = DC.CampID inner join BlockCamp BC on BC.CampID = Ca.CampID inner join Block B on B.BName = BC.BName inner join BlockRoom BR on BR.BName = B.BName inner join Room R on R.RoID=BR.RoID inner join ClassTimeslot CT on S.SeID = CT.SeID inner join Under U on D.DName = U.DName inner join Program P on U.PName = P.PName inner join Belong B2 on P.PName=B2.PName 
WHERE D.Dname = 'Physics' AND S.Semester = 'Winter'


/* x)
 * SELECT C.Cname, S.SeID, B.Address, CLT.startTime,CLT.endtime
 * FROM Course C, Section S, ClassTimeSlot CLT, Block B
 */

SELECT S.STID, S.FirstName, S.LastName
FROM Student S, Belong B, Section SEC, EnrolledIn E
WHERE B.Pname='input' AND B.STID=S.STID AND Semester='input' AND E.SeID=SEC.SeID AND E.STID=S.STID

/* xi)
 * Find the name of all the instructors who taught a given course on a
 * specific term.
 */

/* Not completed yet */
SELECT Instructor.Iname
FROM Instructor, Course, EnrolledIn, Section
WHERE Section.Semester = ''

/* xii)
 * Give a list of all supervisors in a given department.
 */

SELECT *
FROM Supervisor, Department
WHERE Department.Dname = 'input'
GROUP BY Supervisors.Name

/* xiii)
 * Give a list of all the advisors in a given department.
 */

SELECT *
FROM Belong, Department
WHERE Department.DName = 'input'
GROUP BY Advisor.Name

/* xiv)
 * Find the name and IDs of all the graduate students who are supervised by
 * a specific Professor.
 */

SELECT Supervisor.SupervisorID, Supervisor.FirstName, Supervisor.LastName
FROM Graduate GS
  INNER JOIN Student S ON GS.SSN = S.SSN
  INNER JOIN Supervises ON Supervises.GSSN = GS.SSN
  INNER JOIN Supervisor ON Supervises.SSSN = Supervisor.SSN
WHERE Supervisor.SSN = 'GIVEN_SSN'

/* xv)
 * Find the ID, name and assignment mandate of all the graduate students
 * who are assigned as teaching assistants to a specific course on a given
 * term.
 */

SELECT S.STID, S.FirstName, S.LastName, T.AssignmentMarking
FROM Student S, TeachingAssistant T, EnrolledIn E, Section SEC, Has H, Course C, Fund F, Graduate G
WHERE CName='input' AND Semester='input' AND SEC.SeID=E.SeID AND E.STID=S.STID AND SEC.SeID=H.SeID AND H.CID=C.CID AND T.TAID=F.TAID AND F.STID=G.STID AND G.STID=S.STID

/* xvi)
 * Find the name, IDs and total amount of funds received by all the graduate
 * students who received research funds in a given term.
 */

SELECT G.STID, S.FirstName, S.LastName, SUM(RF.Amount)
FROM Graduate G, Student S, ReasearchFunding RF, Fund F
WHERE RF.RID=F.RID AND F.STID=G.STID AND G.STID=S.STID

/* xvii)
 * For each department, find the total number of courses offered by the
 * department and the name of its chairman
 */

SELECT D.DName, D.Chairman, Count(*)
FROM Department D, Within W
WHERE W.DName=D.DName
GROUP BY W.DName

/* xviii)
 * For each program, find the total number of students enrolled into the
 * program.
 */

SELECT Student.STID, COUNT(Student.STID)
FROM Student, Program, Belong
GROUP BY Program.PName
HAVING Belong.STID = Student.STID

/* xix)
 * Give a list of courses taken by a specific student in a given term.
 */

SELECT *
FROM Course C INNER JOIN Student S ON C.CID = S.STID
WHERE Course.CID = Student.STID

/* xx)
 * Register a student in a specific course.
 */

INSERT INTO Section
VALUES
  (SeID, STID, name, whatever);

/* xxi)
 * Drop a course from a specific student (look at other dependant tables too)
 */

DELETE FROM Course
 WHERE STID='input'

DELETE FROM EnrolledIn 
 WHERE STID = 'input' AND SeID = 'input'

DELETE FROM Section
 WHERE STID = 'input' AND SeID = 'input'

/* xxii)
  * Give a detailed report for a specific student (This include personal data,
  * academic history, courses taken and grades received for each course,
  * GPA, etc.)
  */

/* Not completed yet */
SELECT SDH.DegreeName, SDH.OverallAvg, SDH.Institution, SDH, DateReceived, C.CName, E.Grade, S.GPA, S.SeID
FROM StDegHist SDH, Course C, EnrolledIn E, Student, Section S








