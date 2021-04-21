<?php
include_once("connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$mobile=$_GET["mobile"];
$category=$_GET["category"];
$status=1;

$query="insert into users values('$uid','$pwd','$mobile','$category',CURDATE(),'$status')";

mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "Signup Successful";
}
else
	echo $msg;

?>