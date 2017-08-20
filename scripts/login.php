<?php
	ob_start();
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
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
		if(empty($password)){
			?>
				<script type="text/javascript">
					window.alert("Password cannot be blank");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}

		//Check if valid
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

		//Database variables for 000webhostpApp
		$servername = "localhost";
		$serveruser = "id2187064_brianokinyi";
		$serverpass = "12345678";
		$dbname = "id2187064_my_portfolio";

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
				header("location:../employer.php");
			}else{
				?>
				<script type="text/javascript">
					window.alert("Passwords and email do not match");
				</script>
				<?php
				header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
				die();
			}
		}else{
			?>
				<script type="text/javascript">
					window.alert("Your email is not registered. Please Signup to continue");
				</script>
			<?php
			header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
			die();
		}
	}

?>