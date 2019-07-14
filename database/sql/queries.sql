/* All queries needed for the warmUp project */

/* Query 1 */
SELECT ID, FirstName, LastName
FROM Student, Course
WHERE CName='Database' AND (grade='A' OR grade='A+');

/* Query 2 */
SELECT ID, FirstName, LastName, count(PName)
FROM belong, Student, Program
GROUP BY Student.ID
Having count(PName)>1;

/* Query 3 */
SELECT Instructor.name, count(*)
FROM Section, Course, Instructor
GROUP BY Instructor_name
Having CName='COMP352' AND Semester='Fall' AND year=2018 AND count(*)=1;

/* Query 4 */
SELECT distinct P.PName, P.TotalCredit
FROM Program P, department
where dName='Computer Science';

/* Query 5 */
SELECT U.UName, U.UID
FROM Undergraduate as U
where advisor=NULL;

/* Query 6 */

/* Query 7 */

/* Query 8 */

/* Query 9 */

/* Query 10 */