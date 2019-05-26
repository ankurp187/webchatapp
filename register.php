<?php

include('db.php');
session_start();

if(isset($_POST["register"] )){
	$Register = $_POST["register"];
	$Username = $_POST["username"];
	$Password = $_POST["pass"];
	//print_r($pdo);
	$Query = "CREATE TABLE IF NOT EXISTS register(id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50), password VARCHAR(50))";
	try{$pdo->exec($Query);
	}catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
	}
	
	if(empty($Username)||empty($Password)){
		echo 'Fill all Fields';
	}else{
		$Query = "INSERT INTO register(username,password) VALUES('$Username','$Password')";
		$pdo->query($Query);
		header("Location:login.php");
	}
}



?>

<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
	<?php if(isset($_SESSION['Id'])){header("Location:index.php");} ?>
	
	<div class="container">
		
		<div style="margin:60px 0;" class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<h1>Register</h1>
				<div class="text-center"> <a href="login.php">Already registered?</a> </div>
				<form style="margin:20px 0;" action="register.php" method="post">
					<div class="form-group">
						<label for="username">Username:</label>
						<input class="form-control" type="text" name="username" placeholder="username" id="username">
					</div>
					<div class="form-group">
						<label for="Password">Password:</label>
						 <input class="form-control" type="password" name="pass" placeholder="password" id="Password">
					</div>
					<button class="btn btn-success btn-block" type="submit" value="submit" name="register">Submit</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>