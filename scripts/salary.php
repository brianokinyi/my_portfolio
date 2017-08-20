<?php
	//Session
	session_start();
	ob_start();

	if(isset($_POST['submit'])){
		$basic = $_POST['basic'];
		$allowances = $_POST['allowances'];
		$deductions = $_POST['deductions'];
		$net = 0;
		$description = $_POST['description'];

		//Get session variables
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];

		if(empty($basic)){
			?>
				<script type="text/javascript">
					window.alert("Basic salary cannot be blank");
				</script>
			<?php
				header("refresh:1;url=https://brianokinyi.000webhostapp.com/employer.php");
				die();
		}elseif(empty($allowances)){
			?>
				<script type="text/javascript">
					window.alert("Allowances cannot be blank");
				</script>
			<?php
				header("refresh:1;url=https://brianokinyi.000webhostapp.com/employer.php");
				die();
		}elseif(empty($description)){
			?>
				<script type="text/javascript">
					window.alert("Please provide a short description before proceeding");
				</script>
			<?php
				header("refresh:1;url=https://brianokinyi.000webhostapp.com/employer.php");
				die();
		}

		//Calculate net pay
		$net = $basic + $allowances - $deductions;

		//Database variables for 000webhostpApp
		$servername = "localhost";
		$serveruser = "id2187064_brianokinyi";
		$serverpass = "12345678";
		$dbname = "id2187064_my_portfolio";

		/*
		$servername = "localhost";
	    $serveruser = "root";
	    $serverpass = "";
	    $dbname = "my_portfolio";
	    */

		//Connect to database
		$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);
		//Check connection
		if($conn->connect_error){
			die("Connection to database failed: ".$conn->connect_error);
		}

		//Store values
		$sql = "INSERT INTO salary(username, email, basic_pay, allowances, deductions, net_pay, description)
			VALUES('$username', '$email', '$basic', '$allowances', '$deductions', '$net', '$description')";

		//Check if not successful
		$result = $conn->query($sql);
		if($result == TRUE){
			?>
				<script type="text/javascript">
					window.alert("Thank You. I will contact you soon");
				</script>
			<?php
			$email_to = "brianokinyi.bo@gmail.com";
			$email_from = $email;
			$email_subject = "Database activity at 000webhostpApp";

			$email_message = "Name: $username"."\n";
			$email_message .= "Email:</b> $email"."\n";
			$email_message .= "Basic Salary: $basic"."\n";
			$email_message .= "Allowances: $allowances"."\n";
			$email_message .= "Deductions: $deductions"."\n";
			$email_message .= "Net Salary: $net"."\n";
			$email_message .= "Description: $description"."\n";

			// create email headers
			$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();

			//Send email
			@mail($email_to, $email_subject, $email_message, $headers);
			header("refresh:0;url=https://brianokinyi.000webhostapp.com");
			session_unset();
			session_destroy();
		}
	}



	/*
		//Database variables for 000webhostpApp
		$servername = "localhost";
		$serveruser = "id2187064_brianokinyi";
		$serverpass = "12345678";
		$dbname = "id2187064_my_portfolio";
	*/
?>


