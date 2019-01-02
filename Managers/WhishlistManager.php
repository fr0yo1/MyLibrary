<?php
require('DatabaseConfig/dbConfig.php');
class WhishlistManager {
public static function addToWishilist($user_id,$book_id,$quantity) {
	$conn = DatabaseConnection::getDatabaseConnection();
	$sql = "select * from whishlist  where user_id = $user_id and book_id = $book_id";
	$result = mysqli_query($conn,$sql);
	
	$count = mysqli_num_rows($result);
	if ($count == 0 ) {
		$sql = "INSERT INTO whishlist (user_id, book_id, quantity) VALUES ('$user_id', '$book_id', '$quantity')";
	} else {
		$row = mysqli_fetch_assoc($result);
		$oldValue = $row["quantity"];
		$newValue = $oldValue + $quantity;
	    $sql = "UPDATE whishlist SET quantity = $newValue where user_id = $user_id and book_id = $book_id";
	}
	
	$result = mysqli_query($conn,$sql);
	if ($result == 0) {
	 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "Database error:" .  mysqli_error($conn)
           ];
	} else {
		return $array = [
           "finishedSuccessfully" => 1,
           "onSuccesMessage" => "Successfully added to your wishlist"
           ];
	} 
}
};
?>