<?php
	include 'connect.php';
	if(isset($_POST["PlayerID"])&&isset($_POST["TeamID"]))
		{
			$PlayerID=$_POST["PlayerID"];
		$TeamID=$_POST["TeamID"];

		$insertPProp=mysql_query("INSERT INTO tblproposalsplayer(TeamID, PlayerID) VALUES ($PlayerID,$TeamID");
		if($insertPProp)
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
		echo 'Not Creating Player Proposal';
	}
?>