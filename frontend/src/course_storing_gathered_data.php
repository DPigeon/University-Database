<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Ensure that all table / relations related to a class are created. -->
<?php
	// Ensure Course table / relation is created.
	$sqlSyntax = "create table if not exists Course
	(
		CID int not null
			primary key,
		CName char(30) null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php

	// Ensure Contracts table / relation is created.
	$sqlSyntax = "create table if not exists Contracts
	(
		CID int not null,
		Date date null,
		Amount float null,
		SeID int null,
		TAID int not null,
		ContractID int not null
			primary key,
		constraint Contracts_Course_CID_fk
			foreign key (CID) references Course (CID)
				on update cascade,
		constraint Contracts_Section_SeID_fk
			foreign key (SeID) references Section (SeID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure ClassTimeslot table / relation is created.
	$sqlSyntax = "create table if not exists ClassTimeslot
	(
		StartTime time default '00:00:00' not null,
		DayWeek varchar(30) default '' not null,
		SeID int default 0 not null,
		EndTime time null,
		RoID int not null,
		primary key (StartTime, DayWeek, SeID),
		constraint ClassTimeslot_ibfk_2
			foreign key (SeID) references Section (SeID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Facility table / relation is created.
	$sqlSyntax = "create table if not exists Facility
	(
		equipment varchar(30) null,
		ROID int default 0 not null
			primary key,
		constraint Facility_Classroom_ROID_fk
			foreign key (ROID) references Classroom (ROID)
				on update cascade,
		constraint Facility_LabRoom_RoID_fk
			foreign key (ROID) references LabRoom (RoID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Has table / relation is created.
	$sqlSyntax = "create table if not exists Has
	(
		CID int null,
		SeID int default 0 not null
			primary key,
		constraint Has_ibfk_1
			foreign key (CID) references Course (CID),
		constraint Has_ibfk_2
			foreign key (SeID) references Section (SeID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Section table / relation is created.
	$sqlSyntax = "create table if not exists Section
	(
		SeID int not null
			primary key,
		Semester char(30) null,
		Year int null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Block table / relation is created.
	$sqlSyntax = "create table if not exists Block
	(
		BName char(30) not null
			primary key,
		Address varchar(30) null,
		NumFloors int null,
		NumRooms int null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Campus table / relation is created.
	$sqlSyntax = "create table if not exists Campus
	(
		CampID int not null
			primary key,
		Name char(30) null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure BlockCamp table / relation is created.
	$sqlSyntax = "create table if not exists BlockCamp
	(
		CampID int null,
		BName varchar(30) default '' not null
			primary key,
		constraint BlockCamp_Block_Name_fk
			foreign key (BName) references Block (BName),
		constraint BlockCamp_Campus_CampID_fk
			foreign key (CampID) references Campus (CampID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Department table / relation is created.
	$sqlSyntax = "create table if not exists Department
	(
		DName char(30) not null
			primary key,
		Chairman char(30) not null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure DeptCamp table / relation is created.
	$sqlSyntax = "create table if not exists DeptCamp
	(
		CampID int not null,
		DName varchar(30) default '0' not null
			primary key,
		constraint DeptCamp_Campus_CampID_fk
			foreign key (CampID) references Campus (CampID)
				on update cascade,
		constraint DeptCamp_Department_DName_fk
			foreign key (DName) references Department (DName)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Prereq-Follow table / relation is created.
	$sqlSyntax = "create table if not exists `Prereq-Follow`
	(
		CID1 int not null,
		CID2 int not null,
		primary key (CID1, CID2),
		constraint `Prereq-Follow_Course_CID_fk`
			foreign key (CID1) references Course (CID)
				on update cascade,
		constraint `Prereq-Follow_Course_CID_fk_2`
			foreign key (CID2) references Course (CID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Room table / relation is created.
	$sqlSyntax = "create table if not exists Room
		(
			RoID int auto_increment
				primary key,
			ClassNum int null,
			Capacity int null
		);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure BlockRoom table / relation is created.
	$sqlSyntax = "create table if not exists BlockRoom
	(
		RoID int not null,
		BName varchar(30) not null,
		primary key (BName, RoID),
		constraint BlockRoom_Block_Name_fk
			foreign key (BName) references Block (BName),
		constraint BlockRoom_Room_RoID_fk
			foreign key (RoID) references Room (RoID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Classroom table / relation is created.
	$sqlSyntax = "create table if not exists Classroom
	(
		ROID int default 0 not null
			primary key,
		constraint Classroom_Room_RoID_fk
			foreign key (ROID) references Room (RoID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure ConferenceRoom table / relation is created.
	$sqlSyntax = "create table if not exists ConferenceRoom
	(
		RoID int not null
			primary key,
		constraint ConferenceRoom_ibfk_1
			foreign key (RoID) references Room (RoID)
				on update cascade on delete cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure LabRoom table / relation is created.
	$sqlSyntax = "create table if not exists LabRoom
	(
		RoID int not null
			primary key,
		constraint LabRoom_Room_RoID_fk
			foreign key (RoID) references Room (RoID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Office table / relation is created.
	$sqlSyntax = "create table if not exists Office
	(
		RoID int not null
			primary key,
		constraint Office_ibfk_1
			foreign key (RoID) references Room (RoID)
				on update cascade on delete cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Office table / relation is created.
	$sqlSyntax = "create table if not exists Schedule
	(
		StartTime time null,
		DayWeek varchar(30) null,
		SeID int null,
		ROID int null,
		constraint Schedule_ClassTimeslot_StartTime_DayWeek_SeID_fk
			foreign key (StartTime, DayWeek, SeID) references ClassTimeslot (StartTime, DayWeek, SeID)
				on update cascade,
		constraint Schedule_Facility_ROID_fk
			foreign key (ROID) references Facility (ROID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure AssignTo table / relation is created.
	$sqlSyntax = "create table if not exists AssignTo
	(
		SeID int default 0 not null,
		TAID int default 0 not null,
		primary key (SeID, TAID),
		constraint AssignTo_ibfk_1
			foreign key (SeID) references Section (SeID),
		constraint AssignTo_ibfk_2
			foreign key (TAID) references TeachingAssistant (TAID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Under table / relation is created.
	$sqlSyntax = "create table if not exists Under
	(
		DName char(30) null,
		PName char(30) default '' not null
			primary key,
		constraint Under_Department_DName_fk
			foreign key (DName) references Department (DName)
				on update cascade,
		constraint Under_ibfk_2
			foreign key (PName) references Program (PName)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Work table / relation is created.
	$sqlSyntax = "create table if not exists Work
	(
		DName varchar(30) not null,
		IID int default 0 not null,
		primary key (DName, IID),
		constraint Work_Department_DName_fk
			foreign key (DName) references Department (DName)
				on update cascade,
		constraint Work_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Within table / relation is created.
	$sqlSyntax = "create table if not exists Within
	(
		CID int default 0 not null
			primary key,
		DName char(30) null,
		constraint Within_Department_DName_fk
			foreign key (DName) references Department (DName)
				on update cascade,
		constraint Within_ibfk_1
			foreign key (CID) references Course (CID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
?>

<?php
	// Store the course's data (that was obtained from the form on course_data_gathering.php) (into the MySQL database).
	
	// Store the data required for the MySQL table(s) related to the course.
	
	// Course table
	$CourseCID = htmlspecialchars($_POST['CourseCID']);
	$CourseCName = htmlspecialchars($_POST['CourseCName']);
	$sqlSyntax = "INSERT INTO Course VALUES('" . $CourseCID . "','" . $CourseCName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Contracts table
	$ContractsDate = htmlspecialchars($_POST['ContractsDate']);
	$ContractsAmount = htmlspecialchars($_POST['ContractsAmount']);
	$ContractsSeID = htmlspecialchars($_POST['ContractsSeID']);
	$ContractsTAID = htmlspecialchars($_POST['ContractsTAID']);
	$ContractID = htmlspecialchars($_POST['ContractID']);
	$sqlSyntax = "INSERT INTO Contracts VALUES('" . $CourseCID . "','" . $ContractsDate . "','" . $ContractsAmount . "','" . $ContractsSeID . "','" . $TAID . "','" . $ContractID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// ClassTimeslot table
	$ClassTimeslotStartTime = htmlspecialchars($_POST['ClassTimeslotStartTime']);
	$ClassTimeslotDayWeek = htmlspecialchars($_POST['ClassTimeslotDayWeek']);
	$ClassTimeslotSeID = htmlspecialchars($_POST['ClassTimeslotSeID']);
	$ClassTimeslotEndTime = htmlspecialchars($_POST['ClassTimeslotEndTime']);
	$ClassTimeslotRoID = htmlspecialchars($_POST['ClassTimeslotRoID']);
	$sqlSyntax = "INSERT INTO ClassTimeslot VALUES('" . $ClassTimeslotStartTime . "','" . $ClassTimeslotDayWeek . "','" . $ClassTimeslotSeID . "','" . $ClassTimeslotEndTime . "','" . $ClassTimeslotRoID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Facility table
	$FacilityEquipment = htmlspecialchars($_POST['FacilityEquipment']);
	$sqlSyntax = "INSERT INTO Facility VALUES('" . $FacilityEquipment . "','" . $ClassTimeslotRoID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Has table
	$sqlSyntax = "INSERT INTO ClassTimeslot VALUES('" . $CourseCID . "','" . $ContractsSeID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Section table
	$SectionSemester = htmlspecialchars($_POST['SectionSemester']);
	$SectionYear = htmlspecialchars($_POST['SectionYear']);
	$sqlSyntax = "INSERT INTO Section VALUES('" . $ClassTimeslotSeID . "','" . $SectionSemester . "','" . $SectionYear . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Block table
	$BlockBName = htmlspecialchars($_POST['BlockBName']);
	$BlockAddress = htmlspecialchars($_POST['BlockAddress']);
	$BlockNumFloors = htmlspecialchars($_POST['BlockNumFloors']);
	$BlockNumRooms = htmlspecialchars($_POST['BlockNumRooms']);
	$sqlSyntax = "INSERT INTO Block VALUES('" . $BlockBName . "','" . $BlockAddress . "','" . $BlockNumFloors . "','" . $BlockNumRooms . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Campus table
	$CampusCampID = htmlspecialchars($_POST['CampusCampID']);
	$CampusName = htmlspecialchars($_POST['CampusName']);
	$sqlSyntax = "INSERT INTO Campus VALUES('" . $CampusCampID . "','" . $CampusName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// BlockCamp table
	$sqlSyntax = "INSERT INTO BlockCamp VALUES('" . $BlockBName . "','" . $CampusCampID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Department
	$DepartmentDName = htmlspecialchars($_POST['DepartmentDName']);
	$DepartmentChairman = htmlspecialchars($_POST['DepartmentChairman']);
	$sqlSyntax = "INSERT INTO Department VALUES('" . $DepartmentDName . "','" . $DepartmentChairman . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// DeptCamp table
	$sqlSyntax = "INSERT INTO DeptCamp VALUES('" . $CampusCampID . "','" . $DepartmentDName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Prereq-Follow table
	$PrereqFollowCID1 = htmlspecialchars($_POST['PrereqFollowCID1']);
	$PrereqFollowCID2 = htmlspecialchars($_POST['PrereqFollowCID2']);
	$sqlSyntax = "INSERT INTO `Prereq-Follow` VALUES('" . $CampusCampID . "','" . $DepartmentDName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Room table
	$RoomClassNum = htmlspecialchars($_POST['RoomClassNum']);
	$RoomCapacity = htmlspecialchars($_POST['RoomCapacity']);
	$sqlSyntax = "INSERT INTO Room VALUES('" . $ClassTimeslotRoID . "','" . $RoomClassNum . "','" . $RoomCapacity . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// BlockRoom table
	if( $_POST['roomIsBlockRoom'] ) {
		$sqlSyntax = "INSERT INTO BlockRoom VALUES('" . $ClassTimeslotRoID . "','" . $BlockBName . "');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	
	// Classroom table
	if( $_POST['roomIsClassroom'] ) {
		$sqlSyntax = "INSERT INTO Classroom VALUES('" . $ClassTimeslotRoID . "');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	
	// ConferenceRoom table
	if( $_POST['roomIsConferenceRoom'] ) {
		$sqlSyntax = "INSERT INTO ConferenceRoom VALUES('" . $ClassTimeslotRoID . "');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	
	// LabRoom table
	if( $_POST['roomIsLabRoom'] ) {
		$sqlSyntax = "INSERT INTO LabRoom VALUES('" . $ClassTimeslotRoID . "');";
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	}
	
	// Office table
	$OfficeRoID = htmlspecialchars($_POST['OfficeRoID']);
	$sqlSyntax = "INSERT INTO Office VALUES('" . $OfficeRoID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Schedule table
	$sqlSyntax = "INSERT INTO Schedule VALUES('" . $ClassTimeslotStartTime . "','" . $ClassTimeslotDayWeek . "','" . $ClassTimeslotSeID . "','" /*. $ClassTimeslotEndTime*/ . "','" . $ClassTimeslotRoID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// AssignTo table
	$sqlSyntax = "INSERT INTO AssignTo VALUES('" . $ContractsSeID . "','" . $ContractsTAID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Under table
	$UnderPName = htmlspecialchars($_POST['UnderPName']);
	$sqlSyntax = "INSERT INTO Under VALUES('" . $DepartmentDName . "','" . $UnderPName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Work table
	$WorkIID = htmlspecialchars($_POST['WorkIID']);
	$sqlSyntax = "INSERT INTO Work VALUES('" . $DepartmentDName . "','" . $WorkIID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Within table
	$sqlSyntax = "INSERT INTO Work VALUES('" . $CourseCID . "','" . $DepartmentDName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
?>

<?php include('footer.php'); ?>
