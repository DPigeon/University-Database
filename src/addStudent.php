<?php
	//include('data_gathering.php');
?>


<center>
   <br>
      <h3>New Student ? Hop in !</h3>
      <br>
         <form action="register.php" method="post">
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
                <input type="checkbox" class="form-check-input" id="grad" name="graduateOrNot">
                <label class="form-check-label" for="grad">Graduate</label>
              </div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>
