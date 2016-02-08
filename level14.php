<?php
session_start();
if(isset($_SESSION['tek_name']))
{	
include("php/conn.php");
require_once ('php/quit.php');

  $tek_name = $_SESSION['tek_name'];
	$res = mysql_query("select startlevel,level from oth_15 where tek_name='$tek_name'");  
	$row = mysql_fetch_array($res);
	$level = $row['level'];
	$startlevel= $row['startlevel']; 
   
    if($startlevel==13)
	{
		mysql_query("UPDATE oth_15 SET stime=NOW() WHERE tek_name='$tek_name'");
		
    }
	
	
	if($level > 13)
	{
			require_once('php/level.php');
	}


	if($level<13) // < previous level
	{
	mysql_query("UPDATE oth_15 SET quit=1
	WHERE tek_name='$tek_name'");
	echo "<script>window.alert('We caught your bluff. You shan\'t be able to find the treasure this year. Check out the other games');</script>";	
	echo '<script>window.top.location.assign("redirect.php");</script>';	
	exit;
	}
    mysql_query("UPDATE oth_15 SET startlevel=14 WHERE tek_name='$tek_name'");


if(isset($_POST['answer']))
	{
		
		$ans=$_POST['answer'];
		$answer = preg_replace('/\s+/', '',$ans);
		
		
		$rightans1 = "dbit";
		
		
		
		if(strcasecmp ( $rightans1, $answer) == 0)
		{
			
			mysql_query("UPDATE oth_15 SET level=14, ctime=NOW(),score=1000 WHERE tek_name='$tek_name'");
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
			
			echo '<script>window.top.location.assign("final.php");</script>';
			
		}
		else
		{
			echo "<script>window.alert('WRONG ANSWER.. TRY AGAIN..');</script>";	
			echo '<script>window.top.location.assign("level14.php");</script>';
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
			
		<div class="level14">
		 <div class="leveldetails">
		    <div class="detailbox" style="margin-left:10%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;"> LEVEL 14 </p>
			</div>
			<div id="my-button" onclick="bind(this)" style="float:left;margin-left:22%;">
			<button class="progressbutton">PROGRESS</button>
<!-- Element to pop up -->
<div id="element_to_pop_up">
    <a class="b-close">x<a/>
	<center>
	  <p style="font-size: 28px; font-family:'carbon'" >
      LEVELS COMPLETED: 13 <br><br>
	  LEVELS LEFT: 1<br> </p>
	  </center>
     </div>
	 </div>
			
			<div class="detailbox" style="margin-left:20.5%;">
			<p style="color: #ffffff;font-family: 'carbon'; font-size: 21px; margin-top: 3%;">SCORE: 1000</p>
			</div>
            </div>		 
		  	<div class="levelcontainl" >
		     <div id="Textt"  >
			   <center>
				<p class="para" >
				  So close yet so far...Kane  is close to completing his journey to start a new beginning!

                  <br>
				</p>
				</center>
				</div>
			</div>	
			<div class="levelcontainr" align="left" >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				After going through so much together this is it.. We have reached the last step....
				You have to Help Kane  find the last location...
				

                  <br>
				</p>
				</center>
				</div>
			</div>	
		
			<div class="levelcontain"  >
		     <div id="Textt"  >
			   <center>
				<p class="para">
				 Ap systepm fopr trapnsmipttipng vopipceps opvepr ap dipstapncep upsipng wiprep opr rapdipop,by copnveprtipng apcopupstipc vipbraptipopns top eplepctripcapl sipgnapls.
                80504052220
				<br>
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