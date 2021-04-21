<?php
include_once("SMS_OK_sms.php");
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$count=mysqli_num_rows($table);

if($count==1){
    $row=mysqli_fetch_array($table);
    $mobile=$row["mobile"];
    $msg=$row["pwd"];
    $msg=SendSMS($mobile,$msg);
    echo"SMS Sent";
}
else{
    echo"Invalid User Id";
}

?>