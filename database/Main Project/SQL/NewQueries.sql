/* i)
 * Create/Delete/Edit/Display a faculty member. 
 */

INSERT INTO Instructor
VALUES(IID, something, something);

DELETE FROM Instructor
WHERE IID = something

UPDATE Instructor 
SET something = something 
WHERE IID = something


/* ii)
 * Create/Delete/Edit/Display a Student. 
 */

INSERT INTO Student
VALUES(STID, something, something);

DELETE FROM Student
WHERE STID = something

UPDATE Student 
SET something = something 
WHERE STID = something

/* iii)
 * Create/Delete/Edit/Display a Teaching Assistant 
 */

INSERT INTO TeachingAssistant
VALUES(TAID, something, something);

DELETE FROM TeachingAssistant
WHERE TAID = something

UPDATE TeachingAssistant
SET something = something 
WHERE TAID = something

/* iv)
 * Give a list of all campuses.
 */

SELECT *
FROM Campus

/* v)
 * Give a list of buildings on a given campus. 
 */

SELECT *
FROM BlockCamp
WHERE CampID = 'something'
GROUP BY Name


