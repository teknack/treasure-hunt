<?php
session_start();
$_SESSION['tek_emailid']="teknack@xyz.com";
if(isset($_SESSION['tek_emailid']))
{	
require_once ('php/quit.php');
//require_once ('php/level.php');
require_once ('php/conn.php');
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
		<style>
		.logo
		{
		   width: 100%;
           height: 30%;
		   padding-top: 2%;
		   position: relative;
           display: block;
		   
		}
		
		#Textt
		{
		  text-align: center;
		}
		#buttons
		{
		  width:auto;
		  height:40%;
		  margin-top: 3%;
		}
		.othrules
		{
		   width: 10%;
		   height:60%;
		   margin-top: 3%;
		   background-image: url("images/rules.png");
		   background-size: 100% 100%;
		   position: relative;
		   float:left;
		   margin-left: 35%;
		   
		}
		.othrules:hover { -moz-box-shadow: 0 0 15px #ccc; -webkit-box-shadow: 0 0 15px #ccc; box-shadow: 0 0 15px #ccc; } 
		
		.othstart
		{
		   width: 10%;
		   height:60%;
		   margin-top: 3%;
		   
		   position: relative;
		   float: left;
		   margin-left:10%;
		}
		.othstart:hover { -moz-box-shadow: 0 0 15px #ccc; -webkit-box-shadow: 0 0 15px #ccc; box-shadow: 0 0 15px #ccc; } 
		
		.startbutton
		{
			width:132px;
			height:40px;
			font-family: 'carbon';
			border: 1px solid #b7cef9;
			
			background: #000000;
			padding: 5px 0;
			text-align:center;
			color: #fff;
			font-size: 23px;
	
		}
        .startbutton:hover { -moz-box-shadow: 0 0 15px #ccc;
		-webkit-box-shadow: 0 0 15px #ccc; 
		box-shadow: 0 0 15px #ccc;
        cursor:pointer;		} 


       	
		 #element_to_pop_up { 
    background-color:#fff;
	width:10%;
    font-size:20px;
    color:#000;
    display:none; 
    padding:20px;
    min-width:400px;
    min-height: 180px;
}
.b-close{
    cursor:pointer;
    position:absolute;
    right:10px;
    top:5px;
}

		
		</style>
		
	</head>
	<body bgcolor="black">
			
		<div class="oth">
		  <div class="logo" align="center">
		       
		       <img src="images/logo.png" width="25%" height="100%">
			   
		    </div>
		   <div class="contain">
		     <div id="Textt" position:relative;">
				<p style="font-family: 'carbon'; font-size: 24px; align:center;">
				
				In the Post-Apocalyptic setting your friend is one of the survivors and you are his only hope of survival..<br>
				Regardless of the obstacles or hurdles that are ahead of you, your goal is to help him cross the tunnel...The adventure doesn't end here... <br>
				Nothing worthwhile ever comes easy in life... You keep trying and going after it...
				Your aim is to help him find the rest of the survivors for a New Beginning...
				
				
				</p>

			</div>
		   </div>
		   <br><br>
		  <div id="buttons">
	      <div id="my-button" onclick="bind(this)" style="float:left;margin-left:36%;">
			<button class="startbutton">RULES</button>
<!-- Element to pop up -->
<div id="element_to_pop_up">
    <a class="b-close">x<a/>
   <font face ="carbon"> <ol>RULES:<li>There are 12 levels. 
   <li>The winner is the one who completes the maximum number of levels.
   In case of a tie, the one with the shortest time taken will be declared the winner.
   <li>Any cheating or malpractice will result in immediate disqualification.
   <li>You can logout anytime and continue later. 
   However, once you start a level, your timer will continue, whether you logout or not.
   If you logout between levels, your time will not be affected. </ol></font>
</div>
			</div>
			<div style="float:left; margin-left:9%;">
			 <a href = "level1.php"><button class="startbutton" ;font="carbon">START</button> </a>
			</div>
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