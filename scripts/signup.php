<?php
	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		//Check if empty
		if(empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($password2)){
			die("You need to fill all the fields.");
		}

		$error_message = "";
		//Expected characters in an email
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp, $email)){
			$error_message .= "The email you entered does not seem to be valid";
		}
		//Expected characters in a name
		$string_exp = "/^[A-Za-z .'-]+$/";
		if(!preg_match($string_exp, $firstname)){
			$error_message .= "Your First Name does not seem to be valid";
		}
		if(!preg_match($string_exp, $lastname)){
			$error_message .= "Your Last Name does not seem to be valid";
		}
		//Password mismatch
		if($password != $password2){
			$error_message .= "Your Password do not match";
		}
		//Short password
		if($password === $password2 && strlen($password)<8){
			$error_message .= "Your Password is too short. Use at least 8 characters";
		}

		//Send message
		if(strlen($error_message) > 0){
			die("I am sorry but you have an error in your form.".$error_message);
		}

		//Connect to database
		$servername = "localhost";
		$serveruser = "root";
		$serverpass = "";
		$dbname = "my_portfolio";

		$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);
		//Check connection
		if($conn->connect_error){
			die("Error while connecting to database".$conn->connect_error);
		}

		//Hash password using bcrypt
		$hash = password_hash($password, PASSWORD_BCRYPT);

		$sql = "INSERT INTO clients(firstname, lastname, email, password)
			VALUES('$firstname', '$lastname', '$email', '$hash')";
		if($conn->query($sql) == TRUE){
			echo "Thank you for subscribing to my services.";
		}

		header("refresh:1;url=../employer.php");
	}
?>