<?php
session_start();
if(isset($_SESSION['tek_emailid']))
{	
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
		window.top.location.assign("http://www.teknack.in");
	    }
		</script>
	</head>
	<body bgcolor="black">
			
		<div class="redirect" style="padding-top:13%;">
		  
		  	<div class="levelcontain">
		     <div id="Textt" style="padding-top: 2%; position:relative;">
			    <center>
				<p style="font-family: 'carbon'; font-size: 30px;  padding-right:4%;
				padding-left:4%; align:center;">
				 You Cannot Play this event anymore <br>
				 Try Other Events at <br>
                </p>
				<p style="color:rgb(0, 0, 205);font-size: 30px; cursor:pointer;" onclick="linkfunction()" ><a href="http://teknack.in">
				  www.teknack.in </a>
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