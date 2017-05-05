<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MarvelMarks</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Imported CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

    <!-- Custom CSS -->
	  <link rel="stylesheet" type="text/css" href="css/thumnbnail.css"/>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>

	  <!-- Custom JS -->
	  <script src="js/marvelmarks.js" type="text/javascript"></script>

	<noscript>
		<h3>This website requires the use of Javascript to function properly. Please
		consider using another browser/configuration.</h3>
	</noscript>

</head>

<body>

<?php
	session_start();

	$username;

	if(!($_SESSION['username']))
	{
		die("You must be logged in to access this page! Please <a href='login.html'>login here.</a>");
	}
	else
	{
		$username = $_SESSION['username'];
	}

	//create connection to db to retrieve user bookmarks later
	$hostname = "localhost";
	$dbloginusername = "root";
	$dbloginpassword = "replacepass2";

	$conn = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
	mysql_select_db("MarvelMarks") or die("Could not find specified database!");

  //retrieve user bookmarks, create boxes, create screenshots in boxes
  // $query = "SELECT url FROM URL where id=$username.id";
  // $result = $conn->query($query);
  //
  // if ($result->num_rows > 0)
  // {
  //   while ($row = $result->fetch_assoc())
  //   {
  //     $url = $row['url'];
  //     echo
  //     '<script src="js/html2canvas.js" type="text/javascript"></script>',
  //     '<script src="js/marvelmarks.js" type="text/javascript"></script>',
  //     $thumbnail = 'getScreenshot()',
  //     '<div class="col-md-3 portfolio-item">'
  //       '<a href="#">'
  //         '<img class="img-responsive" src="http://placehold.it/750x450" alt="">'
  //       '</a>'
  //     '</div>'
  //     ;
  //   }
  // }
?>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">MarvelMarks</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<button type="button" id="" data-toggle="modal" data-target="#myModal">Add URL</button>
						</li>
						<li>
							<a href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Content -->
		<div class="container">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Welcome Back, <?php echo $_SESSION['username'] ?>.
					</h1>
				</div>
			</div>
			<!-- /.row -->

			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="js/screenshot.png" alt="">
					</a>
				</div>
				<?php
					$query = mysql_query("SELECT url FROM URL WHERE URL.id == Users.id");
				?>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
			</div>
			<!-- /.row -->

			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
			</div>
			<!-- /.row -->

			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
					</a>
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Pagination -->
			<div class="row text-center">
				<div class="col-lg-12">
					<ul class="pagination">
						<li>
							<a href="#">&laquo;</a>
						</li>
						<li class="active">
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">5</a>
						</li>
						<li>
							<a href="#">&raquo;</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- /.row -->

			<hr>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Contribute to the Development of this Web Application on <a href="https://github.com/RaxEmRemy/MarvelMarks">GitHub</a></p>
					</div>
				</div>
				<!-- /.row -->
			</footer>

		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bookmark a New Website</h4>
      </div>
      <div class="modal-body">
        <form action = 'php/addURL.php' method='POST'>
				URL: <input type='url' name='addedURL'><br>
				<input type='submit' value='Submit'>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

</div>
</div>

</body>

</html>
