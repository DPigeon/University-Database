<html>
   <head>
      <title>COMP353 Project</title>
   </head>
   <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/students.php">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/courses.php">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/instructors.php">Instructors</a>
      </li>
    </ul>
  </div>
</nav>

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
   </body>
</html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>