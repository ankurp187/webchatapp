<?php
include('db.php');
session_start();

if(isset($_POST["login"] )){
	$Username = $_POST["username"];
	$Password = $_POST["pass"];	
	
	if(empty($Username)||empty($Password)){
		echo 'Fill all Fields';
	}else{
		$Query = "SELECT * FROM register WHERE username='$Username' AND password='$Password' ";
		$stmt = $pdo->query($Query);
		while($row = $stmt->fetch()){
			$_SESSION['Id'] = $row['id'];
			$_SESSION['Username'] = $row['username'];
		}
		header("Location:index.php");
	}
}


?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
	<?php if(isset($_SESSION['Id'])){header("Location:index.php");} ?>
	
	<div class="container">
		
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<h1>Login</h1>
				<div class="text-center"> <a href="register.php">Not registered yet?</a> </div>
				<form style="margin:20px 0;" action="login.php" method="post">
					<div class="form-group">
						<label for="username">Username:</label>
						<input class="form-control" type="text" name="username" placeholder="username" id="username">
					</div>
					<div class="form-group">
						<label for="Password">Password:</label>
						 <input class="form-control" type="password" name="pass" placeholder="password" id="Password">
					</div>
					<button class="btn btn-success btn-block" type="submit" value="submit" name="login">Submit</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>