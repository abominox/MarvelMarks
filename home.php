<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The MarvelMarks Bookmark Manager">

    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

    <!-- Bootstrap Template CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

    <!-- Bootstrap Imported JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/home.css"/>

	  <!-- Custom JavaScript -->
    <script src="vendor/html2canvas.js" type="text/javascript"></script>
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
		die("You must be logged in to access this page! Please <a href='index.html'>login here.</a>");
	}
	else
	{
		$username = $_SESSION['username'];
	}

  //create connection to db to retrieve user bookmarks later
  $hostname = "localhost";
  $dbloginusername = "root";
  $dbloginpassword = "replacepass2";

  $link = mysqli_connect("$hostname", "$dbloginusername", "$dbloginpassword", "MarvelMarks")
  or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");

  $id_query = "SELECT id FROM Users WHERE username = '$username'";
  $id_result = $link->query($id_query);
  $id_row = $id_result->fetch_assoc();
  $user_id = $id_row['id'];

  $site_query = "SELECT * FROM URL WHERE id = '$user_id' ORDER BY `URL`.`dateAdded` DESC";

  $site_result = $link->query($site_query);
  if ($site_result->num_rows > 0)
  {
    while ($site_row = $site_result->fetch_assoc())
    {
      echo $site_row['id'];
      echo $site_row['url'];

      echo '<div class="row">';
      echo '<div class="col-md-3 portfolio-item">';
      echo '<a href="'.$row['url'].'"><img class="img-responsive" src="http://xiostorage.com/wp-content/uploads/2015/10/test.png" alt="http://placehold.it/750x450"></a>';
      echo '</div>';
      echo '</div>';

      $result_count++;
    }
  }

      //code to get the title of the webpage
      // $urlContents = file_get_contents($url);
      // preg_match("/<title>(.*)<\/title>/i", $urlContents, $matches);
      // $page_title = $matches[1];

      //handle pagination here

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
    }
  }
  else
  {
    //add code here for if the user has not added any bookmarks yet
  }
?>

    <title><?php echo $_SESSION['username'] . "'s Bookmarks";; ?></title>

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
          <div class="navbar-brand">
            MarvelMarks
          </div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
            <li>
              <a href="#" data-toggle="modal" data-target="#addURLModal">Add URL</a>
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
						<!--
            <p>Contribute to the Development of this web application on
            <a href="https://github.com/RaxEmRemy/MarvelMarks">GitHub</a>
            <img src="https://cdn1.iconfinder.com/data/icons/iconza-circle-social/64/697061-github-128.png" height="" width=""></p>
            -->
					</div>
				</div>
				<!-- /.row -->
			</footer>

		</div>
		<!-- /.container -->

    <!-- Add URL Modal -->
		<div id="addURLModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Bookmark a New Website</h4></center>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action = "php/addURL.php" method="POST">
            <label for="exampleInputEmail1">Site to Add:</label>
            <center><input type="url" name="addedURL" class="form-control" aria-describedby="emailHelp" placeholder="Enter URL"></center>
            <center><small class="form-text text-muted">We support most types of websites and web protocols.</small></center>
            </br>
            <center><button name="submit" type="submit" class="btn btn-primary">Submit</button></center>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

</div>
</div>

</body>

</html>
