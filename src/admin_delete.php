<?php
include "config.php";

if ( isset($_GET["id"]) ) {
$id = $_GET["id"];


$sql = "DELETE FROM tb_admin WHERE id=$id";
$connection->query ($sql);
}
header("location:admin.php");
exit;
?>