<?php
include_once("connection.php");
$uid=$_GET["uid"];
$rate=$_GET["rating"];
$rid=$_GET["rid"];

$query="update workers set total=total+'$rate',count=count+'1' where uid='$uid'";
mysqli_query($dbCon,$query);

$queryA="delete from rating where rid='$rid'";
mysqli_query($dbCon,$queryA);
?>