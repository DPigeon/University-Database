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
				  Query:
              </div>
              <div class="form-group" style="width: 50%;">
				<input type="radio" name="gender"
				<?php if (isset($gender) && $gender=="female") echo "checked";?>
				value="1">i
				<input type="radio" name="gender"
				<?php if (isset($gender) && $gender=="male") echo "checked";?>
				value="male">Male
				<input type="radio" name="gender"
				<?php if (isset($gender) && $gender=="other") echo "checked";?>
				value="other">Other
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="isGraduate">
                <label class="form-check-label" for="grad">Graduate</label>
              </div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
