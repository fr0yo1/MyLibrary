<?php session_start();?>
<?php
	$booksPerPage = 12;
    
    require ("Managers/BooksManager.php");
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
	$rest = 1;
	if ($totalNumberOfBooks % $booksPerPage == 0) {
		$rest= 0;
	}
	
	$numberOfPages = $totalNumberOfBooks/ $booksPerPage + $rest ;
	
	$books = array_slice($books, ($pagenumber - 1) * $booksPerPage, $booksPerPage);
	
	$page_content = "books_page.php";
	include('master_page.php');
?>
