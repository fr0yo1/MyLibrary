<div class="container">
<?php
for ($i = 0; $i < count($books); $i= $i + 3) {
	echo  ("<br>");
	echo  ("<br>");
	echo  ("<div class='row'>");
	for ($j = $i; $j < $i + 3; $j = $j + 1) {
		
		if (!isset ($books[$j])) {
			break;
		}
		
		echo  ("<div class='col-sm-4 rcorners'  >");
		$title = $books[$j]->book_name;
		$author = $books[$j]->book_author;
		echo ("<p> $title</p>");
		echo ("<p> $author</p>");
		echo  ("</div>");
	}
	echo  ("</div>");
}
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php
	for ($i = 0 ;$i <$numberOfPages; $i= $i + 1) {
		$page = $i+1;
		echo "<li class='page-item'><a class='page-link' href='show_books.php?search=$search_input&page=$page'>$page</a></li>";
	}
	?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

</div>