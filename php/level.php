<?php
include("conn.php");
	$level = "100";
	$tek_emailid = $_SESSION['tek_emailid'];
	$res = mysql_query("select level,startlevel,final from oth_16 where tek_emailid='".$tek_emailid."'"); 
	
		$row = mysql_fetch_array($res);
		if($row)
		{	
	   	$level = $row['level'];
	     $startlevel= $row['startlevel'];  
         $final= $row['final'];		
		}			
		$final=$row['final'];
		if($level==0 AND $startlevel==0)
		{ 
			echo '<script>window.top.location.assign("level1.php");</script>'; 
		}
	 if($final==1)	
	 {
       echo '<script>window.top.location.assign("proceed.php");</script>';
     } 	
	
	switch($level)
	{	
		case 0:
		    if($startlevel==$level)
			{echo '<script>window.top.location.assign("index.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level1.php");</script>';}
      		break;
		case 1:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level1.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level2.php");</script>';}
      		break;
		case 2:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level2.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level3.php");</script>';}
      		break;
		case 3:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level3.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level4.php");</script>';}
      		break;
		case 4:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level4.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level5.php");</script>';}
      		break;
		case 5:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level5.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level6.php");</script>';}
      		break;
		case 6:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level6.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level7.php");</script>';}
      		break;
		case 7:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level7.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level8.php");</script>';}
      		break;
		case 8:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level8.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level9.php");</script>';}
      		break;
		case 9:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level9.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level10.php");</script>';}
      		break;
		case 10:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level10.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level11.php");</script>';}
      		break;
		case 11:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level11.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level12.php");</script>';}
      		break;
		case 12:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level12.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("level13.php");</script>';}
      		break;
		case 13:
			if($startlevel==$level)
			{echo '<script>window.top.location.assign("level13.php");</script>';}
		    else				
			{echo '<script>window.top.location.assign("final.php");</script>';}
      		break;

	}
?>
