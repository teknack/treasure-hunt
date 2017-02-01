<?php
session_start();
if(isset($_SESSION['tek_emailid']))
{	
include("php/conn.php");
require_once ('php/quit.php');

  $tek_emailid = $_SESSION['tek_emailid'];
	$res = mysql_query("select startlevel,level from oth_16 where tek_emailid='$tek_emailid'");  
	$row = mysql_fetch_array($res);
	$level = $row['level'];
	$startlevel= $row['startlevel']; 
   
    if($startlevel==12)
	{
		mysql_query("UPDATE oth_16 SET stime=NOW() WHERE tek_emailid='$tek_emailid'");
		
    }
	
	
	if($level > 12)
	{
			require_once('php/level.php');
	}


	if($level<12) // < previous level
	{
	mysql_query("UPDATE oth_16 SET quit=1
	WHERE tek_emailid='$tek_emailid'");
	echo "<script>window.alert('We caught your bluff. You shan\'t be able to find the treasure this year. Check out the other games');</script>";	
	echo '<script>window.top.location.assign("redirect.php");</script>';	
	exit;
	}
    mysql_query("UPDATE oth_16 SET startlevel=13 WHERE tek_emailid='$tek_emailid'");


if(isset($_POST['answer']))
	{
		
		$ans=$_POST['answer'];
		$answer = preg_replace('/\s+/', '',$ans);
		
		
		$rightans1 = "stjohnthebaptistchurch";
		
		
		
		if(strcasecmp ( $rightans1, $answer) == 0)
		{
			include "../mega-event/common-code.php";
			sendScore("treasure-hunt",50,$_SESSION["tek_emailid"]);
			mysql_query("UPDATE oth_16 SET level=13, ctime=NOW(),score=750 WHERE tek_emailid='$tek_emailid'");
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
			
			echo '<script>window.top.location.assign("level14.php");</script>';
			
		}
		else
		{
			echo "<script>window.alert('WRONG ANSWER.. TRY AGAIN..');</script>";	
			echo '<script>window.top.location.assign("level13.php");</script>';
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
			
		<div class="level13">
		 <div class="leveldetails">
		    <div class="detailbox" style="margin-left:10%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;"> LEVEL 13 </p>
			</div>
			<div id="my-button" onclick="bind(this)" style="float:left;margin-left:22%;">
			<button class="progressbutton">PROGRESS</button>
<!-- Element to pop up -->
<div id="element_to_pop_up">
    <a class="b-close">x<a/>
	<center>
	  <p style="font-size: 28px; font-family:'carbon';">
      LEVELS COMPLETED: 12 <br><br>
	  LEVELS LEFT: 2 <br> </p>
	  </center>
     </div>
			</div>
			
			<div class="detailbox" style="margin-left:20.5%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;">SCORE: 750</p>
			</div>
            </div>		 
		  	<div class="levelcontainl" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				  Kane  now heads further to find the other survivors. Every correct loaction would land him in the place where he finds more people.
                  <br>
				</p
				</center>
         
			</div>
			</div>	
			<div class="levelcontainr" align="left" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
			       After collecting and sheltering the people from the location 1 (Bibi ka Maqbara). Kane  moves Forward.
				</p>
				</center>
         
			</div>
			</div>	
		
			<div class="levelcontain"  >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				 It was feast time of a famous saint, a tree canopy replaced the roof of this ancient structure. 
				 The celebration was held in the 'ruins' of this ancient holy structure which was built in the year of 1579 
				 in the city of dreams.
				<br>
				Hint: Guess this holy ancient structure.
				</p>
				</center>
			</div>
			</div>	
		   <div style="margin-top:1%;"> 
		   <form name="input" action=" " method="post">
		                    <center>
							<input class="inputstyle" type="text" name="answer" placeholder="Place"><br><br>
							<input class="submitstyle" type="submit" value="PROCEED"></center>		
						</form>
		   <br>
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