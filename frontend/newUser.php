<?php 
  require_once '../database/config.php';
  if (isset($_POST['submit'])) {
    // Sanitize user input
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $role = mysqli_real_escape_string($link, $_POST['role']);

     // Check if user already exists
     $user_check_query = $link->prepare("SELECT * FROM Users WHERE email = ?");
     $user_check_query->bind_param("s", $email);
     $user_check_query->execute();
     $result = $user_check_query->get_result();
     $user_check_query->close();
 
     if ($result->num_rows > 0) {
         echo "User already exists with this email.";
     } else {
         // Hash the password
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     }

    // Prepare an insert statement
    $stmt = $link->prepare("INSERT INTO Users (firstname, lastname, password, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fname, $lname, $hashed_password, $email, $role);

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

?>
<div class="dash-top"> 
  <h2>New User</h2>
</div>
<div class="content">
  <form action="#" method="post">
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
      <label class="input-labels" for="password">Password</label>
      <input type="password" name="password" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Role</label>
      <select name="role" required>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
    </div>
    <input type="submit" name="submit" class="form-submit" value="Save">
  </form>
</div>