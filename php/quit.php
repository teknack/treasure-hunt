<?php

include("conn.php");
	$tek_emailid = $_SESSION['tek_emailid'];
	$res = mysql_query("select quit,level from oth_16 where tek_emailid='$tek_emailid'");  
		$row = mysql_fetch_array($res);
		$quit = $row['quit'];
		$level = $row['level'];
		
	if($level==14) 
	{
		mysql_query("UPDATE oth_16 SET quit=1
		WHERE tek_emailid='$tek_emailid'");
	}
   
if($quit==1)
{
	echo "<script>window.alert('You have already quit the game..');</script>";	
    echo '<script>window.top.location.assign("http://teknack.in");</script>';	
	exit;
}

?>