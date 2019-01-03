<!DOCTYPE html>
<html>
<head>
<title>MyLibrary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MyLibrary</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="show_books.php">Browse</a></li>
	  <li><a href="contact.php">Contact</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="show_books.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
	<ul class="nav navbar-nav navbar-right">
		<?php
			if (!isset($_SESSION["islogged"]) || $_SESSION["islogged"] == false ) {
				echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
				echo "<li><a href='signup.php'><span class='glyphicon glyphicon-log-in'></span> Sing Up</a></li>";
			} else {
				echo "<li><a href='show_profile.php'> {$_SESSION['username']} </a></li>";
				echo "<li><a href = 'logout.php'>Sign Out</a></li>";
			}				
		?>
    </ul>
  </div>
</nav>