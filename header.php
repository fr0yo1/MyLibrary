<!DOCTYPE html>
<html>
<head>
<title>MyLibrary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MyLibrary</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Browse</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="show_books.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
	<ul class="nav navbar-nav navbar-right">
		<?php
			if (!isset($_SESSION["islogged"]) || $_SESSION["islogged"] == false ) {
				echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
			} else {
				echo "<li><a href='#'> {$_SESSION['username']} </a></li>";
				echo "<li><a href = 'logout.php'>Sign Out</a></li>";
			}				
		?>
    </ul>
  </div>
</nav>