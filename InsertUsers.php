<?php
	include 'connect.php';
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];
	$email=$_POST['Email'];
	$uname=$_POST['userName'];
	$password=$_POST['Password'];
	$phoneNo=$_POST['PhoneNo'];

	$query_users="INSERT INTO tblusers(FirstName, LastName, Email, UserName, Password, PhoneNo, IsLoggedIn) VALUES ('$fname','$lname','$email','$uname','$password','$phoneNo',0)";
	$qurey_playerDetail="INSERT INTO tblplayerdetail(PlayerId, Batting, Bowling) VALUES (,[value-3],[value-4])";
	$res=mysql_query($query);
	if($res)
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
?>