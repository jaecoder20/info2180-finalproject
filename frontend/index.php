<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="favicon" href="../docs/Dolphin Emulator.svg">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link id="variable-stylesheet" rel="stylesheet" href="../styles/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolphin CRM</title>
    <script src="../scripts/app.js"></script>
    <script src="../scripts/check_session.js"></script> 
    <script type="text/javascript" src="../scripts/getContact.js"></script>
</head>
    <body>
    <header class="header">
      <div>
        <img src="../docs/Dolphin Emulator.svg" alt="Image of a blue dolphin">
        <h1>Dolphin CRM</h1>
      </div>
      <div>
        <img src="../docs/profile-1336-svgrepo-com.svg" alt="">
        <!-- <p id="user-name">Rojae Wedderburn</p> -->
        <?php 
          session_start();
          require_once '../database/config.php';
          $id = $_SESSION["id"];
          $sql = "SELECT firstname, lastname FROM Users WHERE id = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_array($result);
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                echo "<p id='user-name'>" . htmlspecialchars($firstname) . " " . htmlspecialchars($lastname) . "</p>";
            }
        ?>
        
      </div>
    </header>
    <main class="main-content">
        <nav class="navigation">
            <ul class="list-items">
                <li><img src="../docs/Home.svg" alt=""><a href="dashboard.php" onclick="filterContacts('all')">Home</a></li>
                <li><img src="../docs/new-svgrepo-com.svg" alt=""><a href="newContacts.php">New Contact</a></li>
                <?php
                  require_once '../database/config.php';
                  $id = $_SESSION["id"];
                  $sql = "SELECT role FROM Users WHERE id = $id";
                  $result = mysqli_query($link, $sql);
                  if (mysqli_num_rows($result)) {
                    $row = mysqli_fetch_array($result);
                    if ($row['role'] == 'Member'){
                      echo "<li style='display:none'><img src='../docs/MySpace.svg' alt=''><a href='usersDisplay.php'>Users</a></li>";
                    }elseif ($row['role'] == 'Administrator'){
                      echo "<li><img src='../docs/MySpace.svg' alt=''><a href='usersDisplay.php'>Users</a></li>";
                    }
                  }
                ?>
                <!--<li><img src="../docs/MySpace.svg" alt=""><a href="usersDisplay.php">Users</a></li>-->
                <hr>
                <li><img src="../docs/logout-svgrepo-com.svg" alt=""><a href="http://localhost/info2180-finalproject/auth/logout.php" onclick="logout()">Logout</a></li>
            </ul>
        </nav>
        <section class="dashboard">
            <?php include "dashboard.php" ?>
        </section>
    </main>
    </body>
</html>