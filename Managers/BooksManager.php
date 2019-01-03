<?php
require_once('DatabaseConfig/dbConfig.php');

class Book {
	public $book_id;
	public $book_name;
	public $book_author;
	public $number;
	public $picture_path;
}

class BooksManager {
public static function searchBooks($name) {
	$sql = "SELECT * FROM books WHERE book_name LIKE '%$name%'";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);
	if ($result == false) {
	return null;
	}
	
	$books = array();
	
	while ($obj = mysqli_fetch_object($result,"Book")) {
		array_push($books, $obj);
    }
	
	return $books;
}

public static function getMostViewdBooks($number) {
	$sql = "SELECT * FROM books";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);
	if ($result == false) {
	return null;
	}
	
	$books = array();
	
	while ($obj = mysqli_fetch_object($result,"Book")) {
		array_push($books, $obj);
    }
	
	$books = array_slice($books, 0, $number);
	
	return $books;
}

public static function getMostWantedBooks($number) {
	$sql = "select b.book_id,book_name,book_author,number from (
			SELECT book_id,sum(quantity) as q FROM whishlist group by book_id order by q DESC) as w join books b on (w.book_id = b.book_id);";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);
	if ($result == false) {
	return null;
	}
	
	$books = array();
	
	while ($obj = mysqli_fetch_object($result,"Book")) {
		array_push($books, $obj);
    }
	
	$books = array_slice($books, 0, $number);
	
	return $books;
}

public static function selectBook($id) {
	$sql = "SELECT * FROM books where book_id = $id";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);
	
	if ($result == false) {
	return null;
	}
	$book = mysqli_fetch_object($result,"Book");
	
	return $book;
}
public static function allBooks() {
	$sql = "SELECT * FROM books ORDER BY book_name";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);
	if ($result == false) {
	return null;
	}
	
	$books = array();
	
	while ($obj = mysqli_fetch_object($result,"Book")) {
		array_push($books, $obj);
    }
	
	return $books;
	}

public static function getWishedBooks($user_id) {
	$conn = DatabaseConnection::getDatabaseConnection();
	$sql = "select * from whishlist w join books b on (w.book_id = b.book_id) where w.user_id = $user_id ";

	$result = mysqli_query($conn,$sql);
	
	$books = array();
	
	while ($obj = mysqli_fetch_object($result,"Book")) {
		array_push($books, $obj);
    }
	
	return $books;
	
}

public static function removeFromWhislist($user_id,$book_id) {
	$conn = DatabaseConnection::getDatabaseConnection();
	$sql = "DELETE FROM whishlist WHERE user_id = $user_id and book_id = $book_id;";
	$result = mysqli_query($conn,$sql);
	
	if ($result == 0)  {
	 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "Database error:" .  mysqli_error($conn)
           ];
	} else {
		return $array = [
           "finishedSuccessfully" => 1,
           "onSuccesMessage" => "Successfully removed from your wishlist"
           ];
	} 
}

public static function removeBook($book_id) {
	$conn = DatabaseConnection::getDatabaseConnection();
	$sql = "DELETE FROM books WHERE book_id = $book_id;";
	$result = mysqli_query($conn,$sql);
	
	if ($result == 0)  {
	 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "Database error:" .  mysqli_error($conn)
           ];
	} else {
		return $array = [
           "finishedSuccessfully" => 1,
           "onSuccesMessage" => "Successfully removed"
           ];
	} 
}

public static function addNewBook($book_name,$book_author,$quantity,$picture_path) {
	if ($book_name == null) {
		 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "All fields must be filled"
           ];
	}
	
	if ($book_author == null) {
		 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "All fields must be filled"
           ];
	}
	if ($quantity == null) {
		 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "All fields must be filled"
           ];
	}
	
	$conn = DatabaseConnection::getDatabaseConnection();
	
	$sql = "INSERT INTO books (book_name, book_author, number, picture_path) VALUES ('$book_name', '$book_author', '$quantity','$picture_path')";
	
	$result = mysqli_query($conn,$sql);
	
	if ($result == 0)  {
	 return $array = [
           "finishedSuccessfully" => 0,
           "onErrorMessage" => "Database error:" .  mysqli_error($conn)
           ];
	} else {
		return $array = [
           "finishedSuccessfully" => 1,
           "onSuccesMessage" => "Successfully added new book"
           ];
	} 
}

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
}
?>