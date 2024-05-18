<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email exists in the tb_user table
    $userResult = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $userRow = mysqli_fetch_assoc($userResult);

    // Check if the email exists in the tb_admin table
    $adminResult = mysqli_query($conn, "SELECT * FROM tb_admin WHERE email = '$email'");
    $adminRow = mysqli_fetch_assoc($adminResult);

    if (mysqli_num_rows($userResult) > 0) {
        if ($password == $userRow["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $userRow["id"];

            // Redirect to dashboard.php for non-admin users
            header("Location: dashboard.php");
            exit; // Terminate script execution
        } else {
            echo "<script> alert ('Incorrect password.'); </script>";
        }
    } elseif (mysqli_num_rows($adminResult) > 0) {
        if ($password == $adminRow["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $adminRow["id"];

            // Redirect to admin.php
            header("Location: admin.php");
            exit; // Terminate script execution
        } else {
            echo "<script> alert ('Incorrect password.'); </script>";
        }
    } else {
        echo "<script> alert ('Email not registered.'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GabayGinhawa | Health Wellness Tracker - Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/login_page.css">
    <style>
        body {
            body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('../assets/login_bg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Add this line */
    height: 100vh;
}     


nav {
            background-color: white;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

}
    </style>
  </style>
        <script type="text/javascript">
       document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        // Prevent the button from submitting the form
        e.preventDefault();
        
        var password = document.getElementById('password');
        var eyeIcon = document.getElementById('eyeIcon');
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
});


    </script>
    <head>

    <body>
        
    <nav style="background-color: white;">
      <div class="logo-container">
          <a href="index.php">
              <img src="../assets/gg-logo.png" alt="GabayGinhawa-logo">
          </a>
      </div>
      <ul class="nav-links">
          <li><a href="about_us2.php">ABOUT US</a></li>
       
      </ul>
      
      <div class="user-controls">
          <div class="user-controls">

       
          </div>
         
              <div class="profile-container">
                  <div class="profile-hover">
                      <img class="profile-image" src="../assets/profile.png" alt="User Profile">
                      <ul class="dropdown-content">
                      
                          <li><a href="registration.php">Create Account</a></li>

                          <li><a href="logins.php">Login</a></li>
                      </ul>
                  </div>
                  <div class="menu-icon" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
              </nav>

<div class="signup-card">
        <br>
        <br>
  
        <h2>Login</h2>
<form class="" action = "" method = "post" autocomplete ="off">
    <label for="email">Email</label>
    <input type="email" name="email" required value=""><br>

    <label for="password">Password</label>
    <div class="input-group">
        <input type="password" id="password" name="password" class="form-control" required>
        <div class="input-group-append">
            <button id="togglePassword" class="btn btn-outline-secondary" type="button" style="outline: none; box-shadow: none;">
                <i id="eyeIcon" class="fas fa-eye"></i>
            </button>
        </div>
    </div>

    
            <button type="submit" name="submit"><b>Login</b></button>
<br>
            <div class="account-action">
    Don't have an account?&nbsp;<a href="registration.php"> Sign up.</a>
    <Br>
</div>

    </div>

</form>
<br>

<footer class="footer">
  <div class="top-part">
      <img src="../assets/logo-white.png" alt="Logo" class="logo">
      <div class="links">
          <a href="about_us2.php">About Us</a>
      </div>
  </div>

  <div class="second-top-part">
      <div class="links">
          <center><a href="privacy_policy2.php">Privacy Policy</a>
          <a href="terms_of_use2.php">Terms of Use</a></center>

      </div>
  </div>
  <div class="bottom-part"><br>
      <center><p><i>© 2024 GabayGinhawa, Inc.</i></p></center>
  </div>
</footer>
</body>
</html>