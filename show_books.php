<?php session_start();?>
<?php
    require ("Managers/BooksManager.php");
	$search_input = $_GET["search"];
	$books = BooksManager::searchBooks($search_input);
	$page_content = "books_page.php";
	include('master_page.php');
?>
