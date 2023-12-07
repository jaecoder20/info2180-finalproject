<div class="dash-top"> 
  <h2>New Contact</h2>
</div>
<div class="content">
  <form action="#" method="post">
  <div class="input-containers">
      <label class="input-labels" for="title">Title</label>
      <select name="roles" name="title" required>
        <option value="mr">Mr.</option>
        <option value="ms">Ms.</option>
        <option value="mrs">Mrs.</option>
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="fname">First Name</label>
      <input type="text" placeholder="Jane" name="fname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="lname">Last Name</label>
      <input type="text" placeholder="Doe" name="lname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="email">Email</label>
      <input type="email" placeholder="dummyemail@example.com" name="email" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="telNum">Telephone</label>
      <input type="tel" name="telNum" placeholder="e.g. 876-999-1234" required pattern="^\d{3}-\d{3}-\d{4}$" title="876-999-1234">
    </div>
    <div class="input-containers">
      <label class="input-labels" for="company">Company</label>
      <input type="text" placeholder="" name="company" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="type">Type</label>
      <select name="roles" name="type" required>
        <option value="salesLead">Sales Lead</option>
        <option value="support">Support</option>
      </select>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Assigned To</label>
      <!--@Mikes - same scenario as getting out contacts from the database using a for loop and listing them. -->
      <select name="roles" name="role" required>
        <?php 
        require_once '../database/config.php';
        if ($result = mysqli_query($link, "SELECT * FROM Users")){
          if (mysqli_num_rows($result) > 0){
            while ($user = mysqli_fetch_array($result)){
              echo "<option value ='".$user['role']."'>".$user['firstname'] ." ".$user['lastname']."</option>";
         
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


 <!--require_once '../database/config.php';
 if (isset($_POST['submit'])) {
   // Sanitize user input
   $title = strip_tags($_POST['title']);
   $fname = strip_tags($_POST['fname']);
   $lname = strip_tags($_POST['lname']);
   $email = strip_tags($_POST['email']);
   $telNum = strip_tags($_POST['telNum']);
   $company =strip_tags($_POST['company']);
   $type = strip_tags($_POST['type']);
   $assigned = strip_tags($_POST['role']);

   // Check if telephone number matches the regex
   function isaTelNum($telNum) {
     $pattern = '^\d{3}-\d{3}-\d{4}$';
     return preg_match($pattern, $telNum);
   }

    // Check if for assignment in user table
    $user_check_query = $link->prepare("SELECT * FROM users WHERE role = ?");
    $user_check_query->bind_param("s", $assigned);
    $user_check_query->execute();
    $result = $user_check_query->get_result();
    $user_check_query->close();

    if (!isaTelNum($telNum)) {
     echo "Telephone number does not meet the required criteria.";
     return;
    }

    foreach($result as $row){
      if($row['role'] === $assigned && $row['']){
        $assign_by = $row['id'];
      }
    }


   // Prepare an insert statement
   $stmt = $link->prepare("INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to) VALUES (?, ?, ?, ?, ?,?, ?, ?)");
   $stmt->bind_param("sssss", $title,$fname, $lname, $email, $telNum, $company, $type, $assigned);

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
$link->close();





?>-->