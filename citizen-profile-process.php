<?php
include_once("connection.php");
$btn=$_POST["btn"];
if($btn=="Save")
	doSignup($dbCon);
else
	doUpdate($dbCon);

function doUpdate($dbCon)
{

$uid=$_POST["txtUid"];
$name=$_POST["name"];
$mobile=$_POST["txtMob"];
$address=$_POST["txtAdd"];
    $city=$_POST["city"];
    $state=$_POST["state"];
$hdn=$_POST["hdn"];
	
$orgName=$_FILES["profilePic"]["name"];
$tmpName=$_FILES["profilePic"]["tmp_name"];
	
	if($orgName=="")
	{
		$fileName=$hdn;
	}
	else
	{
		$fileName=$orgName;
		move_uploaded_file($tmpName,"uploads/".$orgName);
	}
	//record updated
$query="update citizens set name='$name',mobile='$mobile',address='$address',city='$city',state='$state',pic='$fileName' where uid='$uid'";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "<h2>Record Updated successfully...</h2>
    <br>
    Click <a href='dash-citizen.php'>here</a> to redirect to dashboard";
}
else
	echo $msg;
}

function doSignup($dbCon)
{

$uid=$_POST["txtUid"];
$name=$_POST["name"];
$mobile=$_POST["txtMob"];
$address=$_POST["txtAdd"];
    $city=$_POST["city"];
    $state=$_POST["state"];


$orgName=$_FILES["profilePic"]["name"];
$tmpName=$_FILES["profilePic"]["tmp_name"];

$query="insert into citizens values('$uid','$name','$mobile','$address','$city','$state','$orgName')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	move_uploaded_file($tmpName,"uploads/".$orgName);
	echo "<h2>Record Saved</h2>
    <br>
    Click <a href='dash-citizen.php'>here</a> to redirect to dashboard";
}
else
	echo $msg;
}

?>
