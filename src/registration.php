<?php

require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Email address has already been taken.'); </script>";

    }
    else {
        if($password == $confirmpassword){
            // Check if the password meets the requirements
            if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,25}$/', $password)) {
                $query = "INSERT INTO tb_user (firstname, surname, birthdate, email, password) VALUES('$firstname', '$surname', '$birthdate', '$email', '$password')";
                mysqli_query($conn, $query);
                echo "<script> alert('Registration successful.'); </script>";
            } else {
                echo "<script> alert('Password must be between 6 and 25 characters, include at least one letter and one number.'); </script>";
            }
        }
        else {
            echo "<script> alert('Password does not match.'); </script>";
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="registration.css">
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
    </head>
    <body>
<div class="signup-card">
        <br>
        <h2><b>Get Started</b></h2>
        <form class="" action="" method="post" autocomplete="off">
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
        <a href="privacy_policy2.html">Privacy Policy</a>
        and the
        <a href="terms_of_use2.html">Terms of Use</a>
    </label>



           <button type="submit" name="submit"><b>Create Account</b></button>
           <br>
           
           <div class="account-action">
    Already have an account?&nbsp;<a href="login.php">Sign in.</a>
</div>

    </div>

</form>
<br>
</body>
</html>

