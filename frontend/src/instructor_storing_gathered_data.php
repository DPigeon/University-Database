<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Ensure that all table / relations related to an instructor are created. -->
<?php
	// Ensure Instructor table / relation is created.
	$sqlSyntax = "create table if not exists Instructor
	(
		IID int not null
			primary key,
		Name char(30) null,
		ISSN int not null,
		Phone varchar(30) null,
		FirstName varchar(30) null,
		SupID int null,
		Email varchar(30) null,
		constraint Instructor_Supervisor_SupID_fk
			foreign key (SupID) references Supervisor (SupID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure FTInstructor table / relation is created.
	$sqlSyntax = "create table if not exists FTInstructor
	(
		IID int not null
			primary key,
		constraint FTInstructor_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure PTInstructor table / relation is created.
	$sqlSyntax = "create table if not exists PTInstructor
	(
		IID int default 0 not null
			primary key
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure InsAwards table / relation is created.
	$sqlSyntax = "create table if not exists InsAwards
	(
		AwardName char(30) default '' not null,
		instructorAwardDateReceived date default '0000-00-00' not null,
		IID int default 0 not null,
		primary key (AwardName, instructorAwardDateReceived, IID),
		constraint InsAwards_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure InsExperience table / relation is created.
	$sqlSyntax = "create table if not exists InsExperience
	(
		JobPosition varchar(30) default '' not null,
		DateStarted date default '0000-00-00' not null,
		Company varchar(30) default '' not null,
		IID int default 0 not null,
		primary key (JobPosition, DateStarted, Company, IID),
		constraint InsExperience_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure InsHomeAddress table / relation is created.
	$sqlSyntax = "create table if not exists InsHomeAddress
	(
		City char(30) null,
		Province char(30) null,
		CivicNumber int null,
		PostalCode int null,
		IID int not null
			primary key,
		constraint InsHomeAddress_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure InsPublications table / relation is created.
	$sqlSyntax = "create table if not exists InsPublications
	(
		PubName varchar(30) default '' not null,
		PubDate date default '0000-00-00' not null,
		IID int default 0 not null,
		primary key (PubName, PubDate, IID),
		constraint InsPublications_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure InsUniversityDegrees table / relation is created.
	$sqlSyntax = "create table if not exists InsUniversityDegrees
	(
		UniName varchar(30) default '' not null,
		UniDegree varchar(30) default '' not null,
		IID int default 0 not null,
		instructorAwardDateReceived date default '0000-00-00' not null,
		primary key (UniName, UniDegree, instructorAwardDateReceived, IID),
		constraint InsUniversityDegrees_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure SalaryHist table / relation is created.
	$sqlSyntax = "create table if not exists SalaryHist
	(
		Salary float not null,
		IID int not null,
		primary key (IID, Salary),
		constraint SalaryHist_FTInstructor_IID_fk
			foreign key (IID) references FTInstructor (IID)
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
	
	// Ensure Teach table / relation is created.
	$sqlSyntax = "create table if not exists Teach
	(
		SeID int default 0 not null,
		IID int default 0 not null,
		primary key (IID, SeID),
		constraint Teach_Instructor_IID_fk
			foreign key (IID) references Instructor (IID)
				on update cascade,
		constraint Teach_Section_SeID_fk
			foreign key (SeID) references Section (SeID)
				on update cascade
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure Supervisor table / relation is created.
	$sqlSyntax = "create table if not exists Supervisor
	(
		SupID int not null
			primary key
	);";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // $mysqlConnection is obtained from sqlConfig.php
	
	// Ensure HasContract table / relation is created.
	$sqlSyntax = "create table if not exists HasContract
	(
		IID int default 0 not null,
		ContractID int default 0 not null,
		primary key (IID, ContractID),
		constraint HasContract_Contracts_ContractID_fk
			foreign key (ContractID) references Contracts (ContractID)
				on update cascade,
		constraint HasContract_PTInstructor_IID_fk
			foreign key (IID) references PTInstructor (IID)
				on update cascade
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
?>

<?php
	
	// Store the instructor's data (that was obtained from the form on instructor_data_gathering.php) (into the MySQL database).
	
	// Store the data required for the MySQL table(s) related to the instructor.
	
	// Instructor table
	$IID = htmlspecialchars($_POST['IID']);
	$ISSN = htmlspecialchars($_POST['ISSN']);
	$Phone = htmlspecialchars($_POST['instructorPhoneNumber']);
	$FirstName = htmlspecialchars($_POST['instructorFirstName']);
	$SupID = htmlspecialchars($_POST['supervisorID']);
	$Email = htmlspecialchars($_POST['instructorEmailAddress']);
	$LastName = htmlspecialchars($_POST['instructorLastName']);
	$sqlSyntax = "INSERT INTO Student VALUES('" . $IID . "','" . $ISSN . "','" . $Phone . "','" . $FirstName . "','" . $SupID . "','" . $Email . "','" . $LastName . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	if( $_POST['isFTInstructor'] ) {
		$sqlSyntax = "INSERT INTO FTInstructor VALUES('" . $IID . "');"; // FTInstructor table
	}
	elseif( $_POST['isPTInstructor'] )  {
		$sqlSyntax = "INSERT INTO PTInstructor VALUES('" . $IID . "');"; // PTInstructor table
	}
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // FTInstructor or PTInstructor table
	
	// InsAwards table
	$AwardName = htmlspecialchars($_POST['instructorAwardName']);
	$instructorAwardDateReceived = htmlspecialchars($_POST['instructorAwardinstructorAwardDateReceived']);
	$sqlSyntax = "INSERT INTO InsAwards VALUES('" . $AwardName . "','" . $instructorAwardDateReceived . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax); // FTInstructor or PTInstructor table
	
	// InsExperience table
	$JobPosition = htmlspecialchars($_POST['instructorExperienceJobPosition']);
	$DateStarted = htmlspecialchars($_POST['instructorExperienceDateStarted']);
	$Company = htmlspecialchars($_POST['instructorExperienceCompany']);
	$sqlSyntax = "INSERT INTO InsExperience VALUES('" . $JobPosition . "','" . $DateStarted . "','" . $Company . "','" . $IID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// InsHomeAddress table
	$City = htmlspecialchars($_POST['instructorHomeAddressCity']);
	$Province = htmlspecialchars($_POST['instructorHomeAddressProvince']);
	$CivicNumber = htmlspecialchars($_POST['instructorHomeAddressCivicNumber']);
	$PostalCode = htmlspecialchars($_POST['instructorHomeAddressPostalCode']);
	$sqlSyntax = "INSERT INTO InsHomeAddress VALUES('" . $City . "','" . $Province . "','" . $CivicNumber . "','" . $PostalCode . "','" . $IID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// InsPublications table
	$PubName = htmlspecialchars($_POST['instructorPublicationPublicationName']);
	$PubDate = htmlspecialchars($_POST['instructorPublicationPublicationDate']);
	$sqlSyntax = "INSERT INTO InsPublications VALUES('" . $PubName . "','" . $PubDate . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// InsUniversityDegrees table
	$UniName = htmlspecialchars($_POST['instructorUniversityDegreesUniversityName']);
	$UniDegree =  htmlspecialchars($_POST['instructorUniversityDegreesUniversityDegree']);
	$instructorUniversityDegreesDateReceived =  htmlspecialchars($_POST['instructorUniversityDegreesDateReceived']);
	$sqlSyntax = "INSERT INTO InsUniversityDegrees VALUES('" . $UniName . "','" . $UniDegree . "','" . $IID . "','" . $instructorUniversityDegreesDateReceived . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// SalaryHist table
	$SalaryHistSalary = htmlspecialchars($_POST['SalaryHistSalary']);
	$sqlSyntax = "INSERT INTO SalaryHist VALUES('" . $SalaryHistSalary . "','" . $IID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Supervises table
	$SupervisesSTID = htmlspecialchars($_POST['SupervisesSTID']);
	$sqlSyntax = "INSERT INTO Supervises VALUES('" . $SupID . "','" . $SupervisesSTID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Teach table
	$TeachSeID = htmlspecialchars($_POST['TeachSeID']);
	$sqlSyntax = "INSERT INTO Teach VALUES('" . $TeachSeID . "','" . $IID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Supervisor (not Supervises) table
	$sqlSyntax = "INSERT INTO Supervisor VALUES('" . $SupID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// HasContract table
	$HasContractContractID = htmlspecialchars($_POST['HasContractContractID']);
	$sqlSyntax = "INSERT INTO HasContract VALUES('" . $IID . "','" . $HasContractContractID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
	// Work table
	$DName = htmlspecialchars($_POST['DName']);
	$sqlSyntax = "INSERT INTO Work VALUES('" . $DName . "','" . $IID . "');";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	
?>

<?php include('footer.php'); ?>
