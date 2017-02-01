<?php
session_start();
if(isset($_SESSION['tek_emailid']))
{	
   $tek_emailid=$_SESSION['tek_emailid'];
   include("php/conn.php");
   $res = mysql_query("select level,startlevel from oth_16 where tek_emailid='$tek_emailid'");  
		$row = mysql_fetch_array($res);
		if($row)
		{
		$level = $row['level'];
	    $startlevel= $row['startlevel']; 
        }		
		
		if($level<$startlevel)
		{
			require_once('php/level.php');
		}
   function level()
   {
    $tek_emailid=$_SESSION['tek_emailid'];
   $res = mysql_query("select level from oth_16 where tek_emailid='$tek_emailid'");  
   $row = mysql_fetch_array($res);
   $level = $row['level'];
   $level=$level+1;
   if($level<=14)
   {	   
   $link='level'.$level.'.php';
   echo $link;
   }
   
   }
   
   ?>


<html>
	<head>
		<title>Teknack 2015</title>
		
		
        <link href="../../events/oth/css/style.css" rel="stylesheet" type="text/css">
		<style>
		  .desc
		   {
		      height: 35%;   
			  width: 100%; 
			
		   }
		</style>
		<script>
		function linkfunction()
		{
		window.top.location.assign("http://www.teknack.in");
	    }
		</script>
	</head>
	<body>
			
		<div class="level" style="padding-top:13%;">
		  
		  	<div class="levelcontain">
		     <div id="Textt" style="padding-top: 2%; position:relative;">
			    <center>
				<p style="font-family: 'JLSSpaceGothicR_NC'; font-size: 30px;  padding-right:4%;
				padding-left:4%; align:center;">
				You have successfully deciphered the previous clue.<br><br>
				If you are ready to proceed to the next, go ahead<br><br> </p>
				<p style="font-family: 'JLSSpaceGothicR_NC'; font-size: 30px;  padding-right:4%;
				padding-left:4%; align:center; color:rgb(0, 0, 205);font-size: 30px; cursor:pointer;">
				
				<a href="<?php level();?>">Proceed</a>  
                </p>
				
                </center> 
			</div>
			<br>
			
		   </div>	
		   <div class="desc">
		   </div>
	    </div>
		
		
	</body>
		
</html>
<?php
//echo '<script>window.top.location.assign("../../.php");</script>';
}
else
{
echo '<script>window.top.location.assign("../../index.php");</script>';
}
?>


    
   