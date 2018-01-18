<?php
include 'connect.php';
	// if(isset($_POST["where"]))
	// {
		$arr=array();
		//$where=$_POST["where"];

		$resPlayer=mysql_query("SELECT * FROM `tblplayers`");
		if(mysql_num_rows($resPlayer)>0)
		{
			while($row=mysql_fetch_array($resPlayer))
			{
				$row_array["PlayerId"]=$row["PlayerId"];
				$row_array["UserName"]=$row["UserName"];

    			array_push($arr,$row_array);
			}

			echo json_encode($arr);
		}
		else {
			echo "false";
		}
	//}
?>