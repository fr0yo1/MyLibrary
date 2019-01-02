<?php
require('DatabaseConfig/dbConfig.php');

class Book {
	public $book_name;
	public $book_author;
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
}
?>