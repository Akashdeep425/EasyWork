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
$category=$_POST["category"];
$shop=$_POST["shop"];
$address=$_POST["txtAdd"];
$city=$_POST["city"];
$state=$_POST["state"];
$exp=$_POST["exp"];
$special=$_POST["special"];
$previous=$_POST["previous"];
$hdnA=$_POST["hdnA"];
$hdnP=$_POST["hdnP"];
	
$orgAadhaar=$_FILES["aadhaarPic"]["name"];
$tmpAadhaar=$_FILES["aadhaarPic"]["tmp_name"];
$orgProfile=$_FILES["profilePic"]["name"];
$tmpProfile=$_FILES["profilePic"]["tmp_name"];	
	if($orgAadhaar=="")
	{
		$fileNameA=$hdnA;
	}
	else
	{
		$fileNameA=$orgAadhaar;
		move_uploaded_file($tmpAadhaar,"uploads/".$orgAadhaar);
	}
    if($orgProfile=="")
	{
		$fileNameP=$hdnP;
	}
	else
	{
		$fileNameP=$orgProfile;
		move_uploaded_file($tmpProfile,"uploads/".$orgProfile);
	}
$query="update workers set name='$name',mobile='$mobile',category='$category',shop='$shop',address='$address',city='$city',state='$state',special='$special',experience='$exp',previous='$previous',aadhaar='$fileNameA',profile='$fileNameP' where uid='$uid'";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	
	echo "<h2>Record Updated successfully...</h2>
    <br>
    Click <a href='dash-worker.php'>here</a> to redirect to dashboard";
}
else
	echo $msg;
}

function doSignup($dbCon)
{

$uid=$_POST["txtUid"];
$name=$_POST["name"];
$mobile=$_POST["txtMob"];
$category=$_POST["category"];
$shop=$_POST["shop"];
$address=$_POST["txtAdd"];
$city=$_POST["city"];
$state=$_POST["state"];
$exp=$_POST["exp"];
$special=$_POST["special"];
$previous=$_POST["previous"];
$hdnA=$_POST["hdnA"];
$hdnP=$_POST["hdnP"];
	
$orgAadhaar=$_FILES["aadhaarPic"]["name"];
$tmpAadhaar=$_FILES["aadhaarPic"]["tmp_name"];
$orgProfile=$_FILES["profilePic"]["name"];
$tmpProfile=$_FILES["profilePic"]["tmp_name"];	

$query="insert into workers(uid,name,mobile,category,shop,address,city,state,special,experience,previous,aadhaar,profile) values('$uid','$name','$mobile','$category','$shop','$address','$city','$state','$special','$exp','$previous','$orgAadhaar','$orgProfile')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	move_uploaded_file($tmpAadhaar,"uploads/".$orgAadhaar);
    move_uploaded_file($tmpProfile,"uploads/".$orgProfile);
	echo "<h2>Record Saved</h2>
    <br>
    Click <a href='dash-worker.php'>here</a> to redirect to dashboard";
}
else
	echo $msg;
}

?>
