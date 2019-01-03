<?php session_start();?>
<?php
require ('Managers/BooksManager.php');

$id;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
	$id = null;
}

$result = BooksManager::removeBook($id);

$_SESSION['post_data_result'] = $result;

if ($result["finishedSuccessfully"] == 1) {
	header("Location: show_books.php");
} else {
	header("Location: show_book.php?id=$id");
}
?>
