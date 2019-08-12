<?php
	include_once('sqlConfig.php');
	include_once('helperFunctions.php');
	
	$InstructorIID = htmlspecialchars($_POST['InstructorIID']);
	$InstructorISSN = htmlspecialchars($_POST['InstructorISSN']);
	$InstructorPhone = htmlspecialchars($_POST['InstructorPhone']);
	$InstructorFirstName = htmlspecialchars($_POST['InstructorFirstName']);
	$InstructorSupID = htmlspecialchars($_POST['InstructorSupID']);
	$InstructorEmail = htmlspecialchars($_POST['InstructorEmail']);
	$InstructorLastName = htmlspecialchars($_POST['InstructorLastName']);
	
	$query_i__choice_of_attribute_to_update = htmlspecialchars($_POST['query_i__choice_of_attribute_to_update']);
	$query_i__value_for_chosen_attribute_to_update = htmlspecialchars($_POST['query_i__value_for_chosen_attribute_to_update']);
	
	$StudentSTID = htmlspecialchars($_POST['StudentSTID']);
	$StudentCredit = htmlspecialchars($_POST['StudentCredit']);
	$StudentFirstName = htmlspecialchars($_POST['StudentFirstName']);
	$StudentLastName = htmlspecialchars($_POST['StudentLastName']);
	$StudentGPA = htmlspecialchars($_POST['StudentGPA']);
	$StudentSSN = htmlspecialchars($_POST['StudentSSN']);
	$StudentPhone = htmlspecialchars($_POST['StudentPhone']);
	$StudentEmail = htmlspecialchars($_POST['StudentEmail']);
	
	$query_ii__choice_of_attribute_to_update = htmlspecialchars($_POST['query_ii__choice_of_attribute_to_update']);
	$query_ii__value_for_chosen_attribute_to_update = htmlspecialchars($_POST['query_ii__value_for_chosen_attribute_to_update']);
	
	$TeachingAssistantTAID = htmlspecialchars($_POST['TeachingAssistantTAID']);
	$TeachingAssistantTotalHours = htmlspecialchars($_POST['TeachingAssistantTotalHours']);
	$TeachingAssistantAssignmentMarking = htmlspecialchars($_POST['TeachingAssistantAssignmentMarking']);
	$TeachingAssistantLabInstructor = htmlspecialchars($_POST['TeachingAssistantLabInstructor']);
	$TeachingAssistantNbCourses = htmlspecialchars($_POST['TeachingAssistantNbCourses']);
	$TeachingAssistantTutorialSession = htmlspecialchars($_POST['TeachingAssistantTutorialSession']);
	
	$query_iii__choice_of_attribute_to_update = htmlspecialchars($_POST['query_iii__choice_of_attribute_to_update']);
	$query_iii__value_for_chosen_attribute_to_update = htmlspecialchars($_POST['query_iii__value_for_chosen_attribute_to_update']);
	
	$BlockCampCampID = htmlspecialchars($_POST['BlockCampCampID']);
	
	$BlockBName = htmlspecialchars($_POST['BlockBName']);
	
	$DepartmentDName = htmlspecialchars($_POST['DepartmentDName']);
	
	$ProgramPName = htmlspecialchars($_POST['ProgramPName']);
	
	$SectionSemester = htmlspecialchars($_POST['SectionSemester']);
	
	$CourseCName = htmlspecialchars($_POST['CourseCName']);
	
	$CourseCID = htmlspecialchars($_POST['CourseCID']);
	
	$SectionYear = htmlspecialchars($_POST['SectionYear']);
	
	if( isset($_POST['query_i__create']) ) {
		$sqlSyntax = "INSERT INTO Instructor VALUES('$InstructorIID', '$ISSN', '$InstructorPhone', '$InstructorFirstName', '$InstructorSupID', '$InstructorEmail', '$InstructorLastName');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_i__delete']) ) {
		$sqlSyntax = "DELETE FROM Instructor WHERE IID = '$InstructorIID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_i__edit']) ) {
		$sqlSyntax = "UPDATE Instructor SET $query_i__choice_of_attribute_to_update = '$query_i__value_for_chosen_attribute_to_update' WHERE IID = '$InstructorIID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_i__display']) ) {
		$sqlSyntax = "SELECT * FROM Instructor;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_ii__create']) ) {
		$sqlSyntax = "INSERT INTO Student VALUES('$StudentSTID', '$StudentCredit', '$StudentFirstName', '$StudentLastName', '$StudentGPA', '$StudentSSN', '$StudentPhone', '$StudentEmail');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_ii__delete']) ) {
		$sqlSyntax = "DELETE FROM Student WHERE STID = '$StudentSTID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_ii__edit']) ) {
		$sqlSyntax = "UPDATE Student SET query_ii__choice_of_attribute_to_update = '$query_ii__value_for_chosen_attribute_to_update' WHERE STID = '$StudentSTID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_ii__display']) ) {
		$sqlSyntax = "SELECT * FROM Student;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_iii__create']) ) {
		$sqlSyntax = "INSERT INTO TeachingAssistant VALUES('$TeachingAssistantTAID', '$TeachingAssistantTotalHours', '$TeachingAssistantAssignmentMarking', '$TeachingAssistantLabInstructor', '$TeachingAssistantNbCourses', '$TeachingAssistantTutorialSession');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_iii__delete']) ) {
		$sqlSyntax = "DELETE FROM TeachingAssistant WHERE TAID = '$TeachingAssistantTAID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_iii__edit']) ) {
		$sqlSyntax = "UPDATE TeachingAssistant SET query_iii__choice_of_attribute_to_update = '$query_iii__value_for_chosen_attribute_to_update' WHERE TAID = '$TeachingAssistantTAID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	if( isset($_POST['query_iii__display']) ) {
		$sqlSyntax =   "SELECT S.FirstName, S.LastName, S.Email, S.Credit, S.GPA
						FROM Student S INNER JOIN IsTA TA on TA.STID = S.STID
						WHERE S.GPA > 3.2;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_iv']) ) {
		$sqlSyntax = "SELECT distinct Name FROM Campus GROUP BY Name;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_v']) ) {
		$sqlSyntax = "SELECT BName FROM BlockCamp WHERE CampID = '$BlockCampCampID';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_vi']) ) {
		$sqlSyntax = "SELECT B.Address, B.NumFloors, B.NumRooms, R.type, CASE
					  WHEN R.Type='Labroom' or R.Type='Classroom' THEN R.Capacity
					  END as 'Capacity', CASE
					  WHEN R.Type='Labroom' or R.Type='Classroom' THEN F.equipment
					  END as 'Equipment'
					FROM Block B
					  INNER JOIN BlockRoom BR on B.BName=BR.BName
					  INNER JOIN Room R on R.RoID=BR.RoID
					  INNER JOIN Contains C on R.RoID=C.RoID
					  INNER JOIN Facility F on F.facID=C.facID
					WHERE B.BName = '$BlockBName';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_vii']) ) {
		$sqlSyntax = "SELECT P.Pname, P.TotalCredits
						FROM Program P
						  INNER JOIN Under U on P.PName = U.PName
						  INNER JOIN Department D on D.DName=U.DName
						WHERE D.DName='$DepartmentDName';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_viii']) ) {
		$sqlSyntax = "SELECT C.CName, P.Pname
						FROM Section S
						  INNER JOIN Has H on S.SeID = H.SeID
						  INNER JOIN Course C on C.CID = H.CID
						  INNER JOIN Within W on W.CID = C.CID
						  INNER JOIN Department D on W.Dname = D.Dname
						  INNER JOIN Under U on U.Dname = D.Dname
						  INNER JOIN Program P on P.Pname = U.Pname
						WHERE S.Semester='Fall' AND P.Pname = '$ProgramPName'
						GROUP BY P.Pname;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_ix']) ) {
		$sqlSyntax = "SELECT distinct C.CName,T.IID ,I.FirstName,I.LastName, S.SeID, S.Year, S.Semester, CT.DayWeek, CT.StartTime, CT.EndTime,CT.RoID, R.Capacity, B.Address
						FROM Instructor I
						  INNER JOIN Teach T on I.IID = T.IID
						  INNER JOIN Section S on T.SeID = S.SeID
						  INNER JOIN Has H on S.SeID = H.SeID
						  INNER JOIN Course C on H.CID = C.CID
						  INNER JOIN Within W on C.CID = W.CID
						  INNER JOIN Department D on D.Dname = W.Dname
						  INNER JOIN DeptCamp DC on DC.Dname = D.Dname
						  INNER JOIN ClassTimeslot CT on S.SeID = CT.SeID
						  INNER JOIN Room R on R.RoID=CT.RoID
						INNER JOIN BlockRoom on R.RoID = BlockRoom.RoID
						INNER JOIN Block B on BlockRoom.BName = B.BName
						WHERE D.Dname = '$DepartmentDName' AND S.Semester = '$SectionSemester';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_x']) ) {
		$sqlSyntax = "SELECT S.STID, S.FirstName, S.LastName
						FROM Student S, Belong B, Section SEC, EnrolledIn E
						WHERE B.Pname='$ProgramPName' AND B.STID=S.STID AND Semester='$SectionSemester' AND E.SeID=SEC.SeID AND E.STID=S.STID;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xi']) ) {
		$sqlSyntax = "SELECT I.FirstName, I.LastName
						FROM Course C
						  INNER JOIN Has H on H.CID = C.CID
						  INNER JOIN Section S on H.SeID = S.SeID
						  INNER JOIN Teach T on T.SeID = S.SeID
						  INNER JOIN Instructor I on T.IID = I.IID
						WHERE C.CName = '$CourseCName' AND S.Semester = '$SectionSemester';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xii']) ) {
		$sqlSyntax = "SELECT I.FirstName, I.LastName, D.DName
						FROM Instructor I
						  INNER JOIN Work W on I.IID = W.IID
						  INNER JOIN Department D on D.DName = W.DName
						  INNER JOIN Supervisor S on S.SupID=I.IID
						  Where D.DName='$DepartmentDName'
						GROUP BY D.DName;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xiii']) ) {
		$sqlSyntax = "SELECT B.Advisor
						FROM Belong B
						  INNER JOIN Program P on P.PName = B.PName
						  INNER JOIN Under U on U.PName = P.PName
						  INNER JOIN Department D on U.DName = D.DName
						WHERE D.DName = '$DepartmentDName'
						GROUP BY B.Advisor;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xiv']) ) {
		
		$sqlSyntax = "SELECT ST.FirstName, ST.LastName, ST.STID
			FROM Student ST
			  INNER JOIN Graduate G on ST.STID = G.STID
			  INNER JOIN Supervises SP on G.STID = SP.STID
			  INNER JOIN Supervisor S on SP.SupID = S.SupID
			  INNER JOIN Instructor I on I.IID= S.SupID
			WHERE I.IID = '$InstructorIID';";
	
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xv']) ) {
		$sqlSyntax = "select Student.STID, Student.FirstName, Student.LastName, TeachingAssistant.AssignmentMarking
						from Student
						  INNER JOIN Graduate on Student.STID = Graduate.STID
						  INNER JOIN IsTA on IsTA.STID=Graduate.STID
						  INNER JOIN TeachingAssistant on TeachingAssistant.TAID=IsTA.TAID
						  INNER JOIN AssignTo on AssignTo.TAID=TeachingAssistant.TAID
						  INNER JOIN Section S on AssignTo.SeID = S.SeID
						  INNER JOIN Has H on S.SeID = H.SeID
						  INNER JOIN Course C on H.CID = C.CID
						WHERE C.CID='$CourseCID' and Semester='$SectionSemester';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xvi']) ) {
		/*
		 * OLD VERSION (just in case):
		 * SELECT S.STID, S.FirstName, S.LastName, SUM(RF.Amount)
		 * FROM Graduate G , Student S, Fund F, ResearchFunding RF
		 * WHERE S.STID=G.STID AND G.STID = F.STID AND F.RID = RF.RID
		 * GROUP BY F.STID;
		*/
		
		$sqlSyntax = "SELECT S.STID, S.FirstName, S.LastName, SUM(RF.Amount)
						FROM Graduate G , Student S, Fund F, ResearchFunding RF, EnrolledIn EI, Section Se
						WHERE S.STID=G.STID AND G.STID = F.STID AND F.RID = RF.RID AND S.STID = EI.STID AND EI.SeID = Se.SeID AND Se.Semester = '$SectionSemester'
						GROUP BY F.STID;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xvii']) ) {
		$sqlSyntax = "SELECT D.DName, D.Chairman, Count(*)
						FROM Department D, Within W
						WHERE  D.DName=W.DName
						GROUP BY W.DName;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xviii']) ) {
		$sqlSyntax = "SELECT P.PName, Count(*)
						FROM Program P, Under U
						WHERE P.PName=U.PName
						GROUP BY U.Dname;";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xix']) ) {
		$sqlSyntax = "SELECT C.CName
						FROM Course C
						  INNER JOIN Has H ON C.CID = H.CID
						  INNER JOIN Section Se ON Se.SeID = H.SeID
						  INNER JOIN EnrolledIn E ON Se.SeID = E.SeID
						  INNER JOIN Student S ON S.STID = E.STID
						WHERE S.FirstName = '$StudentFirstName' AND Se.Semester = '$SectionSemester';";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xx']) ) {
		$sqlSyntax = "/* xx)
					 * Register a student in a specific course.
					 */

					/* Gets the section ID we need */
					SELECT Se.SeID
					FROM Course C
					  INNER JOIN Has H ON C.CID = H.CID
					  INNER JOIN Section Se ON Se.SeID = H.SeID
					WHERE C.CName = '$CourseCName' AND Se.Semester = '$SectionSemester' AND Se.Year = '$SectionYear';

					/* Gets the student ID we need */
					SELECT St.STID
					FROM Student St
					WHERE St.SSN = '$StudentSSN';

					/* We register a student with a section ID and a student ID */
					INSERT INTO EnrolledIn
					VALUES
					  (S.STID, Se.SeID, NULL);";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xxi']) ) { // THE CONTENTS OF THIS IF STATEMENT NEEDS "MEDIUM-LEVEL CONFIRMATION".
		$sqlSyntax1 = "/* xxi)
					 * Drop a course from a specific student (look at other dependant tables too)
					 */

					/* Gets the student ID we need */
					SELECT St.STID
					FROM Student St
					WHERE St.SSN = '$StudentSSN';";
		$sqlResult1 = mysqli_query($mysqlConnection, $sqlSyntax1);

		$sqlSyntax2 = "/* Gets the section ID we need */
					SELECT Se.SeID
					FROM Course C
					  INNER JOIN Has H ON C.CID = H.CID
					  INNER JOIN Section Se ON Se.SeID = H.SeID
					WHERE C.CName = '$CourseCName' AND Se.Semester = '$SectionSemester' AND Se.Year = '$SectionYear';";
		$sqlResult2 = mysqli_query($mysqlConnection, $sqlSyntax2);
		
		if( mysqli_num_rows($sqlResult1) > 0 && mysqli_num_rows($sqlResult2) > 0 ) {
			$temp1 = mysqli_fetch_assoc($sqlResult1);
			$var1 = $temp1['STID'];
			$temp2 = mysqli_fetch_assoc($sqlResult2);
			$var2 = $temp2['SeID'];
			$sqlSyntax3 = "/* We drop a course from a specific student */
			DELETE FROM EnrolledIn
			  WHERE STID = '$var1' AND SeID = '$var2';";
			$sqlResult3 = mysqli_query($mysqlConnection, $sqlSyntax3); // do not print this (because it's a deletion, not a return of a table)
		}
	}
	if( isset($_POST['query_xxii']) ) { // THE CONTENTS OF THIS IF STATEMENT NEEDS "MINOR-LEVEL CONFIRMATION".
		$sqlSyntax1 = "/* xxii)
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
					WHERE S.STID = '$StudentSTID' AND SHA.STID = '$StudentSTID' AND SDH.STID = '$StudentSTID'
					GROUP BY S.STID;";
		$sqlResult1 = mysqli_query($mysqlConnection, $sqlSyntax1);
		printSqlResult($sqlResult1);

		$sqlSyntax2 = "/*Find the prereq of a course*/

					Select C.CName
					From Course C
					Where CID IN (Select P.CID1
					FROM Course C, PrereqFollow P
					Where CName='$CourseCName' AND C.CID=P.CID2);";
		$sqlResult2 = mysqli_query($mysqlConnection, $sqlSyntax2);
		printSqlResult($sqlResult2);

		$sqlSyntax3 = "/*Find the FOLLOW of a course*/
					Select C.CName
					From Course C
					Where CID IN (Select P.CID2
					FROM Course C, PrereqFollow P
					Where CName='$CourseCName' AND C.CID=P.CID1);";
		$sqlResult3 = mysqli_query($mysqlConnection, $sqlSyntax3);
		printSqlResult($sqlResult3);
	}
	
	/*// <testCase>
	echo "Test case (REMOVE LATER):<br>";
	$sqlSyntax = "Select * from Student";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	printSqlResult($sqlResult);
	// </testCase>*/
?>
