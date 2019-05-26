<?php
include('db.php');
session_start();

$page = $_SERVER['PHP_SELF'];
$sec="5";
?>

<html>
<head>
<title>Webapp</title>
<!--<meta http-equiv="refresh" content="<?php// echo $sec ?>;URL='<?php// echo $page ?>'">-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
	<?php if(!isset($_SESSION['Id'])){header("Location:login.php");} ?>
	<div class="container">
	<div class="row">
	<div class="col-sm-7">
	<h1><?php echo "Welcome ".$_SESSION['Username']; ?></h1>
	<a href="logout.php"> <span class="btn btn-info" style="float:right;">Logout</span> </a>
	<div style="margin:50 0;" class="table-responsive">
	<table class="table table-striped table-hover">
	<tr>
	<th>ID</th>
	<th>Username</th>
	<th>Chat</th></tr>
	<?php
		
		$Query = "SELECT * FROM register WHERE id!={$_SESSION['Id']}";
		$stmt = $pdo->query($Query);
		while($row = $stmt->fetch()){
	?>
	<tr>
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['username'] ?></td>
	<td> <a href="chat.php?id=<?php echo $row['id'] ?>"> <span class="btn btn-info">Chat</span> </a> </td>
	</tr>
	<?php } ?>
	</table>
	
	</div>
	</div>
	<div class="col-sm-offset-1 col-sm-4">
	<form style="margin:50% 0;" action="feedback.php" method="post">
	<textarea style="margin:20px 0" class="form-control" name="feedback" id="f_id" cols="30" rows="10"></textarea>
	<button class="btn btn-info btn-block" type="submit" value="submit" name="f_send">Feedback</button>
	</form>
	</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
	
</body>



</html>