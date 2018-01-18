<?php
	include 'connect.php';
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$result=array();
		$uname=$_POST['username'];
		$password=$_POST['password'];

		$query="select * from tblplayers where UserName='$uname' and Password='$password'";
		$res=mysql_query($query);
		if(mysql_num_rows($res)>0)
		{
			while($row=mysql_fetch_array($res))
			{
				$row_array["PlayerId"]=$row["PlayerId"];
				$row_array["UserName"]=$row["UserName"];
				array_push($result, $row_array);
			}
			echo json_encode($result);
		}
		else
		{
			echo "false";
		}
	}
?>