<?php
session_start();
if(isset($_SESSION['tek_emailid']))
{	
include("php/conn.php");
require_once ('php/quit.php');

//BLUFF CODE
    $tek_emailid = $_SESSION['tek_emailid'];
	$res = mysql_query("select startlevel,level from oth_16 where tek_emailid='$tek_emailid'");  
	$row = mysql_fetch_array($res);
	$level = $row['level'];
	$startlevel= $row['startlevel']; 
   
    if($startlevel==7)
	{
		mysql_query("UPDATE oth_16 SET stime=NOW() WHERE tek_emailid='$tek_emailid'");
		
    }
	
	
	if($level > 7)
	{
			require_once('php/level.php');
	}


	if($level<7) // < previous level
	{
	mysql_query("UPDATE oth_16 SET quit=1
	WHERE tek_emailid='$tek_emailid'");
	echo "<script>window.alert('We caught your bluff. You shan\'t be able to find the treasure this year. Check out the other games');</script>";	
	 echo '<script>window.top.location.assign("redirect.php");</script>';
	exit;
	}
    mysql_query("UPDATE oth_16 SET startlevel=8 WHERE tek_emailid='$tek_emailid'");


if(isset($_POST['answer']))
	{
		
		$ans=$_POST['answer'];
		$answer = preg_replace('/\s+/', '',$ans);
		
		
		
		$rightans1 = "left";
	
		
		if(strcasecmp ( $rightans1, $answer) == 0)
		{
			include "../mega-event/common-code.php";
			sendScore("treasure-hunt",100,$_SESSION["tek_emailid"]);
			mysql_query("UPDATE oth_16 SET level=8, ctime=NOW(),score=375 WHERE tek_emailid='$tek_emailid'");
			$res = mysql_query("select stime,ctime,dtimemin from oth_16 where tek_emailid='$tek_emailid'");  
			$row = mysql_fetch_array($res);
			$stime=new DateTime($row['stime']);
            $dtimemin=$row['dtimemin'];
			$dtime= $stime->diff(new DateTime($row['ctime']));
            
			$minutes=$dtime->days*24*60;
			$minutes+=$dtime->h*60;
			$minutes+=$dtime->i;
			$dtimemin=$dtimemin+$minutes;
			mysql_query("UPDATE oth_16 SET dtimemin='$dtimemin' WHERE tek_emailid='$tek_emailid'");
			
echo '<script>window.top.location.assign("level9.php");</script>';
			
		}
		else
		{
			echo "<script>window.alert('WRONG ANSWER.. TRY AGAIN..');</script>";	
			echo '<script>window.top.location="level8.php";</script>';
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
			
		<div class="level8">
		 <div class="leveldetails">
		    <div class="detailbox" style="margin-left:10%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;"> LEVEL 8 </p>
			</div>
			<div id="my-button" onclick="bind(this)" style="float:left;margin-left:22%;">
			<button class="progressbutton">PROGRESS</button>
<!-- Element to pop up -->
<div id="element_to_pop_up">
    <a class="b-close">x<a/>
	<center>
	  <p style="font-size: 28px;font-family:'carbon';">
      LEVELS COMPLETED: 7 <br><br>
	  LEVELS LEFT: 7 <br> </p>
	  </center>
     </div>
			</div>
			
			<div class="detailbox" style="margin-left:20.5%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;">SCORE: 375</p>
			</div>
            </div>		 
		  	<div class="levelcontainl" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				 Having secured all the necessities, Kane's next aim is to find his way out of the tunnel.. He reaches a point where the
				 wrong choice could be his last.
                  <br>
				</p>
				</center>
         
			</div>
			</div>	
			<div class="levelcontainr" align="left" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				  He has reached a crossroad...The <b>P</b>ower is in your hands...<br> Help him find his way to the outside world
				  or prepare for his doom.
                  <br>
				</p>
				</center>
         
			</div>
			</div>	
		   
			<div class="levelcontain"  >
		     <div id="Textt"  >
			   <center>
				<p class="para" >
				   <br>
				   The  right path usually lies in making the correct <b>SELECT</b>ion.<br>
				   <font color="white" class="hide">When nothing goes right go....</font>
                
				</p>
				</center>
			</div>
			</div>		
			<br>
		
		   <div style="margin-top:1%;"> 
		   <form name="input" action=" " method="post">
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
echo '<script>window.top.location.assign("../../index.php");</script>';
}
?>