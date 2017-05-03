<?php
	session_start();
	$url = strip_tags($_POST['addedURL']);
	//$date = date("Y-m-d H:i:s");

	//open db
	$hostname = "localhost";
	$dbloginusername = "root";
	$dbloginpassword = "mirror2013";
	$connect = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
	mysql_select_db("MarvelMarks");


	$userID = mysql_query("SELECT id FROM Users WHERE Users.username == '$_SESSION['username']'");
	echo $_SESSION['username'];
	echo userID;

	//"NOW()" gets the current date and time
	$queryreg = mysql_query("INSERT INTO URL(id, url, date) VALUES ('$userID', '$url', NOW())");
	die();

	//encrypt entered URL


	//store encrypted URL in DB, along with ID of user adding it
?>
