<?php
	//Session
	session_start();

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
				header("refresh:0;url=../employer.php");
				die();
		}elseif(empty($allowances)){
			?>
				<script type="text/javascript">
					window.alert("Allowances cannot be blank");
				</script>
			<?php
				header("refresh:0;url=../employer.php");
				die();
		}elseif(empty($description)){
			?>
				<script type="text/javascript">
					window.alert("Please provide a short description before proceeding");
				</script>
			<?php
				header("refresh:0;url=../employer.php");
				die();
		}

		//Calculate net pay
		$net = $basic + $allowances - $deductions;

		//Database variables
		$servername = "localhost";
		$serveruser = "id2187064_brianokinyi";
		$serverpass = "12345678";
		$dbname = "id2187064_my_portfolio";

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
			header("refresh:0;url=../index.html");
			session_unset();
			session_destroy();
		}
	}
?>