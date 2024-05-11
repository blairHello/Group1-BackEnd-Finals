<?php
include("calorie.connection.php");

$deleteID = $_GET['deleteID'];
$sql = "DELETE FROM tblcalorie WHERE mealid = $deleteID";
$stmt = $conn->prepare($sql);

$stmt->execute();
header("location: calorie.read.php");
