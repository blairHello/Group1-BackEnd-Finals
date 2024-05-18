<?php
ob_start(); // Start output buffering
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display all PHP errors

require 'config.php';

if (!empty($_SESSION["id"])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $agreement = isset($_POST["agreement"]) ? $_POST["agreement"] : false;

    if (!$agreement) {
        echo "<script>alert('You must agree to the privacy policy and terms of use.');</script>";
    } else {
        $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script>alert('Email address has already been taken.');</script>";
        } else {
            if ($password === $confirmpassword) {
                if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,25}$/', $password)) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
                    $stmt = $conn->prepare("INSERT INTO tb_user (firstname, surname, birthdate, email, password) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $firstname, $surname, $birthdate, $email, $hashedPassword);
                    if ($stmt->execute()) {
                        $_SESSION['id'] = $stmt->insert_id; // Set the session ID
                        echo "<script>alert('Registration successful. Redirecting to dashboard.');</script>";
                        header("Location: dashboard.php"); // Redirect to dashboard.php
                        exit;
                    } else {
                        echo "<script>alert('Registration failed. Please try again.');</script>";
                    }
                } else {
                    echo "<script>alert('Password must be between 6 and 25 characters, include at least one letter and one number.');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
<link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">
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

    <link rel="stylesheet" href="../css/registrations.css">
    <style>
        body {
            background-image: url('../assets/registration_bg.png');
        }
        
nav {
            background-color: white;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    <head><link rel="icon" href="../assets/gabayginhawa-logo.png" type="image/png">


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
  
        <h2><b>Get Started</b></h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="firstname">First Name </label>
    <input type="text" id="firstname" name="firstname" required><br>

    <label for="surname">Surname </label>
    <input type="text" id="surname" name="surname" required><br>

    <label for="birthdate">Birthdate </label>
    <input type="date" id="birthdate" name="birthdate" required><br>

   
    <label for="email">Email Address </label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password</label>
    <div class="input-group">
        <input type="password" id="password" name="password" class="form-control" required>
        <div class="input-group-append">
            <button id="togglePassword" class="btn btn-outline-secondary" type="button" style="outline: none; box-shadow: none;">
                <i id="eyeIcon" class="fas fa-eye"></i>
            </button>
        </div>
    </div>

    <label for="confirmpassword">Confirm Password </label>
    <input type="password" id="confirmpassword" name="confirmpassword" required><br>

    <label for="agreement">
        <input type="checkbox" name="agreement" id="agreement">
        I agree to the
        <a href="privacy_policy2.php">Privacy Policy</a>
        and the
        <a href="terms_of_use2.php">Terms of Use</a>
    </label>
    


           <button type="submit" name="submit"><b>Create Account</b></button>
           <br>
           
           <div class="account-action">
    Already have an account? <a href="logins.php">Sign in.</a>
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
