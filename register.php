<?php 
include "connection.php";
session_start();

if($_POST['submit']=="register"){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];

	$containsSmallalphabet  = preg_match('/[a-zA-Z]/',    $pass);
	$containsDigit   = preg_match('/\d/',          $pass);


	if($email=="" or $pass=="" or $cpass==""){
		$_SESSION['error']="Please fill in all the details";
		header("Location:regBox.php");
	}
	else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error'] = "Invalid email format";
			header("Location:regBox.php");
		}
		elseif(!$containsSmallalphabet || !$containsDigit || strlen($pass)<6 || strlen($pass)>18 ) {
			$_SESSION['error'] = "Password must contain one alphabet, one numerical digit and must be exactly 6-18 characters long";
			header("Location:regBox.php");
		}
		elseif($pass!=$cpass){
			$_SESSION['error'] = "Password must match with Confirm Password.";
			header("Location:regBox.php");
		}
		else{
			$search="SELECT * FROM userbasicinfo where email='$email'";
			$searchresult=mysql_query($search,$connection);
			if(mysql_num_rows($searchresult)==0){
				$query="INSERT INTO userbasicinfo (email,pass) VALUES ('$email','$pass')";
				$result=mysql_query($query,$connection);
				if($result === false){
					echo "Temporary Database Error. Please Try Again";
				}
				else{
					$_SESSION['error']="<div style='color:green;'> Successfully Registered. </div> Please login Now to continue";
					header("Location:loginBox.php");
				}
			}
			else{
					$_SESSION['error'] = $email. " is already registered";
					header("Location:regBox.php");
			}
		}
	}
}
?>