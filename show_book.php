<?php session_start();?>
<?php
	require ("Managers/UserManager.php");
    require ("Managers/BooksManager.php");
	
	$booksPerPage = 12;
	$book_id;
	
	if (isset($_GET["id"])) {
		$book_id = $_GET["id"];
	} else {
		echo "no book selected";
	}
	$book = BooksManager::selectBook($book_id);
	
	$isAdmin = false;
	if (isset($_SESSION['user_id'])) {
		$isAdmin = UserManager::isAdmin($_SESSION['user_id']);
	}
	
	$page_content = "book_page.php";
	include('master_page.php');
?>
