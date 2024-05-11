<?php


require 'config.php';
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
    
        }
        else {
            echo
            "<script> alert ('Incorrect password.'); </script>";
        }
    }

    else {
        echo
        "<script> alert ('Email not registered.'); </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="logins.css">
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

<div class="login-card">
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
</form>
</div>
</body>
</html>
