<?php
require 'config.php';

if(empty($_SESSION["id"])){
    header("Location: logins.php");
}

if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    if($password == $confirmpassword){
        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,25}$/', $password)) {
            $query = "UPDATE tb_user SET firstname = '$firstname', surname = '$surname', birthdate = '$birthdate', email = '$email', password = '$password' WHERE id = '".$_SESSION["id"]."'";
            mysqli_query($conn, $query);
            echo "<script> alert('Profile updated successfully.'); </script>";
        } else {
            echo "<script> alert('Password must be between 6 and 25 characters, include at least one letter and one number.'); </script>";
        }
    } else {
        echo "<script> alert('Password does not match.'); </script>";
    }
}

$user_query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '".$_SESSION["id"]."'");
$user = mysqli_fetch_assoc($user_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head><link rel="icon" href="../assets/GabayGinhawa-logo.png" type="image/png">
<link rel="icon" href="assets/GabayGinhawa-logo.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/registration.css">
    </head>
    <body>
        <h2><b>Edit Profile</b></h2>
        <form action="" method="post" autocomplete="off">
            <label for="firstname">First Name </label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" required><br>

            <label for="surname">Surname </label>
            <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required><br>

            <label for="birthdate">Birthdate </label>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo $user['birthdate']; ?>" required><br>

            <label for="email">Email Address </label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirmpassword">Confirm Password </label>
            <input type="password" id="confirmpassword" name="confirmpassword" required><br>

            <button type="submit" name="submit"><b>Update Profile</b></button>
            <button type="button" onclick="location.href='dashboard.php'">Cancel</button>

        </form>
    </body>
</html>
