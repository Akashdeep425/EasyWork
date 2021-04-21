<?php
include_once("connection.php");
$worker_uid=$_GET["worker"];
$citizen_uid=$_GET["citizen"];

$query="insert into rating (citizenuid,workeruid) values ('$citizen_uid','$worker_uid')" ;

mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "Request Sent";
}
else
	echo $msg;

?>