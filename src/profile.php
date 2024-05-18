<?php
require 'config.php';

if(empty($_SESSION["id"])){
    header("Location: logins.php");
}

$user_query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '".$_SESSION["id"]."'");
$user = mysqli_fetch_assoc($user_query);
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
    <link rel="stylesheet" href="../css/profiles.css">
</head>
<style>.sideBar {
  width: 260px;
  background-color: #023047;
}
.saveButton {
  margin-right: 5px;
  background-color: #FFB703;
  font-size: 14px;
  color: #fff;
  letter-spacing: 0.5px;
  font-weight: 300;
}
</style>
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
    <body>
    <br>
    <Br>
    <Br>   
    <body>

    <br>
    <body>
    <body style="color: #023047;">
    <div class="mainContainer">
        <div class="sideBar" style="color: #023047;">
            <ul class="menuList">
                <li class="menuItem"><img class="menuIcon" src="http://res.cloudinary.com/dikpupfzu/image/upload/v1525474712/Profile_2x.png" alt=""><span class="profileLabel" style="color: white;">Profile Settings</span></li>
            </ul>
        </div>
        <div class="contentArea" style="color: #023047;">
            <h2 class="heading" style="color: #023047;"></h2>
            <br>
            <br>  <br>
            <br>
            <div class="formContainer" style="color: #023047;">
                <form action="index.html" method="post">
                    <div class="formField">
                        <label class="formLabel" for="firstname" style="color: #023047;">First Name</label>
                        <input class="inputField" type="text" name="firstname" value="<?php echo $user['firstname']; ?>" />
                    </div>
                    <div class="formField">
                        <label class="formLabel" for="surname" style="color: #023047;">Surname</label>
                        <input class="inputField" type="text" name="surname" value="<?php echo $user['surname']; ?>" />
                    </div>
                    <div class="formField">
                        <label class="formLabel" for="email" style="color: #023047;">Email</label>
                        <input class="inputField" type="text" name="email" value="<?php echo $user['email']; ?>" />
                    </div>
                    <div class="formField">
                        <label class="formLabel" for="newPassword" style="color: #023047;">New Password</label>
                        <input class="inputField" type="password" name="newPassword" required />
                    </div>
                </form>
            </div>
            <div class="buttonContainer" style="color: #023047;">
                <a href="#"><button class="actionButton saveButton" type="submit" name="button" style="color: #023047;">Save Changes</button></a>
                <a href="#"><button class="actionButton cancelButton" type="cancel" name="button" style="color: #023047;">Cancel</button></a>
            </div>
        </div>
    </div>
</body>



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

</html>