<?php $title = 'Home'; ?>
<?php $currentPage = 'index'; ?>
<?php include_once('head.php'); ?>
<?php include_once('navbar.php'); ?>
<?php include_once('sqlConfig.php'); ?>

<!-- Obtain / gather all the instructor's data. -->
<center>
   <br>
      <h3>Want to find something ? Let us know what !</h3>
      <br>
         <form action="result_displaying.php" method="post">
            <div style="display: flex;
                        flex-direction: column;
                        width: 50%;
                        padding: 15px;
                        border: 2px solid #4CAF50;">
              <div class="form-group" style="width: 50%;">
                <input type="text" class="form-control" name="supervisorSSN" aria-describedby="lnameHelp" placeholder="Supervisor SSN">
                <small id="lnameHelp" class="form-text text-muted">What is the supervisor SSN?</small>
              </div>
              <div class="form-group" style="width: 50%;">
				  Select queries whose output you want to view (after having put in the necessary values above):
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_i">
                <label class="form-check-label" for="grad">Query i</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_ii">
                <label class="form-check-label" for="grad">Query ii</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="query_iii">
                <label class="form-check-label" for="grad">Query iii</label>
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
                <label class="form-check-label" for="grad">Additional Query 1</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="add_2">
                <label class="form-check-label" for="grad">Additional Query 2</label>
              </div>
              <div class="form-group" style="width: 50%;">
                <input type="checkbox" class="form-check-input" id="grad" name="add_3">
                <label class="form-check-label" for="grad">Additional Query 3</label>
              </div>
                <input type="submit" class="btn btn-success" value="Search" style="width: 30%;">
              </div>
            </div>
         </form>
</center>

<?php include('footer.php'); ?>
