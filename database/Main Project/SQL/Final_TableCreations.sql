create schema krc353_1 collate latin1_swedish_ci;

create table if not exists Block
(
	BName char(30) not null
		primary key,
	Address varchar(30) null,
	NumFloors int null,
	NumRooms int null
);

create table if not exists Campus
(
	CampID int not null
		primary key,
	Name char(30) null
);

create table if not exists BlockCamp
(
	CampID int null,
	BName varchar(30) default '' not null
		primary key,
	constraint BlockCamp_Block_Name_fk
		foreign key (BName) references Block (BName),
	constraint BlockCamp_Campus_CampID_fk
		foreign key (CampID) references Campus (CampID)
);

create table if not exists Course
(
	CID int not null
		primary key,
	CName char(30) null
);

create table if not exists Department
(
	DName char(30) not null
		primary key,
	Chairman char(30) not null
);

create table if not exists DeptCamp
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

create table if not exists PTInstructor
(
	IID int default 0 not null
		primary key
);

create table if not exists `Prereq-Follow`
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

create table if not exists Program
(
	PName char(30) not null
		primary key,
	TotalCredits int null
);

create table if not exists ResearchFunding
(
	RID int not null
		primary key,
	Amount int null
);

create table if not exists Room
(
	RoID int auto_increment
		primary key,
	ClassNum int null,
	Capacity int null
);

create table if not exists BlockRoom
(
	RoID int not null,
	BName varchar(30) not null,
	primary key (BName, RoID),
	constraint BlockRoom_Block_Name_fk
		foreign key (BName) references Block (BName),
	constraint BlockRoom_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
);

create table if not exists Classroom
(
	ROID int default 0 not null
		primary key,
	constraint Classroom_Room_RoID_fk
		foreign key (ROID) references Room (RoID)
			on update cascade
);

create table if not exists ConferenceRoom
(
	RoID int not null
		primary key,
	constraint ConferenceRoom_ibfk_1
		foreign key (RoID) references Room (RoID)
			on update cascade on delete cascade
);

create table if not exists LabRoom
(
	RoID int not null
		primary key,
	constraint LabRoom_Room_RoID_fk
		foreign key (RoID) references Room (RoID)
			on update cascade
);

create table if not exists Facility
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
);

create table if not exists Office
(
	RoID int not null
		primary key,
	constraint Office_ibfk_1
		foreign key (RoID) references Room (RoID)
			on update cascade on delete cascade
);

create table if not exists Section
(
	SeID int not null
		primary key,
	Semester char(30) null,
	Year int null
);

create table if not exists ClassTimeslot
(
	StartTime time default '00:00:00' not null,
	DayWeek varchar(30) default '' not null,
	SeID int default 0 not null,
	EndTime time null,
	RoID int not null,
	primary key (StartTime, DayWeek, SeID),
	constraint ClassTimeslot_ibfk_2
		foreign key (SeID) references Section (SeID)
);

create index SeID
	on ClassTimeslot (SeID);

create table if not exists Contracts
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
);

create index Contracts_TeachingAssistant_TAID_fk
	on Contracts (TAID);

create table if not exists Has
(
	CID int null,
	SeID int default 0 not null
		primary key,
	constraint Has_ibfk_1
		foreign key (CID) references Course (CID),
	constraint Has_ibfk_2
		foreign key (SeID) references Section (SeID)
);

create index CID
	on Has (CID);

create table if not exists HasContract
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

create table if not exists Schedule
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
);

create table if not exists Student
(
	STID int not null
		primary key,
	Credit int null,
	FirstName char(30) null,
	LastName char(30) null,
	GPA float null,
	SSN int not null,
	Phone varchar(30) null,
	Email varchar(30) null
);

create table if not exists Belong
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

create table if not exists EnrolledIn
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
);

create index SeID
	on EnrolledIn (SeID);

create table if not exists Graduate
(
	STID int default 0 not null
		primary key,
	thesis tinyint(1) null,
	constraint Graduate_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table if not exists Fund
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

create table if not exists GradAwards
(
	AwardName char(30) default '' not null,
	DateReceived date default '0000-00-00' not null,
	STID int default 0 not null,
	primary key (AwardName, DateReceived, STID),
	constraint GradAwards_Graduate_STID_fk
		foreign key (STID) references Graduate (STID)
			on update cascade
);

create table if not exists GradExperience
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

create table if not exists GradPublications
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

create table if not exists GradUniversityDegrees
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

create table if not exists StDegHist
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

create table if not exists StHomeAddress
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
);

create table if not exists Supervisor
(
	SupID int not null
		primary key
);

create table if not exists Instructor
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

create table if not exists FTInstructor
(
	IID int not null
		primary key,
	constraint FTInstructor_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table if not exists InsAwards
(
	AwardName char(30) default '' not null,
	DateReceived date default '0000-00-00' not null,
	IID int default 0 not null,
	primary key (AwardName, DateReceived, IID),
	constraint InsAwards_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table if not exists InsExperience
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

create table if not exists InsHomeAddress
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
);

create table if not exists InsPublications
(
	PubName varchar(30) default '' not null,
	PubDate date default '0000-00-00' not null,
	IID int default 0 not null,
	primary key (PubName, PubDate, IID),
	constraint InsPublications_Instructor_IID_fk
		foreign key (IID) references Instructor (IID)
			on update cascade
);

create table if not exists InsUniversityDegrees
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

create table if not exists SalaryHist
(
	Salary float not null,
	IID int not null,
	primary key (IID, Salary),
	constraint SalaryHist_FTInstructor_IID_fk
		foreign key (IID) references FTInstructor (IID)
			on update cascade
);

create table if not exists Supervises
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

create table if not exists Teach
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
);

create table if not exists TeachingAssistant
(
	TAID int not null
		primary key,
	TotalHours int null,
	AssignmentMarking char null,
	LabInstructor char null,
	NumCourses int null,
	TutorialSession char null
);

create table if not exists AssignHist
(
	AssignID int not null,
	TAID int default 0 not null,
	primary key (AssignID, TAID),
	constraint AssignHist_TeachingAssistant_TAID_fk
		foreign key (TAID) references TeachingAssistant (TAID)
			on update cascade
);

create table if not exists AssignTo
(
	SeID int default 0 not null,
	TAID int default 0 not null,
	primary key (SeID, TAID),
	constraint AssignTo_ibfk_1
		foreign key (SeID) references Section (SeID),
	constraint AssignTo_ibfk_2
		foreign key (TAID) references TeachingAssistant (TAID)
);

create index TAID
	on AssignTo (TAID);

create table if not exists InvolvedIn
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

create table if not exists IsTA
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

create table if not exists Under
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

create table if not exists Undergraduate
(
	STID int default 0 not null
		primary key,
	constraint Undergraduate_Student_STID_fk
		foreign key (STID) references Student (STID)
			on update cascade
);

create table if not exists Within
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

create table if not exists Work
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