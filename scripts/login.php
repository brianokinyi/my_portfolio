<?php
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		//Check if empty
		if(empty($email)){
			die("Email cannot be blank");
		}
		if(empty($password)){
			die("Password cannot be blank");
		}

		//Check if valid
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp, $email)){
			$error_message .= "The email you entered does not seem to be valid";
		}

		//Connect to database
		$servername = "localhost";
		$serveruser = "root";
		$serverpass = "";
		$dbname = "my_portfolio";

		$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);
		//If connected successfully
		if($conn->connect_error){
			die("Error while connecting to database: <b>".$conn->connect_error."<b>");
		}

		//Fetch and confirm details
		$sql = "SELECT password  FROM clients WHERE email='$email'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$hash = $row['password'];

			//Verify password
			if(password_verify($password, $hash)){
				header("refresh:1;url=../index.html");
			}else{
				echo "Passwords do not match";
				header("refresh:2;url=../signup.html");
			}
		}else{
			echo "Your email is not registered. Please Signup to continue";
			header("refresh:2;url=../signup.html");
		}
	}

?>