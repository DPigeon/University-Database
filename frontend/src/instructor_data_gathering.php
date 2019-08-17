<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Obtain / gather all the instructor's data. -->
<center>
   <br>
      <h3>New Instructor ? Hop in !</h3>
      <br>
         <form action="student_storing_gathered_data.php" method="post">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorFirstName" aria-describedby="nameHelp" placeholder="First name">
                <small id="nameHelp" class="form-text text-muted">What is your first name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorLastName" aria-describedby="lnameHelp" placeholder="Last name">
                <small id="lnameHelp" class="form-text text-muted">What is your last name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ISSN" aria-describedby="lnameHelp" placeholder="SSN">
                <small id="lnameHelp" class="form-text text-muted">What is your SSN?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="IID" aria-describedby="lnameHelp" placeholder="Student ID Number">
                <small id="lnameHelp" class="form-text text-muted">What is your instructor ID number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorPhoneNumber" aria-describedby="lnameHelp" placeholder="123-4567">
                <small id="lnameHelp" class="form-text text-muted">What is your phone number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorEmailAddress" aria-describedby="lnameHelp" placeholder="someone@example.com">
                <small id="lnameHelp" class="form-text text-muted">What is your email address?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="supervisorID" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">What is your supervisor ID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorAwardName" aria-describedby="lnameHelp" placeholder="Award name">
                <small id="lnameHelp" class="form-text text-muted">What is the name of your award?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorAwardDateReceived" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you receive the aforementioned award?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorExperienceJobPosition" aria-describedby="lnameHelp" placeholder="Previous Job Position">
                <small id="lnameHelp" class="form-text text-muted">What was your previous job position?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorExperienceDateStarted" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you start that previous job?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorExperienceCompany" aria-describedby="lnameHelp" placeholder="Previous Job Company">
                <small id="lnameHelp" class="form-text text-muted">For which company was that previous job?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorHomeAddressCity" aria-describedby="lnameHelp" placeholder="City">
                <small id="lnameHelp" class="form-text text-muted">Which city do you live in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorHomeAddressProvince" aria-describedby="lnameHelp" placeholder="Province">
                <small id="lnameHelp" class="form-text text-muted">Which province do you live in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorHomeAddressCivicNumber" aria-describedby="lnameHelp" placeholder="Civic number">
                <small id="lnameHelp" class="form-text text-muted">What's your civic number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorHomeAddressPostalCode" aria-describedby="lnameHelp" placeholder="A1B 2C3">
                <small id="lnameHelp" class="form-text text-muted">What's your postal code?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorPublicationPublicationName" aria-describedby="lnameHelp" placeholder="Publication name">
                <small id="lnameHelp" class="form-text text-muted">What is the name of your publication?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorPublicationPublicationDate" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you publish that previous publication?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorUniversityDegreesUniversityName" aria-describedby="lnameHelp" placeholder="University name">
                <small id="lnameHelp" class="form-text text-muted">What is the name of your university?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorUniversityDegreesUniversityDegree" aria-describedby="lnameHelp" placeholder="Degree name">
                <small id="lnameHelp" class="form-text text-muted">What is your university degree in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="instructorUniversityDegreesDateReceived" aria-describedby="lnameHelp" placeholder="YYYY-MM-DD">
                <small id="lnameHelp" class="form-text text-muted">When did you receive your university degree?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SalaryHistSalary" aria-describedby="lnameHelp" placeholder="$0.00">
                <small id="lnameHelp" class="form-text text-muted">What is your SalaryHistSalary?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SupervisesSTID" aria-describedby="lnameHelp" placeholder="Student's ID">
                <small id="lnameHelp" class="form-text text-muted">What is the student ID of the student you are supervising?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachSeID" aria-describedby="lnameHelp" placeholder="Section ID of course taught">
                <small id="lnameHelp" class="form-text text-muted">What is the section ID of the course you are teaching?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="HasContractContractID" aria-describedby="lnameHelp" placeholder="ID number of your contract">
                <small id="lnameHelp" class="form-text text-muted">What is the ID number of your contract?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="DName" aria-describedby="lnameHelp" placeholder="Department name of department worked for">
                <small id="lnameHelp" class="form-text text-muted">What is the name of the department you work for?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="isFTInstructor">
                <label class="form-check-label" for="grad">FTInstructor</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="isPTInstructor">
                <label class="form-check-label" for="grad">PTInstructor</label>
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
