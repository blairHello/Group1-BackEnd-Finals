<?php

require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else {
    header ("Location: login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="dashboard.css">
</head>
<header>
    <nav style="background-color: white;">
        <div class="logo-container">
            <a href="">
                <img src="gg-logo.png" alt="GabayGinhawa-logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="#">TRACKERS</a></li>
            <li><a href="workouts.html">WORKOUTS</a></li>
            <li><a href="about_us.html">ABOUT US</a></li>
         
        </ul>
        
        <div class="user-controls">
            <div class="user-controls">

            <div class="notification-icon">
                <img src="notif.png" alt="Notification Bell">

            </div>
           
                <div class="profile-container">
                    <div class="profile-hover">
                        <img class="profile-image" src="profile.png" alt="User Profile">
                        <ul class="dropdown-content">
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="menu-icon" onclick="toggleMenu()">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                </nav>
            </header>

</head>
<Br>
<br>
<Br>

<body>
    <h1>Dashboard</h1>
    <h2> Welcome, <?php echo $row ["firstname"]; ?>!</h2>
    Halika na't maging healthy!
    <br>
    
    <div class="card-container">
      <!-- Card 1 -->
      <div class="card">
          <img src="card1.png" alt="Mission">
          <div class="card-body">
             </div>
      </div>
      <!-- Card 2 -->
      <div class="card">
          <img src="card2.png" alt="Vision">
          <div class="card-body">
             
              </div>
      </div>
      <!-- Card 3 -->
      <div class="card">
          <img src="card3.png" alt="Way of Helping">
          <div class="card-body">
             
                       </div>
      </div>
  </div>
</body>
</html>