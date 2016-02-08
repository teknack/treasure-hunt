<?php
session_start();
if(isset($_SESSION['tek_name']))
{	
include("php/conn.php");
require_once ('php/quit.php');

 $tek_userid = $_SESSION['tek_name'];
  
	
	
?>


<html>
	<head>
		<title>Teknack 2016</title>
		
		
        <link href="css/style.css" rel="stylesheet" type="text/css">
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
		window.top.location.assign("final.php");
	    }
		</script>
		
	</head>
	<body bgcolor="black">
			
		<div class="final" style="padding-top:13%;">
		  <br><br><br><br><br><br>
		  
		  	<div class="levelcontain">
		     <div id="Textt" style=" position:relative;">
			    <center><font face='carbon'><h1>Congratulations!!!</h1></font>
				<p class="para">
				 You have helped Kane reach the rest of the survivors successfully by solving all the tasks. Now Kane 
				 along with the rest  of the survivors will work towards a new beginning trying to reverse years worth of damage and 
                 and learning from their previous mistakes..<br>
                  Well done, your efforts helped save humanity!! :D <br>
				 
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
}
else
{
echo '<script>window.top.location.assign("../../index.php");</script>';
}
?>