<?php
    include './connect.php';
    
    $TeamID=/*$_POST["TeamID"]*/2;
    $tblTeam=array();
    $playerID=0;
    $resTeam=  mysql_query("SELECT * FROM tblplayerinteam where TeamId like '%$TeamID%'");
    
    if(mysql_num_rows($resTeam)>0)
    {
        while($row=mysql_fetch_array($resTeam))
        {
            $row_array["PlayerInTeamId"]=$row["PlayerInTeamId"];
            $row_array["TeamId"]=$row["TeamId"];
            $row_array["PlayerId"]=$row["PlayerId"];
            
            array_push($tblTeam,$row_array);
        }
        
        echo json_encode($tblTeam);
    }
    else
    {
        echo 'no record found';
    }
        
    
?>
