<?php session_start();?>
<?php
require ('Managers/BooksManager.php');
$id;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
	echo "error : no book id";
}

if (!isset($_SESSION['islogged']) || $_SESSION['islogged'] == false ) {
	header('Location: login.php');
	return;
}
$quantity = 1;
$result = BooksManager::addToWishilist($_SESSION['user_id'],$id,$quantity);
$_SESSION['post_data_result'] = $result;
header("Location: show_book.php?id=$id");
?>