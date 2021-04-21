<?php
include_once("connection.php");
$uid=$_GET["uid"];
$problem=$_GET["problem"];
$category=$_GET["category"];
$address=$_GET["address"];
$city=$_GET["city"];

$query="insert into requirements (citizenuid,category,problem,address,city,dop) values ('$uid','$category','$problem','$address','$city',CURDATE())";

mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "Posted Successful";
}
else
	echo $msg;

?>