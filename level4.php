
<?php
session_start();
if(isset($_SESSION['tek_name']))
{	
include("php/conn.php");
require_once ('php/quit.php');
    mysql_query("INSERT INTO oth_15 (tek_name,level, stime) VALUES ('$tek_name','0',NOW())"); 

     
	$tek_name = $_SESSION['tek_name'];
	$res = mysql_query("select startlevel,level from oth_15 where tek_name='$tek_name'");  
	$row = mysql_fetch_array($res);
	$level = $row['level'];
	$startlevel= $row['startlevel']; 
   
    if($startlevel==3)
	{
		mysql_query("UPDATE oth_15 SET stime=NOW() WHERE tek_name='$tek_name'");
		
    }
	
	if($level > 3)
	{
			require_once('php/level.php');
	}

	if($level<3) // < previous level
	{
	mysql_query("UPDATE oth_15 SET quit=1
	WHERE tek_name='$tek_name'");
	echo "<script>window.alert('We caught your bluff. You shan\'t be able to find the treasure this year. Check out the other games');</script>";	
	echo '<script>window.top.location.assign("redirect.php");</script>';
	exit;
	}

    mysql_query("UPDATE oth_15 SET startlevel=4 WHERE tek_name='$tek_name'");

if(isset($_POST['answer']))
	{
		
		$ans=$_POST['answer'];
		$answer = preg_replace('/\s+/', '',$ans);
		
		
		
		$rightans1 = "bagpack";
	   
		
		
		if(strcasecmp ( $rightans1, $answer) == 0)
		{
			
			$op=mysql_query("UPDATE oth_15 SET level=4, ctime=NOW(),score=125 WHERE tek_name='$tek_name'");
			$res = mysql_query("select stime,ctime,dtimemin from oth_15 where tek_name='$tek_name'");  
			$row = mysql_fetch_array($res);
			$stime=new DateTime($row['stime']);
            $dtimemin=$row['dtimemin'];
			$dtime= $stime->diff(new DateTime($row['ctime']));
            
			$minutes=$dtime->days*24*60;
			$minutes+=$dtime->h*60;
			$minutes+=$dtime->i;
			$dtimemin=$dtimemin+$minutes;
			mysql_query("UPDATE oth_15 SET dtimemin='$dtimemin' WHERE tek_name='$tek_name'");
			
			echo '<script>window.top.location="level5.php";</script>';
			
			
		}
		else
		{
			echo "<script>window.alert('WRONG ANSWER.. TRY AGAIN..');</script>";	
			echo '<script>window.top.location="level4.php";</script>';
		}
	}
?>
<html>
	<head>
		<title>Teknack 2016</title>
		
	
        <link href="css/style.css" rel="stylesheet" type="text/css">
		
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/jquery.bpopup.min.js"></script>
		<script>
		  ;(function($) {

         // DOM Ready
        $(function() {

            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('#my-button').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();
	
                // Triggering bPopup when click event is fired
                $('#element_to_pop_up').bPopup();

            });

        });

    })(jQuery);
		
		</script>
		
	</head>
	<body bgcolor="black">
			
		<div class="level4">
		 <div class="leveldetails">
		    <div class="detailbox" style="margin-left:10%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;"> LEVEL 4</p>
			</div>
			<div id="my-button" onclick="bind(this)" style="float:left;margin-left:22%;">
			<button class="progressbutton">PROGRESS</button>
<!-- Element to pop up -->
<div id="element_to_pop_up">
    <a class="b-close">x<a/>
	<center>
	  <p style="font-size: 28px; font-family:'carbon'">
      LEVELS COMPLETED: 3 <br><br>
	  LEVELS LEFT: 11 <br> </p>
	  </center>
     </div>
			</div>
			
			<div class="detailbox" style="margin-left:20.5%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;">SCORE: 125</p>
			</div>
            </div>		 
		  	<div class="levelcontainl" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				 Waking up, Kane finds the world around him completely destroyed.. After overcoming the initial shock, he realises that it is in his 
				 best interest to gather the necessities for his survival..
                  <br>
				</p>
				</center>
         
			</div>
			</div>	
			<div class="levelcontainr" align="left" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				  Your mission is to guide him safely on his perilous journey.. But first lets take a look at your surroundings...
                  <br>
				</p>
				</center>
         
			</div>
			</div>	
		
			<div class="levelcontainm" >
		     <div id="Textt">
			   <center>
				<p class="para">"Cercate e Troverete,<br>dove i corvi sono cross"</p>
				</center>
			</div>
			</div>	
			
		   <div style="margin-top:1%;"> 
		   <form name="input" action="" method="post">
		                    <center>
							<input class="inputstyle" type="text" name="answer" placeholder="Name"><br><br>
							<input class="submitstyle" type="submit" value="PROCEED"></center>		
						</form>
		   <br><br>
		   </div>
		   <br><br>
	    </div>
		
	</body>
		
</html>
<?php
}
else
{
echo '<script>window.top.location="../../index.php";</script>';
}
?>