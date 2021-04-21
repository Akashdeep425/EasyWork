<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="update users set status='0' where uid='$uid'";
mysqli_query($dbCon,$query);
?>