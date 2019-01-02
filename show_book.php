<?php session_start();?>
<?php
	$booksPerPage = 12;
    
    require ("Managers/BooksManager.php");
	$book_id;
	
	if (isset($_GET["id"])) {
		$book_id = $_GET["id"];
	} else {
		echo "no book selected";
	}
	$book = BooksManager::selectBook($book_id);
	
	$page_content = "book_page.php";
	include('master_page.php');
?>
