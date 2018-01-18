<?php
	include 'connect.php';
	
		$TeamSenderID=/*$_POST["TeamSenderID"]*/24;
		$TeamRecieverID=/*$_POST["TeamRecieverID"]*/25;
		$LocationID=/*$_POST["LocationID"]*/2;
		$Overs=/*$_POST["Overs"]*/20;
		$TypesofMatch=/*$_POST["TypesofMatch"]*/'test';
		$NoOfPlayer=/*$_POST["NoOfPlayer"]*/2;
		$TypeBall=/*$_POST["TypeBall"]*/'hard ball';
		$MatchDate=/*$_POST["MatchDate"]*/"";
		$MatchTime=/*$_POST["MatchTime"]*/"";

		$senderID=0;
		$RecieverID=0;
		$LocationIDnew=0;

		$resSender=mysql_query("select * from tblPlayers where UserName like '%$TeamSenderID%'");
		if(mysql_num_rows($resSender))
		{
			while($row=mysql_fetch_array($resSender))
			{
				$senderID=$row["PlayerID"];
			}
		}
		else
		{
			echo "false";
		}

		$resRec=mysql_query("select * from tblPlayers where UserName like '%$TeamRecieverID%'");
		if(mysql_num_rows($resRec))
		{
			while($row=mysql_fetch_array($resRec))
			{
				$RecieverID=$row["PlayerID"];
			}
		}

		$resLoc=mysql_query("select * from tblLocation where LocationName like '%$LocationID%'");
		if(mysql_num_rows($resLoc))
		{
			while($row=mysql_fetch_array($resLoc))
			{
				$LocationIDnew=$row["LocationID"];
			}
		}



		$insertMatchProp=mysql_query("INSERT INTO tblproposalsmatch(TeamSenderID, TeamRecieverID, HasResponded, LocationID, Overs, TypesofMatch, NoOfPlayer, TypeBall, MatchDate, MatchTime) VALUES ($senderID,$RecieverID,0,$LocationIDnew,$Overs,'$TypesofMatch',$NoOfPlayer,'$TypeBall','$MatchDate','$MatchTime')");
		if($insertMatchProp)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	
?>