<?php
include_once("connection.php");
$uid=$_GET["uid"];
$category=$_GET["category"];
$query="delete from requirements where citizenuid='$uid' and category='$category'";
mysqli_query($dbCon,$query);

?>
