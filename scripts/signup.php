<?php
	ob_start();
	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		//Check if empty
		if(empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($password2)){
			echo ("You need to fill all the fields.");
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}

		$error_message = "";
		//Expected characters in an email
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp, $email)){
			?>
				<script type="text/javascript">
					window.alert("The email you entered does not seem to be valid");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
		//Expected characters in a name
		$string_exp = "/^[A-Za-z .'-]+$/";
		if(!preg_match($string_exp, $firstname)){
			?>
				<script type="text/javascript">
					window.alert("Your First Name does not seem to be valid");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
		if(!preg_match($string_exp, $lastname)){
			?>
				<script type="text/javascript">
					window.alert("Your Last Name does not seem to be valid");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
		//Password mismatch
		if($password != $password2){
			?>
				<script type="text/javascript">
					window.alert("Password do not match");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
		//Short password
		if($password === $password2 && strlen($password)<8){
			?>
				<script type="text/javascript">
					window.alert("Your Password is too short. Use at least 8 characters");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}

		//Send message
		if(strlen($error_message) > 0){
			echo $error_message;
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}

		//Connect to database
		$servername = "localhost";
		$serveruser = "root";
		$serverpass = "";
		$dbname = "my_portfolio";

		$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);
		//Check connection
		if($conn->connect_error){
			echo ("Error while connecting to database".$conn->connect_error);
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}

		//Hash password using bcrypt
		$hash = password_hash($password, PASSWORD_BCRYPT);

		$sql = "INSERT INTO clients(firstname, lastname, email, password)
			VALUES('$firstname', '$lastname', '$email', '$hash')";
		if($conn->query($sql) == TRUE){
			?>
				<script type="text/javascript">
					window.alert("Thank you for subscribing to my services");
				</script>
			<?php
		}
		$username = $firstname." ".$lastname;
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;
		header("location:../employer.php");
	}
?>