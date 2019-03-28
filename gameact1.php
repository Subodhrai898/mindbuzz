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
$GLOBALS['point'] = 0;
$GLOBALS['title'] = "";
function getit()
{  $db = new DbOperation(); 
	$v = $db->getquestion($_SESSION['level']);
    $g = $v->fetch_assoc();
    $GLOBALS['level'] = $g['level'];
   
    $GLOBALS['story'] = $g['story'];
    
    $GLOBALS['qno'] = $g['text'];
  $GLOBALS['img']  = "mindbuzimg/".$g['picture'].".jpg";
    $GLOBALS['point'] = $g['points'];
    $GLOBALS['title'] = $g['title'];
}
if(isset($_SESSION['rollno']) && isset($_SESSION['level']))
{
    
   if(($_SESSION['level']==3))
   {     
        
      
         


   }else
   {
   	  die("NOT ALLOWED");
   }
    


          














}
else
{
	die("error");
}







?>

<html lang="en">
<head>
  <title>LIFE IS A TRICK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body height="100%" style="background-image: url('trick.jpg');
background-size: cover;">

<div class="container" style="height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;">

  <div class="jumbotron" id="fadebaby" style="background-color: rgba(0,0,0,.5); box-shadow: 10px 10px 5px grey;">
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <div class="row">
        <div class="col-sm-2">
  </div>
                  <div class="col-sm-8" >
            <center> <img src="photo/act1.jpg"  class= "img-responsive"></center>
           

</div>
<div class="col-sm-2">
  </div>
</div>

    <form class="form-horizontal" action="game.php" method="post">
    <div class="form-group">
      <div class="col-sm-2"></div>
      <div class="col-sm-8" style="padding: 10%;">
        <input class="form-control" id="focusedInput" type="text" name="mindans" value="abc" style="display: none;">
         <input class="form-control" id="focusedInput" type="text" name="act1" value="abc" style="display: none;">
    
    

        
        <center><button type="submit" class="btn btn-primary">NEXT</button></center>
      <br>
      <br>
      
      </div>
       <div class="col-sm-2"></div>
    </div>
  </form>
  <center><a href = "logout.php" ><button type="" class="btn btn-primary">LOGOUT</button></a></center>
  </div>
  
</div>
<<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"
>
  
$(document).ready(function(){
    $("#fadebaby").hide();

function showpanel() {     
   
    $("#fadebaby").fadeIn(5000);
 }

 // use setTimeout() to execute
 setTimeout(showpanel, 3000)



});



</script>

</body>
</html>
