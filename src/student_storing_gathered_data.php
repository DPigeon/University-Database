<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Ensure that all table / relations related to a student are created. -->
<?php
	// Ensure Student table / relation is created.
	$sqlSyntax = "CREATE TABLE IF NOT EXISTS Student
	(
		STID INT NOT NULL PRIMARY KEY,
		Credit INT NULL,
		FirstName CHAR(30) NULL,
		LastName CHAR(30) NULL,
		GPA FLOAT NULL,
		SSN INT NOT NULL,
		Phone VARCHAR(30) NULL,
		Email VARCHAR(30) NULL
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Undergraduate table / relation is created.
	$sqlSyntax = "CREATE TABLE IF NOT EXISTS Undergraduate
	(
		STID INT DEFAULT 0 NOT NULL PRIMARY KEY,
		CONSTRAINT Undergraduate_Student_STID_fk FOREIGN KEY (STID) REFERENCES Student(STID) ON UPDATE CASCADE
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Graduate table / relation is created.
	$sqlSyntax = "CREATE TABLE IF NOT EXISTS Graduate
	(
		STID INT DEFAULT 0 NOT NULL PRIMARY KEY,
		thesis TINYINT(1) NULL,
		CONSTRAINT Graduate_Student_STID_fk FOREIGN KEY (STID) references Student(STID) ON UPDATE CASCADE
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure GradAwards table / relation is created.
	$sqlSyntax = "create table if not exists GradAwards
	(
		AwardName char(30) default '' not null,
		DateReceived date default '0000-00-00' not null,
		STID int default 0 not null,
		primary key (AwardName, DateReceived, STID),
		constraint GradAwards_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure GradExperience table / relation is created.
	$sqlSyntax = "create table if not exists GradExperience
	(
		JobPosition char(30) default '' not null,
		STID int default 0 not null,
		DateStarted date default '0000-00-00' not null,
		Company varchar(30) default '' not null,
		primary key (JobPosition, Company, DateStarted, STID),
		constraint GradExperience_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php

	// Ensure GradPublications table / relation is created.
	$sqlSyntax = "create table if not exists GradPublications
	(
		PubName char(30) default '' not null,
		PubDate date default '0000-00-00' not null,
		STID int default 0 not null,
		primary key (STID, PubName, PubDate),
		constraint GradPublications_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure GradUniversityDegrees table / relation is created.
	$sqlSyntax = "create table if not exists GradUniversityDegrees
	(
		UniDegree char(30) default '' not null,
		UniName char(30) default '' not null,
		DateReceived date default '0000-00-00' not null,
		STID int default 0 not null,
		primary key (UniDegree, STID, UniName, DateReceived),
		constraint GradUniversityDegrees_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure StHomeAddress table / relation is created.
	$sqlSyntax = "create table if not exists StHomeAddress
	(
		City char(30) null,
		Province char(30) null,
		CivicNumber int null,
		PostalCode int null,
		STID int not null
			primary key,
		constraint StHomeAddress_Student_STID_fk
			foreign key (STID) references Student (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Supervises table / relation is created.
	$sqlSyntax = "create table if not exists Supervises
	(
		SupID int not null,
		STID int not null,
		primary key (STID, SupID),
		constraint Supervises_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade,
		constraint Supervises_Supervisor_SupID_fk
			foreign key (SupID) references Supervisor (SupID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure StDegHist table / relation is created.
	$sqlSyntax = "create table if not exists StDegHist
	(
		DegreeName char(30) not null,
		OverallAvg float null,
		InstitutionName char(30) not null,
		DateReceived date null,
		STID int not null,
		primary key (DegreeName, InstitutionName, STID),
		constraint StDegHist_Student_STID_fk
			foreign key (STID) references Student (STID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure TeachingAssistant table / relation is created.
	$sqlSyntax = "create table if not exists TeachingAssistant
	(
		TAID int not null
			primary key,
		TotalHours int null,
		AssignmentMarking char null,
		LabInstructor char null,
		NumCourses int null,
		TutorialSession char null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure EnrolledIn table / relation is created.
	$sqlSyntax = "create table if not exists EnrolledIn
	(
		STID int default 0 not null,
		SeID int default 0 not null,
		Grade char(2) null,
		primary key (STID, SeID),
		constraint EnrolledIn_Student_STID_fk
			foreign key (STID) references Student (STID)
				on update cascade,
		constraint EnrolledIn_ibfk_1
			foreign key (SeID) references Section (SeID)
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
	
	// Ensure Fund table / relation is created.
	$sqlSyntax = "create table if not exists Fund
	(
		STID int not null
			primary key,
		RID int null,
		constraint Fund_Graduate_STID_fk
			foreign key (STID) references Graduate (STID)
				on update cascade,
		constraint Fund_ResearchFunding_RID_fk
			foreign key (RID) references ResearchFunding (RID)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Program table / relation is created.
	$sqlSyntax = "create table if not exists Program
	(
		PName char(30) not null
			primary key,
		TotalCredits int null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure ResearchFunding table / relation is created.
	$sqlSyntax = "create table if not exists ResearchFunding
	(
		RID int not null
			primary key,
		Amount int null
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Belong table / relation is created.
	$sqlSyntax = "create table if not exists Belong
	(
		STID int not null,
		PName char(30) default '' not null,
		Advisor char(30) null,
		primary key (STID, PName),
		constraint Belong_Student_STID_fk
			foreign key (STID) references Student (STID)
				on update cascade,
		constraint Belong_ibfk_2
			foreign key (PName) references Program (PName)
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure AssignHist table / relation is created.
	$sqlSyntax = "create table if not exists AssignHist
	(
		AssignID int not null,
		TAID int default 0 not null,
		primary key (AssignID, TAID),
		constraint AssignHist_TeachingAssistant_TAID_fk
			foreign key (TAID) references TeachingAssistant (TAID)
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
	
	// Ensure InvolvedIn table / relation is created.
	$sqlSyntax = "create table if not exists InvolvedIn
	(
		ContractID int default 0 not null,
		TAID int default 0 not null,
		primary key (ContractID, TAID),
		constraint InvolvedIn_Contracts_ContractID_fk
			foreign key (ContractID) references Contracts (ContractID)
				on update cascade,
		constraint InvolvedIn_TeachingAssistant_TAID_fk
			foreign key (TAID) references TeachingAssistant (TAID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure IsTA table / relation is created.
	$sqlSyntax = "create table if not exists IsTA
	(
		ContractID int default 0 not null,
		TAID int default 0 not null,
		primary key (ContractID, TAID),
		constraint InvolvedIn_Contracts_ContractID_fk
			foreign key (ContractID) references Contracts (ContractID)
				on update cascade,
		constraint InvolvedIn_TeachingAssistant_TAID_fk
			foreign key (TAID) references TeachingAssistant (TAID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
?>

<?php
	// Store the student's data (that was obtained from the form on student_data_gathering.php) (into the MySQL database).
	
	// Store the data required for the Student MySQL table.
	// Student table
	$STID = htmlspecialchars($_POST['STID']);
	$Credit = htmlspecialchars($_POST['Credit']);
	$FirstName = htmlspecialchars($_POST['studentFirstName']);
	$LastName = htmlspecialchars($_POST['studentLastName']);
	$GPA = htmlspecialchars($_POST['GPA']);
	$SSN = htmlspecialchars($_POST['SSSN']); // the extra S is on purpose
	$Phone = htmlspecialchars($_POST['StudentPhoneNumber']);
	$Email = htmlspecialchars($_POST['StudentEmailAddress']);
	$thesis = $_POST['graduateStudentThesis']; // This only applies for graduate students.
	$sqlSyntax = "INSERT INTO Student VALUES('" . $STID . "','" . $Credit . "','" . $FirstName . "','" . $LastName . "','" . $GPA . "','" . $SSN . "','" . $Phone . "','" . $Email . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	if( $_POST['isGraduate'] ) {
		$sqlSyntax = "INSERT INTO Graduate VALUES('" . $STID . "','" . $thesis . "');"; // Graduate table
		
	}
	else {
		$sqlSyntax = "INSERT INTO Undergraduate VALUES('" . $STID . "');"; // Undergraduate table
	}
	echo $sqlSyntax;
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // Undergraduate or Graduate table
	
	// GradAwards table
	$GradAwardsAwardName = htmlspecialchars($_POST['GradAwardsAwardName']);
	$GradAwardsDateReceived = htmlspecialchars($_POST['GradAwardsDateReceived']);
	$sqlSyntax = "INSERT INTO Student VALUES('" . $GradAwardsAwardName . "','" . $GradAwardsDateReceived . "','" . $STID . "');";
	
	// GradExperience table
	$GradExperienceJobPosition = htmlspecialchars($_POST['GradExperienceJobPosition']);
	$GradExperienceDateStarted = htmlspecialchars($_POST['GradExperienceDateStarted']);
	$GradExperienceCompany = htmlspecialchars($_POST['GradExperienceCompany']);
	
	// GradPublications table
	// TODO
	
	// GradUniversityDegrees table
	// TODO
	
	// StHomeAddress table
	// TODO
	
	// StDegHist table
	// TODO
	
	// TeachingAssistant table
	// TODO
	
	// EnrolledIn table
	// TODO
	
	// Contracts table
	// TODO
	
	// Fund table
	// TODO
	
	// Program table
	// TODO
	
	// ResearchFunding table
	// TODO
	
	// Belong table
	// TODO
	
	// AssignHist table
	// TODO
	
	// AssignTo table
	// TODO
	
	// InvolvedIn table
	// TODO
	
	// IsTA table
	// TODO
?>

<?php include('footer.php'); ?>
