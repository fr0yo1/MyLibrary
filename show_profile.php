<?php session_start();?>
<?php
    require ('Managers/UserManager.php');
	require ('Managers/BooksManager.php');

	$user = UserManager::getUser($_SESSION['user_id']);
	
	$wishedBooks = BooksManager::getWishedBooks($_SESSION['user_id']);

	$page_content = "profile_page.php";
	include('master_page.php');
?>
