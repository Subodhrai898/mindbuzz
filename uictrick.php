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
    
   if(($_SESSION['level']==0))
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

  <div class="jumbotron" style="background-color: rgba(0,0,0,.5); box-shadow: 10px 10px 5px grey;">
       <div class="row">
        <div class="col-sm-4">
  </div>
                  <div class="col-sm-4">
            <center> <img src="logopsd2.png"  class= "img-responsive"></center>
           

</div>
<div class="col-sm-4">
  </div>
</div>

    <form class="form-horizontal" action="game.php" method="post">
    <div class="form-group">
      <div class="col-sm-2"></div>
      <div class="col-sm-8" style="padding: 10%;">
        <input class="form-control" id="focusedInput" type="text" name="mindans" value="">
    

        <center><h4 style="color: white;">Complete the Logo</h4>
          <h4 style="color: white;"> Hint <a href="uiclogo.jpg" style="color: red;">Click Here</a></h4> </center>
   
        <center><button type="submit" class="btn btn-primary">Answer</button></center>
      <br>
      <br>
      <ul style="list-style: none; color: white;">
       <li>Answer it in upperCase with no gap between words</li>
       <li> Concentrate On the story and try to take the snap of it as it will be useful in the next levels.</li> 
       <li> For any issue mail to 10nichols1962@gmail.com </li>
     </ul>
      </div>
       <div class="col-sm-2"></div>
    </div>
  </form>
  <center><a href = "logout.php" ><button type="" class="btn btn-primary">LOGOUT</button></a></center>
  </div>
  
</div>

</body>
</html>
