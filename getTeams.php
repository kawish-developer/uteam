<?php
	include 'connect.php';
	$result=array();
	$ObjCo=array();
	$query="select * from tblteam";
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
?>