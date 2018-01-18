<?php
	include 'connect.php';
	$email=$_POST['email'];
	$uname=$_POST['username'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$battingStyle=$_POST["batting"];
	$bowlingStyle=$_POST["bowling"];
	$bowlingSpeed=$_POST["bowlspeed"];

	$query="INSERT INTO tblplayers(Email, Phone, UserName, Password,IsLoggedIn) VALUES ('$email','$phone','$uname','$password',0)";
	$res=mysql_query($query);
	if($res)
	{
		$selectResPID=mysql_query("Select * from tblplayers where UserName='$uname' and Password='$password'");
		$PlayerId=0;
		if(mysql_num_rows($selectResPID)==1)
		{
			while($row=mysql_fetch_array($selectResPID))
			{
				$PlayerId=$row['PlayerId'];
				echo "PlayerId : ".$PlayerId;
			}
		}
		else
		{
			echo "No Player Inserted";
		}
		$selectResBTID=mysql_query("SELECT * FROM tblbattingstate WHERE BattingStyle like '%$battingStyle%'");
		$BattingID=0;
		if(mysql_num_rows($selectResBTID)==1)
		{
			while($row=mysql_fetch_array($selectResBTID))
			{
				$BattingID=$row['BattingStateID'];

				echo "BattingId : ".$BattingID;
			}
		}
		$selectResBID=mysql_query("SELECT * FROM tblbowlingstate WHERE bowlingStyle like '%$bowlingStyle%' and bowlingSpeed like '%$bowlingSpeed%'");
		$BowlingId=0;

			//echo "Bowling ID : ".$BowlingId;
		if(mysql_num_rows($selectResBID)==1)
		{
			//echo "Bowling ID : ".$BowlingId;
			while($row=mysql_fetch_array($selectResBID))
			{
				$BowlingId=$row['bowlingstatID'];
				echo "BowlingId : ".$BowlingId;
			}
		}
		$queryDetail="INSERT INTO tblplayerdetail(PlayerId, Batting, Bowling) VALUES ($PlayerId,$BattingID,$BowlingId)";

		if($queryDetail)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
	else
	{
		echo "Not Inserted";
	}
	
?>