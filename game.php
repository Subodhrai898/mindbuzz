<?php
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 require_once 'Dboperation.php';
 
 $db = new DbOperation(); 
session_start();
$GLOBALS['level'] = 5;
$GLOBALS['story'] = "";
$GLOBALS['qno'] = "";
$GLOBALS['img'] = "";
$GLOBALS['h1']="";
$GLOBALS['h2']="";
$h3="";
$GLOBALS['music']="gmusic/act1.ogg";
$GLOBALS['point'] = 0;
$GLOBALS['title'] = "";
function getit()
{  $db = new DbOperation(); 
	$v = $db->getquestion($_SESSION['level']);
    $g = $v->fetch_assoc();
    $GLOBALS['level'] = $g['level'];
    $GLOBALS['h1'] = $g['hint1'];
    $GLOBALS['h2'] = $g['hint2'];
   
    $GLOBALS['story'] = $g['story'];
    
    $GLOBALS['qno'] = $g['text'];
  $GLOBALS['img']  = "photo/".$g['picture'].".jpg";
    $GLOBALS['point'] = $g['points'];
    $GLOBALS['title'] = $g['title'];
}
if(isset($_SESSION['rollno']) && isset($_SESSION['level']))
{
    
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mindans']))
   {     
         
       
       

        



        $v = $db->getquestion($_SESSION['level']);
        $g = $v->fetch_assoc();
         $gs =  strtoupper($_POST['mindans']);
        
        if(strcmp($gs,$g['ans'])==0)
        {
        	$_SESSION['level'] = $_SESSION['level']+1;
        	$_SESSION['point'] = $point+$_SESSION['point'];
         $v = $db->updatelevel($_SESSION['rollno'],$_SESSION['level'],$_SESSION['point']);
         if($_SESSION['level']==3)
          {
             header("Location: gameact1.php");
          }
           
           if($v==1)
           {
           	   getit();
           }
        }
        else
        {
        	if($_SESSION['level']==0)
        	{
        		header("Location: uictrick.php");
        	}

          
        	getit();
        }
      
         


   }else
   {
      if($_SESSION['level']==0)
      {
      	header("Location: uictrick.php");

      }
       if($_SESSION['level']==3)
          {
            header("Location: gameact1.php");
          }

   	   getit();
   }
    


          














}
else
{
	die("error");
}







?>










<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GAME</title>
        <!-- CSS -->        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Roboto:300,400,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<style>
#st
{
	background-color: rgba(0,0,0,.5);
	color: white;
}
#overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 2;
    cursor: pointer;
}

#text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    color: white;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}
.trans
{
   
background-color: rgba(0,0,0,0.5);
border-radius: 25%  0 30% 0;


}
.tran2
{
	background-color: rgba(0,0,0,0.5);
}
.tran
{
	background-color: rgba(0,0,0,0.5);
}
.fontc
{
	color: white;
}
body
{
	background-image: url("wallb.jpg");
  background-size: cover;

}
</style>
    </head>
     
    <body>
<audio id="myA" controls autoplay loop hidden>
<source src=<?php echo $GLOBALS['music'];?> type="audio/ogg">
<p>If you can read this, your browser does not support the audio element.</p>
</audio>
		<div class= "wow fadeInLeft"  id="overlay" onclick="off()">
 <div class="jumbotron" >
  <h3>Story</h3> 
  <p><?php echo $GLOBALS['story'] ;?> </p> 
</div>
</div>
		<!-- Top menu -->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-bran" href="index.html" style="color: white;font-size: 30px;
					margin: 10%;"><?php echo $_SESSION['rollno'] ?></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><button  class="btn btn-primary" onclick="on()">Story</button></a></li>
						<li><a href="leaderboard.php">LeaderBoard</a></li>
						<li><a href="logout.php">Exit</a></li>
						<li><a href="http://149.129.138.41/UIC">UIC</a></li>
						<li><a href="#credits">Credits</a></li>
						
					</ul>
				</div>
			</div>
		</nav>
				
        <!-- Top content -->
      
        
        <!-- Features -->
        <div class="features-container section-container">
	        <div class="container">
	        	
	            <div class="row" class="trans">
	                <div class="col-sm-12 features  wow fadeIn">
	                    <h2 class="fontc">Level <?php echo $GLOBALS['level']; ?></h2>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-sm-9  wow fadeInLeft" >
	                	<div class="row tran2">
	                		<div class="col-sm-6 trans">
                              <h3 style="color: white;"><?php echo $GLOBALS['title']; ?></h3>
		                    	<p id="textq" style="color: white;">
		                    		<?php echo $GLOBALS['qno']; ?>
		                    	</p>	                			
	                		</div>
	                		<div class="col-sm-6" id="pic">
	                		<a href = <?php echo $GLOBALS['img'];?> target="_blank">	<img src=<?php echo $GLOBALS['img'];  ?>  class="img-responsive"></a>
	                			
	                		</div>
	                	</div>
	                	<div class="row" style="margin-top: 5%; padding: 5%">
	                		<div class="col-sm-7 " style="color: white;">
                              <h3 class="fontc" >HINTS</h3>
		                    	<p id="textq" class="fontc">
                            <?php echo $GLOBALS['h1'];?>
                            <br>
                            <?php echo $GLOBALS['h2'];?>
                            <br>
		                    		</p>
		                    	</p>	                			
	                		</div>
	                		<div class="col-sm-5">
                        <h2 class="fontc">Instructions</h2>
                        <ul style="list-style: none" class="fontc">
                          <li> Click On Picture to View in Large Size</li>
                          <li> Answer should be in Upper Case with no gap</li>
                          <li> You can click On the volume button to stop music</li>
                          <li> Want to see the act again, logout and login again</li>
                        </ul>
	                			
	                		</div>
	                	</div>
	                </div>
	                <div class="col-sm-3 tran   fadeInLeft">
	                	<div class="row">
	                		
                       <div class="col-sm-12 ">
                              <h3 class="fontc" >SETTING</h3>
		                    	
                             <h3><img id="musicit" src="web/music.png" height = "100px" width = "100px" onclick="stopit()">

   <P>

 

   </P>

	                		</div>
             

	                		<div class="col-sm-12 " style="margin-top: 5%; padding-left: 2%; height: 100%;">
	                			<form method="POST" action= "game.php">
    <div class="form-group">
     
      <div class="col-sm-12">
        <?php 
             if($_SESSION['level']==3)
             {

       echo " <input  type='text' name='act1' value='abc' style='display: none;'>";

      }
      ?>
        <input class="form-control" id="focusedInput" type="text" name="mindans" >
        <br>
        <center><button type="submit" class="btn btn-primary">Answer</button>
        	<br>
        	<p style="color: white;"> ANSWER IN UPPER CASE LETTER WITH NO GAP</center>
        <br>
        <br>
        <br>
      </div>
    </div>
    <br>
<br>
<br>
</form>


	                		</div>
	                	</div>
	                </div>
	            </div>
	            
	           
	        </div>
        </div>
        <footer id="credits">
          <h4>Credits</h5>
            <h5> Avaneesh Tripathi</h5>
          <h5>Kshitij Singh </h5>
          

        </footer>
        <!-- Footer -->
       

 <script>
 	var music = 1;
  var x = document.getElementById("myA"); 

function stopit()
{   
	
    if(music)
    {
    	document.getElementById("musicit").src="web/music2.png"
      x.play();
    	music=0;
    }
    else
    {
    	document.getElementById("musicit").src="web/music.png"
    	music=1;
      x.pause();
    }
}

 	 document.getElementById("overlay").style.display = "block";
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
    x.play();
}
</script>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>