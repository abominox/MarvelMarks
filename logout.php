<?php
	session_start();
	session_destroy();

	header('Location: index.html');
	//Debug Line
	//echo"You've been successfully logged out!" . "<a href='index.html'> Click here to return.</a>";
?>
