<?php
	$link = mysql_connect('localhost', 'root', '');

	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db('uteamdb', $link);
	if (!$db_selected) {
	    die ('Can\'t use uteamdb : ' . mysql_error());
	}
	//echo 'Connected successfully';
	//mysql_close($link);
?>