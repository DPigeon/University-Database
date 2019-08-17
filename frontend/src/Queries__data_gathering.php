<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Obtain / gather all the data required to process the queries. -->
<center>
   <br>
      <h3>Want to process the queries ? Let us know the input to feed them !</h3>
      <br>
         <form action="result_displaying.php" method="post">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorIID" aria-describedby="lnameHelp" placeholder="Instructor ID">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor ID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorISSN" aria-describedby="lnameHelp" placeholder="InstructorISSN">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor SSN?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorPhone" aria-describedby="lnameHelp" placeholder="000-000-0000">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor's phone number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorFirstName" aria-describedby="lnameHelp" placeholder="Instructor's first name">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor's first name?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorLastName" aria-describedby="lnameHelp" placeholder="Instructor's last name">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor's last name?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorSupID" aria-describedby="lnameHelp" placeholder="Instructor's supervisor ID">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor's supervisor ID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="InstructorEmail" aria-describedby="lnameHelp" placeholder="someone@example.com">
                <small id="lnameHelp" class="form-text text-muted">What is the instructor's email address?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_i__choice_of_attribute_to_update" aria-describedby="lnameHelp" placeholder="Attribute to update for query i">
                <small id="lnameHelp" class="form-text text-muted">For query i, which attribute would you like to update?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_i__value_for_chosen_attribute_to_update" aria-describedby="lnameHelp" placeholder="Value for chosen attribute of query i">
                <small id="lnameHelp" class="form-text text-muted">For query i, what value would you like the attribute you chose to update to be updated with?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentSTID" aria-describedby="lnameHelp" placeholder="Student ID">
                <small id="lnameHelp" class="form-text text-muted">What is the student's ID (for queries ii and xxii)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentCredit" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">What is the student's amount of credits?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentFirstName" aria-describedby="lnameHelp" placeholder="Student's first name">
                <small id="lnameHelp" class="form-text text-muted">What is the student's first name (for queries ii and xix)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentLastName" aria-describedby="lnameHelp" placeholder="Student's last name">
                <small id="lnameHelp" class="form-text text-muted">What is the student's last name?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentGPA" aria-describedby="lnameHelp" placeholder="0.0">
                <small id="lnameHelp" class="form-text text-muted">What is the student's GPA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentSSN" aria-describedby="lnameHelp" placeholder="Student's SSN">
                <small id="lnameHelp" class="form-text text-muted">What is the student's SSN (for queries ii, xx and xxi)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentPhone" aria-describedby="lnameHelp" placeholder="000-000-0000">
                <small id="lnameHelp" class="form-text text-muted">What is the student's phone number?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="StudentEmail" aria-describedby="lnameHelp" placeholder="someone@example.com">
                <small id="lnameHelp" class="form-text text-muted">What is the student's email address?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_ii__choice_of_attribute_to_update" aria-describedby="lnameHelp" placeholder="Attribute to update for query ii">
                <small id="lnameHelp" class="form-text text-muted">For query ii, which attribute would you like to update?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_ii__value_for_chosen_attribute_to_update" aria-describedby="lnameHelp" placeholder="Value for chosen attribute of query ii">
                <small id="lnameHelp" class="form-text text-muted">For query ii, what value would you like the attribute you chose to update to be updated with?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantTAID" aria-describedby="lnameHelp" placeholder="TA ID">
                <small id="lnameHelp" class="form-text text-muted">What is the teaching assistant's ID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantTotalHours" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">What is the teaching assistant's total hours?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantAssignmentMarking" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Does the TA mark assignments?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantLabInstructor" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Is the TA a lab instructor?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantNbCourses" aria-describedby="lnameHelp" placeholder="0">
                <small id="lnameHelp" class="form-text text-muted">How many courses is the TA involved in?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="TeachingAssistantTutorialSession" aria-describedby="lnameHelp" placeholder="y or n">
                <small id="lnameHelp" class="form-text text-muted">Is the TA involved in tutorial sessions?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_iii__choice_of_attribute_to_update" aria-describedby="lnameHelp" placeholder="Attribute to update for query iii">
                <small id="lnameHelp" class="form-text text-muted">For query iii, which attribute would you like to update?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="query_iii__value_for_chosen_attribute_to_update" aria-describedby="lnameHelp" placeholder="Value for chosen attribute of query iii">
                <small id="lnameHelp" class="form-text text-muted">For query iii, what value would you like the attribute you chose to update to be updated with?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockCampCampID" aria-describedby="lnameHelp" placeholder="Campus ID">
                <small id="lnameHelp" class="form-text text-muted">What is the campus ID (for query v)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockBName" aria-describedby="lnameHelp" placeholder="Block name">
                <small id="lnameHelp" class="form-text text-muted">What is the block name (for query vi)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="DepartmentDName" aria-describedby="lnameHelp" placeholder="Department name">
                <small id="lnameHelp" class="form-text text-muted">What is the department name (for queries vii, ix, xii and xiii)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ProgramPName" aria-describedby="lnameHelp" placeholder="Program name">
                <small id="lnameHelp" class="form-text text-muted">What is the program name (for queries viii and x)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SectionSemester" aria-describedby="lnameHelp" placeholder="Winter, Fall or Summer">
                <small id="lnameHelp" class="form-text text-muted">What is the semester of the section (for queries ix, x, xi, xv, xvi, xix, xx and xxi)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CourseCName" aria-describedby="lnameHelp" placeholder="Course name">
                <small id="lnameHelp" class="form-text text-muted">What is the name of the course (for query xi, xx, xxi and xxii)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CourseCID" aria-describedby="lnameHelp" placeholder="Course ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID of the course (for query xv)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SectionYear" aria-describedby="lnameHelp" placeholder="Section year">
                <small id="lnameHelp" class="form-text text-muted">What is the year of the section (for queries xx and xxi)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="Add1" aria-describedby="lnameHelp" placeholder="Select prereq">
                <small id="lnameHelp" class="form-text text-muted">What is the prerequite class (Add 1)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="Add2" aria-describedby="lnameHelp" placeholder="Select followReq">
                <small id="lnameHelp" class="form-text text-muted">What is the follow up prerequite (Add 2)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
				  Select queries whose output you want to view (after having put in the necessary values above):
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_i__create">
                <label class="form-check-label" for="grad">Query i -- Create</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_i__delete">
                <label class="form-check-label" for="grad">Query i -- Delete</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_i__edit">
                <label class="form-check-label" for="grad">Query i -- Edit</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_i__display">
                <label class="form-check-label" for="grad">Query i -- Display</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ii__create">
                <label class="form-check-label" for="grad">Query ii -- Create</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ii__delete">
                <label class="form-check-label" for="grad">Query ii -- Delete</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ii__edit">
                <label class="form-check-label" for="grad">Query ii -- Edit</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ii__display">
                <label class="form-check-label" for="grad">Query ii -- Display</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iii__create">
                <label class="form-check-label" for="grad">Query iii -- Create</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iii__delete">
                <label class="form-check-label" for="grad">Query iii -- Delete</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iii__edit">
                <label class="form-check-label" for="grad">Query iii -- Edit</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iii__display">
                <label class="form-check-label" for="grad">Query iii -- Display</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iv">
                <label class="form-check-label" for="grad">Query iv</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_v">
                <label class="form-check-label" for="grad">Query v</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_vi">
                <label class="form-check-label" for="grad">Query vi</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_vii">
                <label class="form-check-label" for="grad">Query vii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_viii">
                <label class="form-check-label" for="grad">Query viii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ix">
                <label class="form-check-label" for="grad">Query ix</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_x">
                <label class="form-check-label" for="grad">Query x</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xi">
                <label class="form-check-label" for="grad">Query xi</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xii">
                <label class="form-check-label" for="grad">Query xii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xiii">
                <label class="form-check-label" for="grad">Query xiii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xiv">
                <label class="form-check-label" for="grad">Query xiv</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xv">
                <label class="form-check-label" for="grad">Query xv</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xvi">
                <label class="form-check-label" for="grad">Query xvi</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xvii">
                <label class="form-check-label" for="grad">Query xvii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xviii">
                <label class="form-check-label" for="grad">Query xviii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xix">
                <label class="form-check-label" for="grad">Query xix</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xx">
                <label class="form-check-label" for="grad">Query xx</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xxi">
                <label class="form-check-label" for="grad">Query xxi</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_xxii">
                <label class="form-check-label" for="grad">Query xxii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="add_1">
                <label class="form-check-label" for="grad">Additional Query 1 (PreReq)</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="add_2">
                <label class="form-check-label" for="grad">Additional Query 2 (PreReq-Follow)</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="add_3">
                <label class="form-check-label" for="grad">Additional Query 3 (FD)</label>
              </div>
                <input type="submit" class="btn btn-success" value="Search" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
