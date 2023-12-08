


<div class="dash-top">

  <h2>Dashboard</h2>
  <!-- <button class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</button> -->
  <a href="newContacts.php" class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</a>
</div>
<div class="content">
  <div class="filters">
      <ul class="list-items">
          <li class="label-f"><img src="../docs/Puzzle.svg" alt=""><strong>Filter By:</strong></li>
          <li class="selected">All</a></li>
          <li><a href="#" id ="2">Sales Lead</a></li>
          <li><a href="#" id="3">Support</a></li>
          <li><a href="#" id="4">Assigned to me</li>
      </ul>  
    </div>
    <?php
  require_once "../database/config.php";

   $filterId = strip_tags($_GET['link']);
  if(isset($_GET['link'])){
    if($filterId == 1){
      $sql = "SELECT firstname, lastname, email, company, type FROM Contacts";

      echo '<table cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';

        if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['company'] . "</td>";
                      echo "<td>" . $row['type'] . "</td>";
                      echo "<td><a href='contactDetails.php'>View</a></td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
          } else{
              echo "<tr><td colspan='4'>No contacts found.</td></tr>";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      echo '</tbody></table>';

    }
    if ($filterId == 2){
      $sql = "SELECT firstname, lastname, email, company, type FROM Contacts WHERE type='Sales Lead'";

      echo '<table cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';

      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['company'] . "</td>";
                      echo "<td>" . $row['type'] . "</td>";
                      echo "<td><a href='contactDetails.php'>View</a></td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
          } else{
              echo "<tr><td colspan='4'>No contacts found.</td></tr>";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      echo '</tbody></table>';
    }
    if ($filterId == 3){
      $sql = "SELECT firstname, lastname, email, company, type FROM Contacts WHERE type ='Support'";

      echo '<table cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';

      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['company'] . "</td>";
                      echo "<td>" . $row['type'] . "</td>";
                      echo "<td><a href='contactDetails.php'>View</a></td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
          } else{
              echo "<tr><td colspan='4'>No contacts found.</td></tr>";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      echo '</tbody></table>';
    }

    if ($filterId == 4){
      $id = $_SESSION["id"];
      $sql = "SELECT firstname, lastname, email, company, type FROM Contacts WHERE  assigned_to = '%$id%'";

      echo '<table cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Company</th>
                  <th>Type</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';

      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['company'] . "</td>";
                      echo "<td>" . $row['type'] . "</td>";
                      echo "<td><a href='contactDetails.php'>View</a></td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
          } else{
              echo "<tr><td colspan='4'>No contacts found.</td></tr>";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }

      echo '</tbody></table>';
    }
  }
  ?>

  </div>