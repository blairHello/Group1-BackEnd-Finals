<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page
    header("Location: logins.php");
    exit;
}

$user_id = $_SESSION['id'];

if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "registration_login_db";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // DELETE WATER ENTRY IN DATABASE
    $sql = "DELETE FROM tb_water_tracker WHERE id=$id AND user_id=$user_id";
    $connection->query ($sql);
}
header("location:water.php");
exit;
?>
