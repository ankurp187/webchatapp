<?php
include('db.php');
session_start();

$dateFormat="%B-%d-%Y %H:%M:%S";
$DateTime = strftime("%B-%d-%Y %H:%M:%S",time()) ;
//echo $DateTime;
$Receiver = $_GET['id'];
$Sender = $_SESSION['Id'];
$Message = $pdo->quote($_POST['message']);
echo $Sender;
echo $Receiver;

if(strlen($Message)>2){
	$Query = "CREATE TABLE IF NOT EXISTS chat(m_id INT AUTO_INCREMENT PRIMARY KEY,sender VARCHAR(50),receiver VARCHAR(50),message VARCHAR(500),datetime VARCHAR(50),status INT)";
	$pdo->query($Query);

	$Query = "INSERT INTO chat(sender,receiver,message,datetime,status) VALUES('$Sender','$Receiver',$Message,'$DateTime',0)";
	$pdo->query($Query);
	header("Location:chat.php?id={$Receiver}");
}


?>