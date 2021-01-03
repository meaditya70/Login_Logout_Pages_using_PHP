<?php 
include "connection.php";
session_start();

$email=$_POST['email'];
$pass=$_POST['pass'];

if($_POST['submit']=="login"){
	if($email==""){
		$_SESSION['error']="Please enter your email";
		header("Location:loginBox.php");
	}
	elseif($email != "" and $pass==""){
		$_SESSION['error']="Please enter your password";
		header("Location:loginBox.php");
	}
	else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error'] = "Invalid email format";
			header("Location:loginBox.php");
		}
		else{
			$query="SELECT * FROM userbasicinfo WHERE email='$email' ";
			$result=mysql_query($query,$connection) or die(mysql_error());
			if(mysql_num_rows($result)<1){
				$_SESSION['error']= $email." is not yet registered"; 
				header("Location:loginBox.php");
			}
			else{
				while($row=mysql_fetch_array($result)){
					if($row['pass']==$pass){
						$_SESSION['userID']=$row['email'];
						header("Location:index.php");
					}
					else{
						$_SESSION['error']="Incorrect password";
						header("Location:loginBox.php");
					}
				}
			}
		}
	}
}




?>