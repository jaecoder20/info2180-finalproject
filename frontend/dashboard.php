
<div class="dash-top"> 
  <h2>Dashboard</h2>
  <!-- <button class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</button> -->
  <a href="newContacts.php" class="add-button"><img src="../docs/Plus.svg" alt=""> Add Contact</a>
</div>
<div class="content">
  <div class="filters">
      <ul class="list-items">
          <li class="label-f"><img src="../docs/Puzzle.svg" alt=""><strong>Filter By:</strong></li>
          <li class="selected">All</li>
          <li>Sales Leads</li>
          <li>Support</li>
          <li>Assigned to me</li>
      </ul>
  </div>
<?php 
require_once "../database/config.php";
$sql = "SELECT id,title,firstname, lastname, email, company, type FROM Contacts";

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
          $typeClass = ($row['type'] == 'SUPPORT') ? 'support' : 'sales-lead';
            echo "<tr>";
                echo "<td class='name-highlight'>".$row['title'].' ' . $row['firstname'] . " " . $row['lastname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['company'] . "</td>";
                echo "<td><p class='" . $typeClass . "'>" . $row['type'] . "</p></td>";
                // $_SESSION['contact_id'] = $row['id'];
                echo "<td><a class='defer-details' id='" . $row['email'] . "' href='contactDetails.php'>View</a></td>"; //class will be used in javascript to signal when to send ajax request
                //id will be the contacts email to be used as GET param in ajax request
                
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
?>