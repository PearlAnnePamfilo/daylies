<?php
require_once('config.php');


$username = $_POST['email_address'];
$password = $_POST['password'];

$sql = "SELECT * FROM dayliesdb.users WHERE email_address = ? AND password = ? LIMIT 1";

$stmtselect  = $database->prepare($sql);
$result = $stmtselect->execute([$email_address, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $user;
		echo '1';
	}else{
		echo 'There no user for that combo';		
	}
}else{
	echo 'There were errors while connecting to database.';
}