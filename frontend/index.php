<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link id="variable-stylesheet" rel="stylesheet" href="../styles/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../scripts/app.js"></script>
    <!-- <script src="../scripts/app.js"></script> -->
    <script src="../scripts/check_session.js"></script> 
</head>
    <body>
    <header class="header">
      <div>
        <img src="../docs/Dolphin Emulator.svg" alt="">
        <h1>Dolphin CRM</h1>
      </div>
      <div>
        <img src="../docs/profile-1336-svgrepo-com.svg" alt="">
        <p id="user-name">Rojae Wedderburn</p>
      </div>
    </header>
    <main class="main-content">
        <nav class="navigation">
            <ul class="list-items">
                <li><img src="../docs/Home.svg" alt=""><a href="dashboard.php">Home</a></li>
                <li><img src="../docs/new-svgrepo-com.svg" alt=""><a href="newContacts.php">New Contact</a></li>
                <li><img src="../docs/MySpace.svg" alt=""><a href="usersDisplay.php">Users</a></li>
                <hr>
                <li><button onclick="logout()">Logout</button></li>
                <!-- <li><img src="../docs/logout-svgrepo-com.svg" alt=""><a href="http://localhost/info2180-finalproject/auth/logout.php" onclick="reloadToLogin()">Logout</a></li> -->
            </ul>
        </nav>
        <section class="dashboard">
            <?php include "dashboard.php" ?>
        </section>
    </main>
    </body>
    <!-- <script>
      function logout() {
        $.ajax({
          url: "http://localhost/info2180-finalproject/auth/logout.php",
          type: "POST",
          success: function(data) {
            window.location.href = "http://localhost/info2180-finalproject/auth/login.php";
          }
        });
      }
    </script> -->
</html>