<?php
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		//Check if empty
		if(empty($email)){
			?>
				<script type="text/javascript">
					window.alert("Email cannot be blank");
				</script>
			<?php
			header("refresh:5;url=../signup.html");
			die();
		}
		if(empty($password)){
			?>
				<script type="text/javascript">
					window.alert("Password cannot be blank");
				</script>
			<?php
			header("refresh:5;url=../signup.html");
			die();
		}

		//Check if valid
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp, $email)){
			$error_message .= "The email you entered does not seem to be valid";
		}
		//Send message
		if(strlen($error_message) > 0){
			echo $error_message;
			header("refresh:5;url=../signup.html");
			die();
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
		$sql = "SELECT * FROM clients WHERE email='$email'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$hash = $row['password'];
			$username = $row['firstname'];
			$username .= " ".$row['lastname'];

			//Verify password
			if(password_verify($password, $hash)){
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['username'] = $username;
				header("refresh:1;url=../employer.php");
			}else{
				echo "Passwords and email do not match";
				header("refresh:2;url=../signup.html");
				die();
			}
		}else{
			echo "Your email is not registered. Please Signup to continue";
			header("refresh:2;url=../signup.html");
			die();
		}
	}

?>