<?php

include("conn.php");
	$tek_name = $_SESSION['tek_name'];
	$res = mysql_query("select quit,level from oth_15 where tek_name='$tek_name'");  
		$row = mysql_fetch_array($res);
		$quit = $row['quit'];
		$level = $row['level'];
		
	if($level==14) 
	{
		mysql_query("UPDATE oth_15 SET quit=1
		WHERE tek_name='$tek_name'");
	}
   
if($quit==1)
{
	echo "<script>window.alert('You have already quit the game..');</script>";	
    echo '<script>window.top.location.assign("http://teknack.in");</script>';	
	exit;
}

?>