<?php
	require('../config/config.php');
	require('../config/db.php');
 
	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		$empname = mysqli_real_escape_string($conn, $_POST['empname']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);
        $deptCode = mysqli_real_escape_string($conn, $_POST['deptCode']);
        $loc = mysqli_real_escape_string($conn, $_POST['loc']);

        $query = "INSERT INTO employee(empid, empname, pwd, dob, deptid, loc) 
		SELECT * FROM(SELECT '$empid', '$empname', '$pwd', '$dob', '$deptCode', $loc) AS tmp 
		WHERE NOT EXISTS (SELECT * FROM employee WHERE empid='$empid')
		LIMIT 1";

		if(mysqli_query($conn, $query)){
			header('Location: '.'http://localhost/phpsandbox/Website2/admin/index.php'.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>NHPC</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		</head>
	<body>
	<div class="jumbotron text-center">
		<h2>Employee Sign Up</h2>
	</div>
		<div class="container">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label>Employee ID</label>
					<input type="text" name="empid" class="form-control">
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="empname" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="pwd" class="form-control">
				</div>
				<div class="form-group">
					<label>Date of Birth</label>
					<input type="date" name="dob" class="form-control">
				</div>
	            <div class="form-group">
	                <label for="deptCode">Select Department Code:</label>
	                <select class="form-control" name="deptCode" id="deptCode">
	                    <option value="jba">JBA</option>
	                    <option value="caa">CAA</option>
	                    <option value="cba">CBA</option>
	                </select>
	            </div>
	            <div class="form-group">
	                <label for="loc">Select Location:</label>
	                <select class="form-control" name="loc" id="loc">
	                    <option value=100>Head Office</option>
	                    <option value=105>State Office</option>
	                    <option value=110>Subsidiary</option>
	                </select>
	            </div>
	            <br>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</form>
		</div>
		<br>
		<br>
		<div class="panel panel-info">
    		<div class="panel-heading"><b>NHPC</b></panel>
    		<div class="panel-body">Visit Us: <a href="http://www.nhpcindia.com/">@nphcindia</a></div> 
		</div>
		<script
  			src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"
  			integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  			crossorigin="anonymous">
  		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</body>
</html>

