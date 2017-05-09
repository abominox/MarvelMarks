<html>

<body>

<h1>Get Your Shit Together Chris, This Fucking Sucks Dude.</h1>

<?php

//create connection to db to retrieve user bookmarks later
$hostname = "localhost";
$dbloginusername = "root";
$dbloginpassword = "replacepass2";

$link = mysqli_connect("$hostname", "$dbloginusername", "$dbloginpassword", "MarvelMarks")
or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");

$id_query = "SELECT id FROM Users WHERE username = 'popman183'";
$id_result = $link->query($id_query);
$id_row = $id_result->fetch_assoc();
echo $id_row['id'];

$site_query = "SELECT * FROM URL WHERE id = 7 ORDER BY `URL`.`dateAdded` DESC";

$site_result = $link->query($site_query);
if ($site_result->num_rows > 0)
{
  while ($site_row = $site_result->fetch_assoc())
  {
    echo $site_row['id'];
    echo $site_row['url'];
  }
}

?>

</body>

</html>
