<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Obtain / gather all the student's data. -->
<center>
   <br>
      <h3>New Student ? Hop in !</h3>
      <br>
         <form action="student_storing_gathered_data.php" method="post">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="studentFirstName" aria-describedby="nameHelp" placeholder="First name">
                <small id="nameHelp" class="form-text text-muted">What is your first name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="studentLastName" aria-describedby="lnameHelp" placeholder="Last name">
                <small id="lnameHelp" class="form-text text-muted">What is your last name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SSSN" aria-describedby="lnameHelp" placeholder="SSN">
                <small id="lnameHelp" class="form-text text-muted">What is your SSN?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="STID" aria-describedby="lnameHelp" placeholder="Student ID Number">
                <small id="lnameHelp" class="form-text text-muted">What is your student ID number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="Credit" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">What is your credit?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GPA" aria-describedby="lnameHelp" placeholder="0.0">
                <small id="lnameHelp" class="form-text text-muted">What is your GPA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentPhoneNumber" aria-describedby="lnameHelp" placeholder="123-4567">
                <small id="lnameHelp" class="form-text text-muted">What is your phone number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentEmailAddress" aria-describedby="lnameHelp" placeholder="someone@example.com">
                <small id="lnameHelp" class="form-text text-muted">What is your email address?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="graduateStudentThesis" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">Enter the tiny integer representing your thesis.</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradAwardsAwardName" aria-describedby="lnameHelp" placeholder="GradAwardsAwardName">
                <small id="lnameHelp" class="form-text text-muted">What is your GradAwardsAwardName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradAwardsDateReceived" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">What is your GradAwardsDateReceived?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradExperienceJobPosition" aria-describedby="lnameHelp" placeholder="GradExperienceJobPosition">
                <small id="lnameHelp" class="form-text text-muted">What is your GradExperienceJobPosition?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradExperienceDateStarted" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you start your GradExperienceJobPosition?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradExperienceCompany" aria-describedby="lnameHelp" placeholder="GradExperienceCompany">
                <small id="lnameHelp" class="form-text text-muted">What is your GradExperienceCompany?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradPublicationsPubName" aria-describedby="lnameHelp" placeholder="GradPublicationsPubName">
                <small id="lnameHelp" class="form-text text-muted">What is your GradPublicationsPubName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradPublicationsPubDate" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">What is your GradPublicationsPubDate?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradUniversityDegreesUniDegree" aria-describedby="lnameHelp" placeholder="GradUniversityDegreesUniDegree">
                <small id="lnameHelp" class="form-text text-muted">What is your GradUniversityDegreesUniDegree?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradUniversityDegreesUniName" aria-describedby="lnameHelp" placeholder="GradUniversityDegreesUniName">
                <small id="lnameHelp" class="form-text text-muted">What is your GradUniversityDegreesUniName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="GradUniversityDegreesDateReceived" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">Whehn did you receive your graduate university degree?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StHomeAddressCity" aria-describedby="lnameHelp" placeholder="City Name">
                <small id="lnameHelp" class="form-text text-muted">Which city do you live in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StHomeAddressProvince" aria-describedby="lnameHelp" placeholder="Province Name">
                <small id="lnameHelp" class="form-text text-muted">Which province do you live in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StHomeAddressCivicNumber" aria-describedby="lnameHelp" placeholder="Civic Number">
                <small id="lnameHelp" class="form-text text-muted">What is your civic number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StHomeAddressPostalCode" aria-describedby="lnameHelp" placeholder="A1B 2C3">
                <small id="lnameHelp" class="form-text text-muted">What is your postal code?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StDegHistDegreeName" aria-describedby="lnameHelp" placeholder="Degree Name">
                <small id="lnameHelp" class="form-text text-muted">What is your degree name?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StDegHistOverallAvg" aria-describedby="lnameHelp" placeholder="0.0">
                <small id="lnameHelp" class="form-text text-muted">What is your overall average?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StDegHistInstitutionName" aria-describedby="lnameHelp" placeholder="Attended Academic Institution Name">
                <small id="lnameHelp" class="form-text text-muted">What is the name of the academic institution you attended?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StDegHistDateReceived" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you receive this degree?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TAID" aria-describedby="lnameHelp" placeholder="TA ID Number">
                <small id="lnameHelp" class="form-text text-muted">What is your TA ID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantTotalHours" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">For how many hours did you work as a TA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantAssignmentMarking" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Do you mark any assignments?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantLabInstructor" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Are you a Lab Instructor TA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantNumCourses" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">How many courses are you teaching (as a TA)?</small>
              </div>
			   <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantTutorialSession" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Are you a tutorial session TA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="EnrolledInSeID" aria-describedby="lnameHelp" placeholder="Enrolled-in section ID">
                <small id="lnameHelp" class="form-text text-muted">What is the section ID of the course you were enrolled in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="EnrolledInGrade" aria-describedby="lnameHelp" placeholder="A+">
                <small id="lnameHelp" class="form-text text-muted">What is the grade for you got the course you were enrolled in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractsCID" aria-describedby="lnameHelp" placeholder="Course ID of Contract">
                <small id="lnameHelp" class="form-text text-muted">What is the ID of the course itself that you were teaching (as a TA)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractsDate" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When was this contract established?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractsAmount" aria-describedby="lnameHelp" placeholder="$0.00">
                <small id="lnameHelp" class="form-text text-muted">How much do you earn in this contract?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractsSeID" aria-describedby="lnameHelp" placeholder="Section ID of of course in Contract">
                <small id="lnameHelp" class="form-text text-muted">What is the ID of the section of the course you were teaching (as a TA)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractID" aria-describedby="lnameHelp" placeholder="Contract ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID number of your contract?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="RID" aria-describedby="lnameHelp" placeholder="Research Funding ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID number of your research funding file?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ResearchFundingAmount" aria-describedby="lnameHelp" placeholder="$0.00">
                <small id="lnameHelp" class="form-text text-muted">What is the amount of money you've been given as funding for your research?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="PName" aria-describedby="lnameHelp" placeholder="Name of Program of study">
                <small id="lnameHelp" class="form-text text-muted">What is the name of the program you are studying?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ProgramTotalCredits" aria-describedby="lnameHelp" placeholder="90 - 120">
                <small id="lnameHelp" class="form-text text-muted">What is the officiall amount of credits that your program advertises itself to be?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BelongAdvisor" aria-describedby="lnameHelp" placeholder="90 - 120">
                <small id="lnameHelp" class="form-text text-muted">What is the full name of your advisor (appointed to you for help regarding your program)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="AssignHistAssignID" aria-describedby="lnameHelp" placeholder="AssignHistAssignID">
                <small id="lnameHelp" class="form-text text-muted">What is your AssignHistAssignID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="isGraduate">
                <label class="form-check-label" for="grad">Graduate</label>
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
