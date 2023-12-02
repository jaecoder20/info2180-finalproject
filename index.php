<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/check_session.js"></script> 
</head>
    <body>
    <header class="header">
      <div>
        <img src="docs/Dolphin Emulator.svg" alt="">
        <h1>Dolphin CRM</h1>
      </div>
      <div>
        <img src="docs/profile-1336-svgrepo-com.svg" alt="">
        <p id="user-name">Rojae Wedderburn</p>
      </div>
    </header>
    <main class="main-content">
        <nav class="navigation">
            <ul class="list-items">
                <li><img src="docs/Home.svg" alt=""><a href="">Home</a></li>
                <li><img src="docs/new-svgrepo-com.svg" alt=""><a href="">New Contact</a></li>
                <li><img src="docs/MySpace.svg" alt=""><a href="">Users</a></li>
                <hr>
                <li><img src="docs/logout-svgrepo-com.svg" alt=""><a href="../backend/logout.php">Logout</a></li>
            </ul>
        </nav>
        <section class="dashboard">
            <?php include "pages/dashboard.php" ?>
        </section>
    </main>
    </body>
    <script>
        // Make an AJAX call to check the PHP session
        fetch('../check_session.php')
            .then(response => response.json())
            .then(data => {
                if (!data.loggedin) {
                    // If the user is not logged in, redirect to the login page
                    window.location.href = '../login.php';
                } else {
                    // If logged in, you can display the dashboard content
                    document.getElementById('dashboard-content').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error checking session:', error);
            });
    </script>
</html>