<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'email='. $email. '&name='. $name;


	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// password encryption for storing
        $encryp_pass = md5($pass);
		$sqlUser = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sqlUser);
		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Account on this email already exists&$user_data");
	        exit();
		}else {
			$insUser = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$encryp_pass')";
           	$response = mysqli_query($conn, $insUser);
			if ($response) {
				header("Location: signup.php?success=Your account has been created successfully");
				exit();
			}else {
				header("Location: signup.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}