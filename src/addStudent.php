<center>
   <br>
      <h3>New Student ? Hop in !</h3>
      <br>
         <form action="/register.php">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="name" class="form-control" id="studentName" aria-describedby="nameHelp" placeholder="First Name">
                <small id="nameHelp" class="form-text text-muted">What is your first name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="lname" class="form-control" id="lname" aria-describedby="lnameHelp" placeholder="Last Name">
                <small id="lnameHelp" class="form-text text-muted">What is your last name ?</small>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad">
                <label class="form-check-label" for="grad">Graduate</label>
              </div>
                <input type="submit" class="btn btn-success" value="Register" style="width: 30%;">
              </div>
            </div>
         </form>
</center>