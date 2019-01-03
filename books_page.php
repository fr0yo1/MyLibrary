<div class="container">
<?php

include ('error_handling.php');

if ($isAdmin) {
	echo '
	<form role = "form" action = "add_new_book.php" method = "post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control" id="author" name="author" placeholder="Author">
  </div>
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
  </div>
   Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
  <button type="submit" class="btn btn-primary">Add new book</button>
</form>';
}

for ($i = 0; $i < count($books); $i= $i + 3) {
	echo  ("<br>");
	echo  ("<br>");
	echo  ("<div class='row'>");
	for ($j = $i; $j < $i + 3; $j = $j + 1) {
		
		if (!isset ($books[$j])) {
			break;
		}
		$id =  $books[$j]->book_id;
		$title = $books[$j]->book_name;
		$author = $books[$j]->book_author;
		$picutre =  $books[$j]->picture_path;
		

		echo  ("<div class='col-sm-4 rcorners hoverable' onclick='location.href=\"show_book.php?id=$id\";' >");
		echo "<picture>
				<img src=\"$picutre\" alt='Flowers' style='width:auto; height: 50px;'>
			 </picture>";
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