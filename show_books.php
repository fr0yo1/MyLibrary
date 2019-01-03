<?php session_start();?>
<?php
    require ("Managers/UserManager.php");
    require ("Managers/BooksManager.php");
	
	
	$booksPerPage = 12;
	$books =  array();
	$search_input = "";
	if (isset($_GET["search"]) && $_GET["search"]!= '') {
		$search_input = $_GET["search"];
		$books = BooksManager::searchBooks($search_input);
	} else {
		$books = BooksManager::allBooks();
	}

	$pagenumber = 1;
	if (isset($_GET["page"])) {
		$pagenumber = $_GET["page"];
	}
	$totalNumberOfBooks = count($books);

	$numberOfPages = $totalNumberOfBooks/ $booksPerPage;
	
	$books = array_slice($books, ($pagenumber - 1) * $booksPerPage, $booksPerPage);
	
	$isAdmin = false;
	if (isset($_SESSION['user_id'])) {
	$isAdmin = UserManager::isAdmin($_SESSION['user_id']);
	}
	
	$page_content = "books_page.php";
	include('master_page.php');
?>
