<?php session_start();?>
<?php
    require ("Managers/BooksManager.php");
	$book_id;
	
	if (isset($_GET["id"])) {
		$book_id = $_GET["id"];
	} else {
		echo "no book selected";
	}
	
	$result = BooksManager::removeFromWhislist($_SESSION['user_id'],$book_id);
	$_SESSION['post_data_result'] = $result;
	
	header("Location: show_profile.php");
?>
