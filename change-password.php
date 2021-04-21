<?php
include_once("connection.php");
$pwd=$_GET["pwd"];
$uid=$_GET["uid"];
$query="update users set pwd='$pwd' where uid='$uid'";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "Password Updated";
}
else
	echo $msg;
?>