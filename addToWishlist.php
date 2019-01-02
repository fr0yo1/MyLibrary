<?php session_start();?>
<?php
require ('Managers/WhishlistManager.php');
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
$result = WhishlistManager::addToWishilist($_SESSION['user_id'],$id,$quantity);

if ($result["finishedSuccessfully"] == 1) {
	echo $result["onSuccesMessage"];
} else {
	echo $result["onErrorMessage"];
}
?>