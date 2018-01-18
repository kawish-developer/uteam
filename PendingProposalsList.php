<?php
	include 'connect.php';

	if(isset($_POST["PlayerID"]))
	{
		$PlayerID=$_POST["PlayerID"];

		$resProposalPlayer=array();

		$resProP=mysql_query("SELECT * FROM `vwPlayerProposal` where PlayerID=$PlayerID and HasResponded=0");
		if(mysql_num_rows($resProP)>0)
		{
			while($row=mysql_fetch_array($resProP))
			{
				$PlayerProposalID=$row["PlayerProposalID"];
				$TeamName=$row["TeamName"];
				$row_array['PlayerProposalID'] = $row['PlayerProposalID'];
				$row_array['TeamName'] = $row['TeamName'];

	    		array_push($resProposalPlayer,$row_array);
			}
			echo json_encode($resProposalPlayer);
		}
		else
		{
			echo "false";
		}
	}
	else
	{
		echo "No Player ID";
	}
?>