<?php
	require('../config/config.php');
	require('../config/db.php');

	// Check For Submit
	if(isset($_POST['login'])){
		session_start();

		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		
		$query = "SELECT empid, deptid, loc FROM employee WHERE empid = '$empid' AND pwd = '$pwd'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$_SESSION['empid'] = $row['empid'];
			$_SESSION['deptid'] = $row['deptid'];
			$_SESSION['loc'] = $row['loc'];

			//Redirect after fetching session vars
			header('Location: '.'http://localhost/phpsandbox/Website2/admin/adminindex.php'.'');
		} else {
			//the username and password are incorrect so set error message
			?>
			<div class="alert alert-warning">
  			No such user exists! You should first <a href="signup.php" class="alert-link">sign up</a>.
			</div>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="uza - Model Agency HTML5 Template">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>NHPC Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<a href="../admin/index.php"><button class="login100-form-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="login100-form validate-form">
					<span class="login100-form-title">
						Employee Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Employee ID is required">
						<input class="input100" type="text" name="empid" placeholder="Employee ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pwd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>