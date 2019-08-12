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

/* Retrieve student schedule for a particular Year and Term */
select  S2.STID, S2.FirstName, C.Cname, ClassTimeslot.StartTime, ClassTimeslot.DayWeek, ClassTimeslot.EndTime
from ClassTimeslot inner join Section S on ClassTimeslot.SeID = S.SeID inner join Has H on S.SeID = H.SeID inner join Course C on H.CID = C.CID inner join EnrolledIn EI on S.SeID = EI.SeID inner join Student S2 on EI.STID = S2.STID
where S2.STID=1 and S.Year=2020 and S.Semester='Winter';