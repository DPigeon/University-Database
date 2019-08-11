/*
 * Prereq-Follow Queries
 */

/* Find the prereq of a course */

Select C.Cname
From Course C
Where CID IN (Select P.CID1
FROM Course C, PrereqFollow P
WHERE Cname='COMP400' AND C.CID=P.CID2);

/* Find the FOLLOW of a course */
Select C.Cname
From Course C
Where CID IN (Select P.CID2
FROM Course C, PrereqFollow P
Where Cname='COMP352' AND C.CID=P.CID1);

/*
 * Testing some FDs
 */
/* CID --> CID, CName */

SELECT C.CID
FROM Course C
GROUP BY C.CID
HAVING COUNT(DISTINCT C.CName) > 1;