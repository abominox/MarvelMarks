<?php
	session_start();


	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);

	if ($username && $password)
	{
		$hostname = "localhost";
		$dbloginusername = "root";
		$dbloginpassword = "replacepass2";
		$connect = mysqli_connect("$hostname", "$dbloginusername", "$dbloginpassword", 'MarvelMarks') or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
		$search="SELECT * FROM Users WHERE username='$username'";
		$query= mysqli_query($connect, $search);
		$numrows = mysqli_num_rows($query);
//		mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
//		mysql_select_db("MarvelMarks") or die("Could not find specified database MarvelMarks! Error: " . mysql_error());

//		$query = mysql_query("SELECT * FROM Users WHERE username='$username'");

//		$numrows = mysql_num_rows($query);

		if ($numrows != 0)
		{
			while ($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				//check to see if they match
				if ($username == $dbusername && password_verify($password, $dbpassword))
				{
					//regenerate pwd hash
					//$queryreg = mysql_query("INSERT INTO Users(id, username, password, email, date) VALUES ('', '$username','$password', '$email', '$date')");

					//found corresponding user/pass in MySQL server, redirect to home.php
					header('Location: home.php');
					$_SESSION['username'] = $username;
				}
				else
				{
					echo ("Incorrect Username/Password");
					echo ("\nReturning to login page in 5 seconds...");
					header("refresh: 5; url=index.html");
					die();
				}
			}
		}
		else
		{
			echo ("Incorrect Username/Password");
			echo ("\nReturning to login page in 5 seconds...");
			header("refresh: 5; url=index.html");
			die();
		}
	}
	else
	{
		// echo '<script type="text/javascript">confirm("Please enter a username and password.");</script>';
		//echo '<script type="text/javascript">alert("Please enter a username and password.");</script>';
		// header('Location: index.html');
		echo ("Please enter a username and password.");
		echo ("\nReturning to login page in 5 seconds...");
		header("refresh: 5; url=index.html");
		die();
	}
?>
