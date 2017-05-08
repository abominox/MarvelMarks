<?php 
	$hostname = "localhost";
	$dbloginusername = "root";
	$dbloginpassword = "replacepass2";
//	$connect = mysqli_connect($hostname, $dbloginusername, $dbloginpassword, "MarvelMarks");


	$to = $_POST['email'];
	$sql = "alter somethere where";
//	$result = ($connect, $sql);
	$from = "admin@olonni.com";
	$subject = "Marvel Marks Password Reset";
	$headers = "From: $from";
	
	$msg = "Click here";
//	$ok = @mail($to, $subject, $msg, $headers, "-f".$from);
	echo "You should recieve an email in 5-10 minutes on instructions to reset your password. You will be redirected back to the home screen.";
	header("refresh:5; url=index.html");

?>
