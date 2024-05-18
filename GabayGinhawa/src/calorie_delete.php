<?php
include "config.php";

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

    // DELETE CALORIE ENTRY IN DATABASE
    $sql = "DELETE FROM tb_calorie_tracker WHERE id=$id AND user_id=$user_id";
    $connection->query ($sql);
}
header("location:calorie.php");
exit;
?>
