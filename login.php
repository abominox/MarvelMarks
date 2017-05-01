<?php
	session_start();


	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);
	
	if ($username && $password)
	{
		$hostname = "localhost";
		$dbloginusername = "root";
		$dbloginpassword = "3a92a667";
		$connect = mysqli_connect("$hostname", "$dbloginusername", "$dbloginpassword", 'MarvelMarks') or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
	//	mysql_select_db("MarvelMarks") or die("Could not find specified database!");
		$search="SELECT * FROM Users WHERE username='$username'";
	//	$query = mysql_query("SELECT * FROM Users WHERE username='$username'");
		$query= mysqli_query($connect, $search);
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
					header('Location: index.php');
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
