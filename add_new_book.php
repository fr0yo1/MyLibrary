<?php session_start();?>
<?php
require ('Managers/BooksManager.php');

$title;
$author;
$quantity;
if (isset($_POST["title"])) {
    $title = $_POST["title"];
} else {
	$title = null;
}

if (isset($_POST["author"])) {
    $author = $_POST["author"];
} else {
	$author = null;
}

if (isset($_POST["quantity"])) {
    $quantity = $_POST["quantity"];
} else {
	$quantity = null;
}

$result = BooksManager::addNewBook($title,$author,$quantity);

$_SESSION['post_data_result'] = $result;
header("Location: show_books.php");
?>
