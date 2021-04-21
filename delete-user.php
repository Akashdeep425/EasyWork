<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="delete from users where uid='$uid'";
mysqli_query($dbCon,$query);
?>