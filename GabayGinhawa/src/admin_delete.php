<?php
if ( isset($_GET["id"]) ) {
$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "registration_login_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);


$sql = "DELETE FROM tb_admin WHERE id=$id";
$connection->query ($sql);
}
header("location:admin.php");
exit;
?>