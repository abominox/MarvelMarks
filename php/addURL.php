<?php
	session_start();

	//Imported JavaScript & CSS
	// echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
	// echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>';
	// echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"></script>';

	$url = strip_tags($_POST['addedURL']);

	//open db
	$hostname = "localhost";
	$dbloginusername = "root";
	$dbloginpassword = "replacepass2";
	mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
	mysql_select_db("MarvelMarks");

	$username = $_SESSION['username'];

	$query = mysql_query("SELECT id FROM Users WHERE username = '$username'");
	$row = mysql_fetch_assoc($query);
	$user_id = $row['id'];

	//encrypt entered URL


	//store encrypted URL in DB, along with ID of user adding it

	//"now()" gets the current date, time, year
	$query = mysql_query("INSERT INTO URL (id, url, dateAdded) VALUES ('$user_id', '$url', now())");

	if ($query)
	{
		// echo "<script type = 'text/javascript'>
		// 	toastr.info('TEST');</script>";
		header("Location: ../home.php");
		die();
	}
	else
	{
		echo mysql_error();
		die("FAILED TO ADD URL");
	}
?>
