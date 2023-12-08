<?php
  session_start();  
  require_once '../database/config.php';
 if (isset($_POST['submit'])) {
   // Sanitize user input
   $title = strip_tags($_POST['title']);
   $fname = strip_tags($_POST['fname']);
   $lname = strip_tags($_POST['lname']);
   $email = strip_tags($_POST['email']);
   $telNum = strip_tags($_POST['telNum']);
   $company =strip_tags($_POST['company']);
   $type = strip_tags($_POST['type']);
   $assigned = (int)strip_tags($_POST['role']);


   date_default_timezone_set("America/New_York");
 



   // Prepare an insert statement
   $stmt = $link->prepare("INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("ssssissiiss", $title,$fname, $lname, $email, $telNum, $company, $type, $assigned, $_SESSION['id'],date("Y-m-d h:i:sa"), date("Y-m-d h:i:sa"));

   // Attempt to execute the prepared statement
   if ($stmt->execute()) {
       echo "New user created successfully";
   } else {
       echo "Error: " . $stmt->error;
   }

   // Close statement
   $stmt->close();
 }
 // Close connection


?>


<div class="dash-top"> 
  <h2>New Contact</h2>
</div>
<div class="content">
  <form action="#" method="post">
  <div class="input-containers">
      <label class="input-labels" for="title">Title</label>
      <select name="title" name="title" required>
        <option value="Mr">Mr.</option>
        <option value="ms">Ms.</option>
        <option value="Mrs">Mrs.</option>
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="fname">First Name</label>
      <input id="fname" type="text" placeholder="Jane" name="fname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="lname">Last Name</label>
      <input id="lname" type="text" placeholder="Doe" name="lname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="email">Email</label>
      <input id="email" type="email" placeholder="dummyemail@example.com" name="email" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="telNum">Telephone</label>
      <input id="telNum" type="tel" name="telNum" placeholder="e.g. 876-999-1234" required pattern="^\d{3}-\d{3}-\d{4}$" title="876-999-1234">
    </div>
    <div class="input-containers">
      <label class="input-labels" for="company">Company</label>
      <input id="company" type="text" placeholder="" name="company" required>
    </div>
    <div class="input-containers">
<<<<<<< HEAD
<<<<<<< HEAD
      <label class="input-labels" for="type">Type</label>
      <select name="roles" name="type" required>
=======
      <label class="input-labels" for="roles">Type</label>
      <select id="roles" name="roles" required>
>>>>>>> a299527fac9ab144e37ddb5c295fc4a098395d79
        <option value="salesLead">Sales Lead</option>
        <option value="support">Support</option>
=======

      <label class="input-labels" for="type">Type</label>
      <select name="type" name="type" required>
        <option value="SALES LEAD">Sales Lead</option>
        <option value="SUPPORT">Support</option>

>>>>>>> ce44972ba4a038cb9f5b61d2aaaf3965f5452bdb
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Assigned To</label>
     
      <select name="role" name="role" required>
        <option value="Select">Select Option</option>
        <?php 
        if ($result = mysqli_query($link, "SELECT * FROM Users")){
          if (mysqli_num_rows($result) > 0){
            while ($user = mysqli_fetch_array($result)){
              echo "<option value ='".$user['id']."'>".$user['firstname'] ." ".$user['lastname']."</option>";
         
            }
            mysqli_free_result($result);
          }else{
            echo "<option value =''>NO USERS</option>";
          }          
        }else{
          echo "ERROR: Could not able to execute quert. " . mysqli_error($link);
        }
      ?>
      </select>
    </div>
    <input type="submit" name="submit" class="form-submit" value="Save">
  </form>
</div>



 