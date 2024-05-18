<!DOCTYPE html>
<html lang="en">
<head><link rel="icon" href="../assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GabayGinhawa | Health Wellness Tracker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href='https://fonts.googleapis.com/css?family=Poor Story' rel='stylesheet'>
    <link rel="stylesheet" href="../css/workout.css"><link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

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

            <img class="header-img" src="../assets/header-img.JPG" alt="Header Image">


            <div class="container header">
                <h1 class="header-text">Endurance Training</h1>
                <h5 style="font-family: 'Poppins', sans-serif; font-style: italic;">Endurance training improves cardiovascular health, stamina, and<br>
                 mental resilience through sustained activities like running, cycling, and swimming.

<br> </h5>
            </div>

            <main>
<br>
<div class="card-container">

  <!-- Card 1 -->
<div class="card">
    <img src="https://img.youtube.com/vi/XLvCjcmSTTk/maxresdefault.jpg" alt="Mission">
    <div class="card-body">
        <p><b>SUPER FUN CARDIO with MOM • 5400 Steps • 128-160 BPM • Walking Workout #51 • Keoni Tamayo
</b><br>
            <i>38:13 minutes </i>
        </p>                
        <a href="https://www.youtube.com/watch?v=XLvCjcmSTTk&pp=ygUPY2FyZGlvIGZpbGlwaW5v" class="btn">TARA!</a>
    </div>
</div>
<!-- Card 2 -->
<div class="card">
    <img src="https://img.youtube.com/vi/E6VOOfG00VY/maxresdefault.jpg" alt="Vision">
    <div class="card-body">
        <b>Lose Weight by Doing this Everyday | 30 min WALKING Workout (Low Impact Cardio)

</b><br>
        <i>31:02 minutes</i>
        </p>                
        <a href="https://www.youtube.com/watch?v=E6VOOfG00VY&pp=ygUPY2FyZGlvIGZpbGlwaW5v" class="btn">TARA!</a>
    </div>
</div>
<!-- Card 3 -->
<div class="card">
    <img src="https://img.youtube.com/vi/riAGh8BSjVg/maxresdefault.jpg" alt="Way of Helping">
    <div class="card-body">
        <b>30 MIN to BURN 300 CAL | Low Impact CARDIO Workout for FAT BURN! 🔥

</b><br>
        <i>31:56 minutes</i></p>
        <a href="https://www.youtube.com/watch?v=riAGh8BSjVg&pp=ygUPY2FyZGlvIGZpbGlwaW5v" class="btn">TARA!</a>
    </div>
</div>
</div>

                </div>
                

            </main>
            
            









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
                    <center><p3><i>© 2024 GabayGinhawa, Inc.</i></p></center>
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
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <body>