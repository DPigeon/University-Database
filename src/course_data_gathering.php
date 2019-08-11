<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Obtain / gather all the course's data. -->
<center>
   <br>
      <h3>New Course ? Load it in !</h3>
      <br>
         <form action="student_storing_gathered_data.php" method="post">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CourseCID" aria-describedby="lnameHelp" placeholder="Course ID">
                <small id="lnameHelp" class="form-text text-muted">What is the (course) ID of the course?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CourseCName" aria-describedby="lnameHelp" placeholder="Course Name">
                <small id="lnameHelp" class="form-text text-muted">What is the (course) name of the course?</small>
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
                <input type="text" class="form-control" name="ContractsTAID" aria-describedby="lnameHelp" placeholder="TA ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID of the TA?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ContractID" aria-describedby="lnameHelp" placeholder="Contract ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID number of your contract?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ClassTimeslotStartTime" aria-describedby="lnameHelp" placeholder="ClassTimeslotStartTime">
                <small id="lnameHelp" class="form-text text-muted">What is the ClassTimeslotStartTime?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ClassTimeslotDayWeek" aria-describedby="lnameHelp" placeholder="ClassTimeslotDayWeek">
                <small id="lnameHelp" class="form-text text-muted">What is the ClassTimeslotDayWeek?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ClassTimeslotSeID" aria-describedby="lnameHelp" placeholder="ClassTimeslotSeID">
                <small id="lnameHelp" class="form-text text-muted">What is the ClassTimeslotSeID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ClassTimeslotEndTime" aria-describedby="lnameHelp" placeholder="ClassTimeslotEndTime">
                <small id="lnameHelp" class="form-text text-muted">What is the ClassTimeslotEndTime?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="ClassTimeslotRoID" aria-describedby="lnameHelp" placeholder="ClassTimeslotRoID">
                <small id="lnameHelp" class="form-text text-muted">What is the ClassTimeslotRoID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="FacilityEquipment" aria-describedby="lnameHelp" placeholder="FacilityEquipment">
                <small id="lnameHelp" class="form-text text-muted">What FacilityEquipment will be used?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SectionSemester" aria-describedby="lnameHelp" placeholder="Winter, Fall or Summer">
                <small id="lnameHelp" class="form-text text-muted">For which semester is the section of the course you want to add?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="SectionYear" aria-describedby="lnameHelp" placeholder="0000">
                <small id="lnameHelp" class="form-text text-muted">For which year is the section of the course you want to add?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockBName" aria-describedby="lnameHelp" placeholder="BlockBName">
                <small id="lnameHelp" class="form-text text-muted">What is the BlockBName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockAddress" aria-describedby="lnameHelp" placeholder="BlockAddress">
                <small id="lnameHelp" class="form-text text-muted">What is the BlockAddress?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockNumFloors" aria-describedby="lnameHelp" placeholder="BlockNumFloors">
                <small id="lnameHelp" class="form-text text-muted">What is the BlockNumFloors?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="BlockNumRooms" aria-describedby="lnameHelp" placeholder="BlockNumRooms">
                <small id="lnameHelp" class="form-text text-muted">What is the BlockNumRooms?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CampusCampID" aria-describedby="lnameHelp" placeholder="CampusCampID">
                <small id="lnameHelp" class="form-text text-muted">What is the CampusCampID?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="CampusName" aria-describedby="lnameHelp" placeholder="CampusName">
                <small id="lnameHelp" class="form-text text-muted">What is the CampusName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="DepartmentDName" aria-describedby="lnameHelp" placeholder="DepartmentDName">
                <small id="lnameHelp" class="form-text text-muted">What is the DepartmentDName?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="WorkIID" aria-describedby="lnameHelp" placeholder="Instructor ID">
                <small id="lnameHelp" class="form-text text-muted">What is the ID of the instructor working in the given department (name)?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="UnderPName" aria-describedby="lnameHelp" placeholder="Program name">
                <small id="lnameHelp" class="form-text text-muted">What is the program name?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="DepartmentChairman" aria-describedby="lnameHelp" placeholder="DepartmentChairman">
                <small id="lnameHelp" class="form-text text-muted">What is the DepartmentChairman?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="PrereqFollowCID1" aria-describedby="lnameHelp" placeholder="PrereqFollowCID1">
                <small id="lnameHelp" class="form-text text-muted">What is the PrereqFollowCID1?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="PrereqFollowCID2" aria-describedby="lnameHelp" placeholder="PrereqFollowCID2">
                <small id="lnameHelp" class="form-text text-muted">What is the PrereqFollowCID2?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="RoomClassNum" aria-describedby="lnameHelp" placeholder="RoomClassNum">
                <small id="lnameHelp" class="form-text text-muted">What is the RoomClassNum?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="RoomCapacity" aria-describedby="lnameHelp" placeholder="RoomCapacity">
                <small id="lnameHelp" class="form-text text-muted">What is the RoomCapacity?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="OfficeRoID" aria-describedby="lnameHelp" placeholder="OfficeRoID">
                <small id="lnameHelp" class="form-text text-muted">What is the room ID of the office?</small>
              </div>
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="roomIsBlockRoom">
                <label class="form-check-label" for="grad">roomIsBlockRoom</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="roomIsClassroom">
                <label class="form-check-label" for="grad">roomIsClassroom</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="roomIsConferenceRoom">
                <label class="form-check-label" for="grad">roomIsConferenceRoom</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="roomIsLabRoom">
                <label class="form-check-label" for="grad">roomIsLabRoom</label>
              </div>
              
              
              
              
              <div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
