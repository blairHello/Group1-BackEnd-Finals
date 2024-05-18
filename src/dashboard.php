<?php

require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else {
    header ("Location: logins.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<header>
    <nav style="background-color: white;">
        <div class="logo-container">
            <a href="dashboard.php">
                <img src="../assets/gg-logo.png" alt="GabayGinhawa-logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="workouts.php">WORKOUTS</a></li>
            <li><a href="about_us.php">ABOUT US</a></li>
         
        </ul>
        
        <div class="user-controls">
            <div class="user-controls">

         
            </div>
           
                <div class="profile-container">
                    <div class="profile-hover">
                        <img class="profile-image" src="../assets/profile.png" alt="User Profile">
                        <ul class="dropdown-content">
                        
                            <li><a href="profile.php">Profile</a></li>

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
<Br>
<br>
<body>
<h1><b>Dashboard</b></h1>
<h4>Welcome, <?php echo $row ["firstname"]; ?>!</h4>

    <br>
<div class="container">
  <div class="row">
    

    <div class="mb-30 col-md-6 col-lg-4">
      <div class="card">
      <img class="card-icon" src="../assets/sleep.png" alt="sleep" >
      <h3 class="card-title">Sleep</h3>
      <p class="card-text">Input detailed insights about your sleep duration and sleep quality. <i>Pahimbingin pa lalo ang tulog!</i></p>
      <a href="../src/sleep.php" class="arrow-icon float-right">
          <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="mb-30 col-md-6 col-lg-4">
      <div class="card">
      <img class="card-icon" src="../assets/water.png" alt="water" >
      <h3 class="card-title">Water Intake</h3>
      <p class="card-text"><i>Gawaing mas fresh at energetic ang mga araw-araw!</i> Log and monitor your daily water intake.</p>
      <a href="../src/water.php" class="arrow-icon float-right">
          <i class="fas fa-arrow-right"></i></a>      </div>
    </div>

    <div class="mb-30 col-md-6 col-lg-4">
      <div class="card">
      <img class="card-icon" src="../assets/caloric.png" alt="caloric" >
      <h3 class="card-title">Calorie Intake</h3>
      <p class="card-text"><i>I-alay ang atensyon sa iyong kinakain!</i> Keep track and be informed of what you eat daily to a healthier life.</p>
      <a href="../src/calorie.php" class="arrow-icon float-right">
          <i class="fas fa-arrow-right"></i></a>      </div>
    </div>


    <div class="mb-30 col-md-6 col-lg-4">
      <div class="card">
      <img class="card-icon" src="../assets/activity.png" alt="activity" >
      <h3 class="card-title">Activity</h3>
      <p class="card-text"><i>Galaw-galaw!</i> Log your physical activity to monitor your exercise routine and track progress towards your fitness goals.</p>
      <a href="../src/activity.php" class="arrow-icon float-right">
          <i class="fas fa-arrow-right"></i></a>      </div>
    </div>


    <div class="mb-30 col-md-6 col-lg-4">
      <div class="card">
      <img class="card-icon" src="../assets/mood.png" alt="mood" >
      <h3 class="card-title">Mood</h3>
      <p class="card-text"><i>Kumusta ka,  <?php echo $row ["firstname"]; ?>?</i> Keep track of your mood to cultivate a brighter outlook and better stress management.</p>
      <a href="../src/mood.php" class="arrow-icon float-right">
          <i class="fas fa-arrow-right"></i></a>      </div>
    </div>
  </div>

  </div>
</div>




<br>
<Br>

<!--Footer--> 

<footer class="footer">
    <div class="top-part">
        <img src="../assets/logo-white.png" alt="Logo" class="logo">
        <div class="links">
            <a href="dashboard.php">Dashboard</a>
            <a href="workouts.php">Workouts</a>
            <a href="about_us.php">About Us</a>
        </div>
    </div>

    <div class="second-top-part">
        <div class="links">
            <center><a href="privacy_policy.php">Privacy Policy</a>
            <a href="terms_of_use.php">Terms of Use</a></center>

        </div>
    </div>
    <div class="bottom-part"><br>
        <center><p><i>© 2024 GabayGinhawa, Inc.</i></p></center>
    </div>
</footer>

    <script>
function toggleMenu() {
var navLinks = document.querySelector('.nav-links');
navLinks.classList.toggle('show');
}

// Add an event listener to close the menu when a link is clicked
document.querySelectorAll('.nav-links a').forEach(function(link) {
link.addEventListener('click', function() {
var navLinks = document.querySelector('.nav-links');
navLinks.classList.remove('show');
});
});
    document.addEventListener('DOMContentLoaded', function() {
        // Get the profile hover element
        var profileHover = document.querySelector('.profile-hover');
    
        // Add a click event listener to toggle the 'clicked' class
        profileHover.addEventListener('click', function(event) {
            this.classList.toggle('clicked');
            event.stopPropagation(); // Prevent the click event from reaching the document
        });
    
        // Add a click event listener to the document to close the dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var dropdownContent = document.querySelector('.profile-hover .dropdown-content');
            var isClickedInsideDropdown = profileHover.contains(event.target) || dropdownContent.contains(event.target);
    
            if (!isClickedInsideDropdown) {
                profileHover.classList.remove('clicked');
            }
        });
    });
      </script>

<body>