create schema krc353_1 collate latin1_swedish_ci;

create table Block
(
	BName char(30) not null
		primary key,
	Address varchar(30) null,
	NumFloors int null,
	NumRooms int null
);

create table Campus
(
	CampID int not null
		primary key,
	Name char(30) null
);

create table BlockCamp
(
	CampID int null,
	BName varchar(30) default '' not null
		primary key,
	constraint BlockCamp_Block_Name_fk
		foreign key (BName) references Block (BName),
	constraint BlockCamp_Campus_CampID_fk
		foreign key (CampID) references Campus (CampID)
);

create table Course
(
	CID int not null
		primary key,
	CName char(30) null
);

create table Department
(
	DName char(30) not null
		primary key,
	Chairman char(30) not null
);

create table DeptCamp
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
);

create table Facility
(
	equipment varchar(30) null,
	facID int default 0 not null
		primary key
);

create table PTInstructor
(
	IID int default 0 not null
		primary key
);

create table PrereqFollow
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
);

create table Program
(
	PName char(30) not null
		primary key,
	TotalCredits int null
);

create table ResearchFunding
(
	RID int not null
		primary key,
	Amount int null
);

create table Room
(
	RoID int auto_increment
		primary key,
	ClassNum int null,
	Capacity int null,
	Type varchar(30) default 'classroom' not null
);

create table BlockRoom
(
	RoID int not null
		primary key,
	BName varchar(30) not null,
	constraint BlockRoom_Block_BName_fk
		foreign key (BName) references Block (BName)
			on update cascade,
	constraint BlockRoom_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
);

create table Classroom
(
	ROID int default 0 not null
		primary key,
	name varchar(30) default 'classroom' null,
	constraint Classroom_Room_RoID_fk
		foreign key (ROID) references Room (RoID)
			on update cascade
);

create table ConferenceRoom
(
	RoID int not null
		primary key,
	ClassLab tinyint(1) default 0 null,
	constraint ConferenceRoom_ibfk_1
		foreign key (RoID) references Room (RoID)
			on update cascade on delete cascade
);

create table Contains
(
	facID int default 0 not null,
	RoID int default 0 not null,
	primary key (facID, RoID),
	constraint Contains_Facility_facID_fk
		foreign key (facID) references Facility (facID)
			on update cascade,
	constraint Contains_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
			on update cascade
);

create table LabRoom
(
	RoID int not null
		primary key,
	ClassLab tinyint(1) default 0 null,
	constraint LabRoom_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
			on update cascade
);

create table Office
(
	RoID int not null
		primary key,
	ClassLab tinyint(1) default 0 null,
	constraint Office_ibfk_1
		foreign key (RoID) references Room (RoID)
			on update cascade on delete cascade
);

create table SalaryHist
(
	IID int null,
	Salary float null
);

create table Student
(
	STID int not null
		primary key,
	Credit int null,
	FirstName char(30) null,
	LastName char(30) null,
	GPA float null,
	SSN int not null,
	Phone varchar(30) null,
	Email varchar(30) null,
	constraint Student_SSN_uindex
		unique (SSN)
);

create table Belong
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
);

create index PName
	on Belong (PName);

create table Graduate
(
	STID int default 0 not null
		primary key,
	thesis tinyint(1) null,
	constraint Graduate_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table Fund
(
	STID int not null
		primary key,
	RID int null,
	constraint Fund_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade,
	constraint Fund_ResearchFunding_RID_fk
		foreign key (RID) references ResearchFunding (RID)
);

create table GradAwards
(
	AwardName char(30) default '' not null,
	DateReceived date default '0000-00-00' not null,
	STID int default 0 not null,
	primary key (AwardName, DateReceived, STID),
	constraint GradAwards_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade
);

create table GradExperience
(
	JobPosition char(30) default '' not null,
	STID int default 0 not null,
	DateStarted date default '0000-00-00' not null,
	Company varchar(30) default '' not null,
	primary key (JobPosition, Company, DateStarted, STID),
	constraint GradExperience_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade
);

create table GradPublications
(
	PubName char(30) default '' not null,
	PubDate date default '0000-00-00' not null,
	STID int default 0 not null,
	primary key (STID, PubName, PubDate),
	constraint GradPublications_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade
);

create index GradPublications_Graduate_STID_SSN_fk
	on GradPublications (STID);

create table GradUniversityDegrees
(
	UniDegree char(30) default '' not null,
	UniName char(30) default '' not null,
	DateReceived date default '0000-00-00' not null,
	STID int default 0 not null,
	primary key (UniDegree, STID, UniName, DateReceived),
	constraint GradUniversityDegrees_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade
);

create index GradUniversityDegrees_Graduate_STID_SSN_fk
	on GradUniversityDegrees (STID);

create table StDegHist
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
);

create table StHomeAddress
(
	City char(30) null,
	Province char(30) null,
	CivicNumber int null,
	PostalCode varchar(30) null,
	STID int not null
		primary key,
	constraint StHomeAddress_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table Supervisor
(
	SupID int not null
		primary key
);

create table Instructor
(
	IID int not null
		primary key,
	ISSN int not null,
	Phone varchar(30) null,
	FirstName varchar(30) null,
	SupID int null,
	Email varchar(30) null,
	LastName char(30) null,
	constraint Instructor_Supervisor_SupID_fk
		foreign key (SupID) references Supervisor (SupID)
			on update cascade
);

create table FTInstructor
(
	IID int not null
		primary key,
	constraint FTInstructor_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table InsAwards
(
	AwardName char(30) default '' not null,
	DateReceived date default '0000-00-00' not null,
	IID int default 0 not null,
	primary key (AwardName, DateReceived, IID),
	constraint InsAwards_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table InsExperience
(
	JobPosition varchar(30) default '' not null,
	DateStarted date default '0000-00-00' not null,
	Company varchar(30) default '' not null,
	IID int default 0 not null,
	primary key (JobPosition, DateStarted, Company, IID),
	constraint InsExperience_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table InsHomeAddress
(
	City char(30) null,
	Province char(30) null,
	CivicNumber int null,
	PostalCode varchar(30) null,
	IID int not null
		primary key,
	constraint InsHomeAddress_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table InsPublications
(
	PubName varchar(30) default '' not null,
	PubDate date default '0000-00-00' not null,
	IID int default 0 not null,
	primary key (PubName, PubDate, IID),
	constraint InsPublications_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table InsUniversityDegrees
(
	UniName varchar(30) default '' not null,
	UniDegree varchar(30) default '' not null,
	IID int default 0 not null,
	DateReceived date default '0000-00-00' not null,
	primary key (UniName, UniDegree, DateReceived, IID),
	constraint InsUniversityDegrees_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table Section
(
	SeID int not null
		primary key,
	Semester char(30) default '' not null,
	Year int default 0 not null,
	instructorID int not null,
	constraint Section_Instructor_IID_fk
		foreign key (instructorID) references Instructor (IID)
			on update cascade
);

create table ClassTimeslot
(
	StartTime time default '00:00:00' not null,
	DayWeek varchar(30) default '' not null,
	SeID int default 0 not null,
	EndTime time null,
	RoID int not null,
	instructorID int null,
	semester int null,
	primary key (StartTime, DayWeek, SeID),
	constraint ClassTimeslot_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
			on update cascade,
	constraint ClassTimeslot_Section_SeID_fk
		foreign key (SeID) references Section (SeID)
);

create table Contracts
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
);

create index Contracts_TeachingAssistant_TAID_fk
	on Contracts (TAID);

create table EnrolledIn
(
	STID int default 0 not null,
	SeID int default 0 not null,
	Grade char(2) null,
	primary key (STID, SeID),
	constraint EnrolledIn_Section_SeID_fk
		foreign key (SeID) references Section (SeID),
	constraint EnrolledIn_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table Has
(
	CID int null,
	SeID int default 0 not null
		primary key,
	constraint Has_Section_SeID_fk
		foreign key (SeID) references Section (SeID),
	constraint Has_ibfk_1
		foreign key (CID) references Course (CID)
);

create index CID
	on Has (CID);

create table HasContract
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
);

create table Supervises
(
	SupID int not null,
	STID int not null,
	primary key (STID, SupID),
	constraint Supervises_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade,
	constraint Supervises_Supervisor_SupID_fk
		foreign key (SupID) references Supervisor (SupID)
);

create table Teach
(
	SeID int default 0 not null,
	IID int default 0 not null,
	primary key (IID, SeID),
	constraint Teach_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create index Teach_Section_SeID_fk
	on Teach (SeID);

create table TeachingAssistant
(
	TAID int not null
		primary key,
	TotalHours int null,
	AssignmentMarking char null,
	LabInstructor char null,
	NumCourses int null,
	TutorialSession char null
);

create table AssignHist
(
	AssignID int not null,
	TAID int default 0 not null,
	primary key (AssignID, TAID),
	constraint AssignHist_TeachingAssistant_TAID_fk
		foreign key (TAID) references TeachingAssistant (TAID)
			on update cascade
);

create table AssignTo
(
	SeID int default 0 not null,
	TAID int default 0 not null,
	primary key (SeID, TAID),
	constraint AssignTo_Section_SeID_fk
		foreign key (SeID) references Section (SeID),
	constraint AssignTo_ibfk_2
		foreign key (TAID) references TeachingAssistant (TAID)
);

create index TAID
	on AssignTo (TAID);

create table InvolvedIn
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
);

create table IsTA
(
	STID int default 0 not null
		primary key,
	TAID int null,
	constraint IsTA_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade,
	constraint IsTA_TeachingAssistant_TAID_fk
		foreign key (TAID) references TeachingAssistant (TAID)
			on update cascade
);

create table Under
(
	DName char(30) null,
	PName char(30) default '' not null
		primary key,
	constraint Under_Department_DName_fk
		foreign key (DName) references Department (DName)
			on update cascade,
	constraint Under_ibfk_2
		foreign key (PName) references Program (PName)
);

create table Undergraduate
(
	STID int default 0 not null
		primary key,
	constraint Undergraduate_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table Within
(
	CID int default 0 not null
		primary key,
	DName char(30) null,
	constraint Within_Department_DName_fk
		foreign key (DName) references Department (DName)
			on update cascade,
	constraint Within_ibfk_1
		foreign key (CID) references Course (CID)
);

create table Work
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
);

