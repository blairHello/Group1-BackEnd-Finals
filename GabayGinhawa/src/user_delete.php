<?php
if ( isset($_GET["id"]) ) {
$id = $_GET["id"];

include "config.php";


$sql = "DELETE FROM tb_user WHERE id=$id";
$connection->query ($sql);
}
header("location:user.php");
exit;
?>