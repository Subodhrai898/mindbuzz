<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 require_once 'Dboperation.php';
 
 $db = new DbOperation(); 
 $error = "";
 session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']))
{


	if(is_numeric($_POST['rollno']) && strcmp($_POST['password'], $_POST['rpassword'])==0)
	{
           $j = $db->registerUser(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['last']),$_POST['email'],$_POST['phone'],htmlspecialchars($_POST['university']),$_POST['rollno'],$_POST['branch'],$_POST['year'],$_POST['course'],$_POST['password']);
           if($j==0)
           {
           	$error="Successful Register !! LOGIN AGAIN";
           }
           else
           {
           	$error = "NOT REGISTERED Try to Change Email ";
           }
	}
	else
	{
		$error = "NOT REGISTERED as Roll NO OR PASSWORD IS NOT VALID";
	}



 
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rollno']))
{   

    $rollno = $_POST['rollno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $v = $db->login($rollno,$email,$password);

    if(is_numeric($v))
    {
    	$error =  'invalid Credential';
    }else{
    
    $row = $v->fetch_assoc();
    if(!isset($row['level']))
    {
    	$error =  'invalid Credential';
    }else
    {
   $_SESSION["rollno"] = $row['rollno']; 
   $_SESSION["level"] = $row['level'];
   $_SESSION['point'] = $row['points'];
     $error = "Successful";
     header("Location: game.php");

     }
  
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>MindBuzz||UIC</title>
	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Student Matriculate Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
	/>
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<!-- Meta tags -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-ups-->
	<!-- Calendar -->
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- //Calendar -->

	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//style sheet end here-->
	<link href="//fonts.googleapis.com/css?family=Cuprum:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>

<body style="background-image: url('back.jpg')">
	<h1 class="header-w3ls" style="color: #008ecc;">
		University Innovation Cell</h1>
	<div class="icon-stu">
	  <b style="color:red;"> <?php echo $error ?></b>
		<h2 class="student-w3l"> MindBuzz</h2>
		<div class="stude-user-wls">
			<span class="fa fa-user" aria-hidden="true"></span>
			<div class="clear"> </div>
		</div>
		<div class="row-col">
			<div class="banner-agileits-btm">
				<div class="w3layouts_more-buttn">
					<a href="#small-dialog1 " class="play-icon popup-with-zoom-anim">login</a>
				</div>
				<div id="small-dialog1" class="mfp-hide w3ls_small_dialog wthree_pop">
					<div class="agileits_modal_body">

						<!--login form-->
						<div class="newsletter ">
							<h2>Login Form</h2>

							<div class="letter-w3ls">
								<form method="POST" action= "index.php">
>

									<div class="form-left-w3l">

										<input type="text" class="top-up" name="rollno" placeholder="Roll no" required="">
									</div>

									<div class="form-left-w3l">
										<input type="email" name="email" required="" placeholder="Email">
									</div>
									<div class="form-right-w3ls ">

										<input type="password" name="password" placeholder="Password" required="">

									</div>
									<a href="forgotpass.php">Forgot Password </a>
									<div class="btnn">
									<button type="submit">Submit</button><br>
								</div>
								</form>


								<div class="clear"></div>
							</div>
							<!--//login form-->

						</div>
					</div>
                  </div>
				</div>
				<div class="banner-its-btm">

					<div class="outs_more-buttn">
						<a href="#small-dialog2 " class="play-icon popup-with-zoom-anim">Register</a>
					</div>
					<div id="small-dialog2" class="mfp-hide w3ls_small_dialog wthree_pop">
						<div class="agileits_modal_body">

							<!--register form-->
							<div class="student-reg-w3 ">
								<h3>Register Form</h3>
								<div class="letter-w3ls">

									<form action="#" method="post">
										<div class="main">
											<div class="form-left-to-w3l">

												<input type="text" name="name" placeholder="Name" required="">
												<div class="clear"></div>
											</div>
											<div class="form-right-to-w3ls">

												<input type="text" name="last" placeholder="Last Name" required="">
												  <div class="clear"></div>
											</div>
                                             
										</div>
							
								<div class="main">
									<div class="form-left-to-w3l">

										<input type="email" name="email" placeholder="Email" required="">
										  <div class="clear"></div>
									</div>
									<div class="form-right-to-w3ls">

										<input type="text" name="phone" placeholder="Phone Number" required="">
										  <div class="clear"></div>
									</div>
								</div>
								<div class="main">

	 	
					   
			</div>


								<div class="form-add-to-w3ls add">

									<input type="text" name="university" placeholder="University/College" required="">
									  <div class="clear"></div>
								</div>


								<div class="main">
									<div class="form-left-to-w3l">

										<input type="text" name="rollno" placeholder="rollno" required="">
										<div class="clear"></div>
									</div>
									<div class="form-right-to-w3ls">
										<select class="form-control buttom" name="branch" required="">
												<option value="">
												Select Branch</option>
													<option value="CS">Computer Science</option>
													<option value="EC">Electronics</option>
													<option value="EE">Electrical</option>
													<option value="ME">Mechanical</option>
													<option value="CE">Civil</option>
													<option value="CH">Chemical</option>
												<option value="OT">OTHER</option>
								</select>
										<div class="clear"></div>
									</div>
									 
								</div>
								<div class="main">
									
									<div class="form-right-to-w3ls">
										<select class="form-control buttom" name="year" required="">
												<option value="">
												Select Year</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													
												</select>
										
	                                   <div class="clear"></div>
									</div>
								
								</div>
								<div class="form-right-to-w3ls">
										<select class="form-control buttom" name="course" required="">
												<option value="">
												Select Course</option>
													<option value="B.tech">B.tech</option>
													<option value="MCA">MCA</option>
													<option value="MBA">MBA</option>
				
												</select>
										
	                                   <div class="clear"></div>
									</div>
								<div class="form-right-w3ls ">

										<input type="password" name="password" placeholder="Password" required="">

									</div>
									<div class="form-right-w3ls ">

										<input type="password" name="rpassword" placeholder="Repeat Password" required="">

									</div>
								<div class="btnn">
									<button type="submit">Submit</button><br>
								</div>

								</form>
							</div>
						</div>
						<!--//register form-->
                      <b style="color:red"> <?php echo $error ?></b>
					</div>
					<b style="color:red"> <?php echo $error ?></b>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
			<br>
			<br>

			<center><p style="color:red;"> Register with your real details as webmaster has right to disqualify you in case of misleading information. </p></center>
			</div>
			<div class="copy">
				<p>&copy;2018 UIC All Rights Reserved </a></p>
			</div>

			<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>

			<!--scripts-->

			<!--//scripts-->
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<script>
				$(document).ready(function () {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});

				});
			</script>
			<!-- //pop-up-box video -->
			<!-- //js -->
			<!-- Calendar -->
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

 </body>
</html>