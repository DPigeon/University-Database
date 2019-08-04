/* Note: 'input' will be an input from the UI on the php UI */

/* i)
 * Create/Delete/Edit/Display a faculty member. 
 */

INSERT INTO Instructor
VALUES(IID, input, input);

DELETE FROM Instructor
WHERE IID = input

UPDATE Instructor 
SET input = input 
WHERE IID = input


/* ii)
 * Create/Delete/Edit/Display a Student. 
 */

INSERT INTO Student
VALUES(STID, input, input);

DELETE FROM Student
WHERE STID = input

UPDATE Student 
SET input = input 
WHERE STID = input

/* iii)
 * Create/Delete/Edit/Display a Teaching Assistant 
 */

INSERT INTO TeachingAssistant
VALUES(TAID, input, input);

DELETE FROM TeachingAssistant
WHERE TAID = input

UPDATE TeachingAssistant
SET input = input 
WHERE TAID = input

/* iv)
 * Give a list of all campuses.
 */

SELECT *
FROM Campus
GROUP BY Name

/* v)
 * Give a list of buildings on a given campus. 
 */

SELECT *
FROM BlockCamp
WHERE CampID = 'input'
GROUP BY Name

/* vi)
 * Give details of a specific building (this include address of the building,
 * number of floors, number of rooms in each floor, and details of each room
 * such as room type, capacity of the room and existing facilities in the room
 * if it is a classroom or a lab.
 */

SELECT B.Address, B.NumFloors, B.NumRooms, B.NumFloors, LCR.Capacity, LCR.Type, F.Equipment
FROM Block B, LabClassRoom LCR, Facilities F
WHERE B.Name = 'input'


/* vii)
 * Get a list of all programs available in a specific department along with the
 * number of credits required for completion in each program.
 */

SELECT P.Pname, P.TotalCredits
FROM Program P, Department D
WHERE D.Pname=P.Pname AND DName='input'

/* viii)
 * Get a list of all courses offered in a given term by a specific program.
 */

SELECT C.Cname
FROM Course C, Has H, Section S, Department D, Within W, Under U
WHERE C.CID=H.CID AND H.SeID=Section.SeID AND S.Semester='input' AND C.CID = W.CID AND W.Dname=D.Dname AND U.Dname=D.Dname AND U.PName='input'

/* ix)
 * Get the details of all the courses offered by a specific department for a
 * specific term. Details include Course name, section, room location, start
 * and end time, professor teaching the course, max class capacity and
 * number of enrolled students.
 */

/* Not completed yet */
SELECT C.Cname, S.SeID, B.Address, CLT.startTime, CLT.endtime
FROM Course C, Section S, ClassTimeSlot CLT, Block B

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








