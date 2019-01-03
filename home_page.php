<h2> Top 3 most wanted books:</h2>
<?php
require ("Managers/BooksManager.php");
$isAdmin = false;
$search_input = "";
$booksPerPage = 3;
$numberOfPages = 0;
$books = BooksManager::getMostWantedBooks(3);
require("books_page.php");
?>