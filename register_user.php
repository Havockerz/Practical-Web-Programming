<?php

$userID = $_POST['userid'];
$userPwd = $_POST['password'];
$email = $_POST['email'];
$host= "localhost" ;
$username= "root" ; 
$password = "";
$dbname = "fedb_dc98220";
$link = new mysqli($host, $username, $password, $dbname);
if ($link->connect_error){ 
	die("Connection failed: " . $link->connect_error);
}
else
{
	$queryCheck="select * from userlist where User_Id = '".$userID."'";
	$resultCheck=$link->query($queryCheck);
	if($resultCheck->num_rows == 1){
		echo"<p style='color:red;'> User ID already exist</p>";
		echo "<a  href='register_form.html'>Try Again </a>";
	}
	else
	{
	$queryUpdate = "insert into userlist (User_Id,User_Pwd,User_Email) values('".$userID."','".$userPwd."','".$email."')";
	if ($link->query($queryUpdate)==TRUE){
		echo"<p style='color:blue;'> Successfully Register</p>";
		echo "<a href='register_form.html'>Register New </a>";
	}else{
	echo"<p style='color:red;'>Query Problems!:".$conn->error ."</p>";
		}
	
	}
}
$link->close();
?>