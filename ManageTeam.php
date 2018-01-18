<?php
    include './connect.php';
    
    $TeamName=/*$_POST["TeamName"]*/"pakistan";
    $tblTeam=array();
    $resTeam=  mysql_query("SELECT * FROM tblteam where teamName like '%$TeamName%'");
    
    if(mysql_num_rows($resTeam)>0)
    {
        while($row=mysql_fetch_array($resTeam))
        {
            $row_array["TeamID"]=$row["TeamId"];
            $row_array["TeamName"]=$row["TeamName"];
            $row_array["HomeGround"]=$row["HomeGround"];
            $row_array["Zone"]=$row["Zone"];
            $row_array["Area"]=$row["Area"];
            $row_array["TypeOfTeam"]=$row["TypeOfTeam"];
            
            array_push($tblTeam,$row_array);
        }
        
        echo json_encode($tblTeam);
    }
        
    
?>
