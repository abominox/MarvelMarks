<?php
	session_start();


	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);

	if ($username && $password)
	{
		$hostname = "localhost";
		$dbloginusername = "root";
		$dbloginpassword = "mirror2013";
		$connect = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
		mysql_select_db("MarvelMarks") or die("Could not find specified database!");

		$query = mysql_query("SELECT * FROM Users WHERE username='$username'");

		$numrows = mysql_num_rows($query);

		if ($numrows != 0)
		{
			while ($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				//check to see if they match
				if ($username == $dbusername && password_verify($password, $dbpassword))
				{
					//regenerate pwd hash
					//$queryreg = mysql_query("INSERT INTO Users(id, username, password, email, date) VALUES ('', '$username','$password', '$email', '$date')");

					//found corresponding user/pass in MySQL server, redirect to index.php
					header('Location: home.php');
					$_SESSION['username'] = $username;
				}
				else
				{
					echo ("Incorrect Username/Password");
				}
			}
		}
		else
		{
			die("That user does not exist!");
		}
	}
	else
	{
		//change this later to be a scripted, Android toast like notification, and have it appear on index.php instead
		die("Please enter a username and a password:");
	}
?>
