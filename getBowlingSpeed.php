<?php
	include 'connect.php';
	$result=array();
	$ObjCo=array();
	$query="select distinct bowlingSpeed from tblbowlingstate";
	$res=mysql_query($query);
	if(mysql_num_rows($res)>0)
	{
		while ($row=mysql_fetch_array($res)) {
			
    		$row_array['bowlingSpeed'] = $row['bowlingSpeed'];

    		array_push($result,$row_array);
		}
		echo json_encode($result);
	}
	else
	{
		echo "false";
	}
?>