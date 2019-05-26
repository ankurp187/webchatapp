<?php
include('db.php');
session_start();

?>

<html>
<head>
<title>Webapp</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<?php $receiver = $_GET['id'] ?>
<?php if(!isset($_SESSION['Id'])){header("Location:login.php");} ?>

<div class="container"> 

<div style="margin:60px 0;" class="row">
<div class="col-sm-offset-1 col-sm-4">
	<h1><?php echo "Hello ".$_SESSION['Username']; ?></h1>
	<form action="send.php?id=<?php echo $receiver; ?>" method="post">
	
		<textarea style="margin:20px 0" class="form-control" name="message" id="text" cols="30" rows="10"></textarea>
		<button class="btn btn-info btn-block" type="submit" value="submit" name="send">Send</button>
	
	</form>
	
	</div>
	<div id="Status" class="col-sm-offset-1 col-sm-5">
	<div>
	<a href="logout.php"> <span style="margin:40px 0;float:right;" class="btn btn-danger">Logout</span> </a>
	</div>
		<div  style="margin:70px 0; overflow:scroll; height:400px;" class="table-responsive">
		<table class="table table-striped table-hover">
		<?php
		
		$QueryChat1 = "SELECT * FROM chat WHERE sender={$_SESSION['Id']} AND receiver={$_GET['id']}";
		$stmt1 = $pdo->query($QueryChat1);
		$chat1 = array();
		while($row1 = $stmt1->fetch()){
			$chat1[$row1['datetime']] = array('id'=>$row1['m_id'],'sender'=>$_SESSION['Id'],'message'=>$row1['message']);
		}
		$QueryChat2 = "SELECT * FROM chat WHERE receiver={$_SESSION['Id']} AND sender={$_GET['id']}";
		$stmt2 = $pdo->query($QueryChat2);
		while($row2 = $stmt2->fetch()){
			$chat1[$row2['datetime']] = array('id'=>$row2['m_id'],'sender'=>$_GET['id'],'message'=>$row2['message']);
		}
		ksort($chat1);
		
		foreach($chat1 as $time=>$value){
			if($value['sender'] != $_SESSION['Id'])	{
				?>
				<tr>
					<td width=50%><?php print_r($value['message']); ?></td>
					<td></td>
				</tr>
		<?php 
			}
			if($value['sender'] == $_SESSION['Id']){
				?>
				<tr>
					<td></td>
					<td width=50%><?php print_r($value['message']); ?></td>
				</tr>
			<?php	}	} 	?>
	</table>
	</div>
	</div>
</div>
 </div>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
 <!--<script type="text/javascript">
	var auto_refresh = setInterval(
	function(){
		$('#Status').load('chat.php?<?php echo $receiver; ?>');
	},1000);
 </script>-->
</body>
</html>