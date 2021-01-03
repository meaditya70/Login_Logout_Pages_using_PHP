<?php
	session_start();
	if(isset($_SESSION['userID'])){
		header('Location:index.php');
	}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Login | Infinite Lens</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />

		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		
		<link href="css/norm.css" rel="stylesheet" type="text/css">
		<link href="css/head.css" rel="stylesheet" type="text/css">
		<style>
			*-body{
				
			}
			.logoHere{
				display:block;
				position:relative;
				width:100%;
				
			}
			.logoHere>img{
				position:relative;
				max-width:90%;
			}
			.form{
				display:block;
				position:relative;
				width:300px;
				max-width:80%;
				border-radius:10px;
				box-shadow:0px 0px 20px white;
				margin:10px;
				padding:20px;
				background-color:white;
			}
			input[type="text"],input[type="password"]{
				display:block;
				position:relative;
				width:90%;
				text-align:center;
				padding:7px 12px;
				margin:10px 5px;
				border-radius:5px;
				border:2px solid grey;
				opacity:0.7;
				outline:none;
				background-color:white;
			}
			.secured{
				display:block;
				position:relative;
				width:90%;
				text-align:center;
				padding:7px 12px;
				margin:2px;
				font-size:0.7em;
				font-weight:600;
				color:brown;
				background-color:white;
			}
			.secured>img{
				position:relative;
				vertical-align:middle;
				max-width:90%;
			}
			input{
				position:relative;
				font-size:0.85em;
			}
			
			input[type="image"]{
				display:block;
				position:relative;
				width:60px;
				height:60px;
				border:none;
				border-radius:50%;
				margin:10px;
				margin-top:20px;
				padding:10px;
				box-shadow: 0px 0px 30px steelblue;
			}
			input[type="image"]:hover{
				-webkit-transform: rotateZ(90deg); /* Safari */
				transform: rotateZ(90deg);
				transition:1s ease;
				box-shadow: 0px 0px 30px #00e554;
			}
			.termsText{
				position:relative;
				font-size:0.75em;
				font-weight:300;
				color:grey;
				max-width:90%;
				opacity:0.9;
				margin:5px;
			}
			.termsText>a{
				position:relative;
				text-decoration:none;
				color:steelblue;
				font-weight:600;
				max-width:90%;
			}
			.termsText>a:hover{
				text-decoration:underline;
			}
		</style>
	
	</head>
	<body style="background-color:#070719;">
		
		<div class="head" align="center">
			<a class="logo" style="border:none;vertical-align:top;max-width:90%;" href="index.php"><img src="images/logo.png" height="25px"/></a>
			<div class="menu" id="myTopnav">
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776; | Menu </a>
				<a href="index.php"><img src="icons/home.png" width="10px" >| Home</a>
				<a href="features.php"><img src="icons/features.png" width="10px" >| Features</a>
				<a href="career.php"><img src="icons/work.png" width="10px" >| Work with us</a>
				<a href="about.php"><img src="icons/about.png" id="vm" width="10px" >| About Us</a>
				<a href="contact.php"><img src="icons/contact.png" id="vm" width="10px" >| Contact Us</a>
				<a href="regBox.php" id="login">Register</a>
			</div>
		</div>
		
		<div class="section"  style="padding-top:80px;"  align="center">
			<a href="index.php"><div class="logoHere"><img src='images/logo.png' width='200px'></div></a>
			<div class="form">
				
				<div class="secured"><img src="icons/lock.png" width="160px"></div>
				<h2 style='color:steelblue'>Login</h2>
				<?php
					if(isset($_SESSION['error'])){
						echo "<error style='color:red;font-size:0.8em;'>".$_SESSION['error'].'</error>';
						unset($_SESSION['error']);
					}
				?>
				<form action="login.php" method="post">
					<input type="text" placeholder="Email" name="email">
					<input type="password" placeholder="Password" name="pass">
					<div class="termsText">By clicking the arrow below, you agree to our <a href="">terms</a>.
					<input type="image" name="submit" value="login" src="icons/go.png" />
					<div class="termsText" style="font-size:0.8em;">Don't have an Account? <a href="regBox.php" style="color:green">REGISTER NOW</a></div>
					<div class="termsText" style="font-size:0.9em;"><a href="forgot.php" >Forgot your password?</a></div>
			
				</form>
				
			</div>
			
			
		</div>
		<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "menu") {
				x.className += " responsive";
			} else {
				x.className = "menu";
			}
		}
	</script>
	</body>
</html>
			