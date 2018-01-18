<?php
	include 'connect.php';
	$result=array();
	$ObjCo=array();
    $teamId=$_POST["teamId"];
	if(isset($_POST["teamId"]))
	{
		$query="select * from vwtblproposalsmatch where Reciever=$teamId and HasResponded=0";
		$res=mysql_query($query);
		if(mysql_num_rows($res)>0)
		{
			while ($row=mysql_fetch_array($res)) {
			
	                    $row_array['TeamId'] = $row['TeamId'];
	                    $row_array['TeamName'] = $row['TeamName'];
	                    array_push($result,$row_array);
			}
			echo json_encode($result);
		}
		else
		{
			echo "false";
		}
	}
?>