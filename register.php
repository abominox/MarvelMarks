<?php
	$submit = strip_tags($_POST['submit']);
	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
	$email = strip_tags($_POST['email']);
	$repeat_email = strip_tags($_POST['emailConfirm']); //WE DONT DO ANYTHING WITH THIS YET, ADD EMAIL CONFIRM FUNC LATER

	if ($submit)
	{
		if ($username && $password && $repeatpassword && $email && $repeat_email)
		{
			if ($email  != $repeat_email)
			{
				echo "Please make sure your email addresses match.";
				die();
			}
			if ($password == $repeatpassword)
			{
				if (strlen($username) > 25)
				{
					echo "Length of username must not exceed 25 characters!";
					die();
				}
				if (strlen($email) > 50)
				{
					echo "Length of email address must not exceed 50 characters!";
					die();
				}
				else
				{
					if (strlen($password) > 25 || strlen($password) < 6)
					{
						echo "Password must be between 6 and 25 characters!";
						die();
					}
					else
					{
						//open db
						$hostname = "localhost";
						$dbloginusername = "root";
						$dbloginpassword = "replacepass2";

						mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
						mysql_select_db("MarvelMarks") or die("Could not find specified database MarvelMarks!");

						//ensure entered username does not already exist in db
						$namecheck = mysql_query("SELECT username FROM Users WHERE username = '$username'");
						$count = mysql_num_rows($namecheck);
						if ($count > 0)
						{
							die("An account with this username already exists, please enter a new username.");
						}

						//hashing password using bcrypt after successfully registering user
						$password = password_hash($password, PASSWORD_DEFAULT);

						//send data to db
						$query = mysql_query("INSERT INTO Users (id, username, password, email, dateRegistered) VALUES ('', '$username','$password', '$email', now())");

						if ($query)
						{
							die("You have successfully registered for MarvelMarks! <a href='index.html'>Return to login page.</a>");
						}
						else
						{
							die("FAILED TO ADD USER TO MARVELMARKS!");
						}
					}
				}
			}
			else
			{
				echo "Your passwords do not match!";
			}
		}
		else
		{
			echo "Please fill in <strong>all</strong> required fields.";
		}
	}
?>
