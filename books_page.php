<div class="container">
<?php
for ($i = 0; $i < count($books); $i= $i + 3) {
	echo  ("<div class='row'>");
	for ($j = $i; $j < $i + 3; $j = $j + 1) {
		
		if (!isset ($books[$j])) {
			break;
		}
		
		echo  ("<div class='col-sm-4'");
		$title = $books[$j]->book_name;
		$author = $books[$j]->book_author;
		echo ("<p> $title</p>");
		echo ("<p> $author</p>");
		echo  ("</div>");
	}
	echo  ("</div>");
}
?>
</div>