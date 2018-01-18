<?php
include 'connect.php';

	
		$teamName=$_POST['teamName'];
		$homeGround=/*$_POST['homeGround']*/1;
		$Zone=$_POST['Zone'];
		$Area=$_POST['Area'];
		$Location=/*$_POST['Location']*/1;
		$teamType=/*$_POST['teamType']*/1;
		$Players=$_POST["Players"];


		$insertTeam=mysql_query("INSERT INTO tblteam(TeamName, HomeGround, Zone, Area, Location, TypeOfTeam) VALUES ('$teamName','$homeGround','$Zone','$Area',$Location,$teamType)");
		if($insertTeam)
		{
			$a=json_decode($Players,true);
					
				$selectTeam=mysql_query("select * from tblteam where teamName like '%$teamName%'");

				$TeamId=0;

				if(mysql_num_rows($selectTeam)==1)
				{
					while ( $row = mysql_fetch_array($selectTeam)) {
						$TeamId=$row['TeamId'];
					}
				}

				

			for($x=0;$x<count($a);$x++)
			{
				$playerID=0;
				$asd=$a[$x]['Player'];
				$playerRes=mysql_query("Select PlayerId from tblPlayers where UserName like '%$asd%'");
				if(mysql_num_rows($playerRes)>0)
				{
					while($row=mysql_fetch_array($playerRes))
					{
						$playerID=$row["PlayerId"];
					}
					$pla=mysql_query("INSERT INTO tblplayerinteam (TeamId,PlayerId) values($TeamId,$playerID)");
					if($pla)
					{
						echo 'true';
					}
					else
					{
						echo 'false';
					}
				}
			}
		}
		// if($insertTeam)
		// {
		// 	$selectTeam=mysql_query("select * from tblteam where teamName like '%$teamName%'");
		// 	$TeamId=0;
		// 	if(mysql_num_rows($selectTeam)==1)
		// 	{
		// 		while ( $row = mysql_fetch_array($selectTeam)) {
		// 			$TeamId=$row['TeamId'];
		// 		}
		// 	}
		// 	//echo "Team ID".$TeamId."<br>";

			
		// 	echo $Players;

		// 	// while()

		// 	// $insertPlayerInTeam=mysql_query("INSERT INTO tblplayerinteam(TeamId, PlayerId) VALUES ([value-1],[value-2])");
		// 	// if($insertPlayerInTeam)
		// 	// {
		// 	// 	echo "true";
		// 	// }
		// 	// else
		// 	// {
		// 	// 	echo "false";
		// 	// }
		// }
		// if($insertTeam)
		// {
			//echo "true";
		//}
		// else
		// {
		// 	//echo "false";
		// }
	
?>