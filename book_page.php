<div class="container">
<?php
	include ('error_handling.php');

    $id = $book->book_id;
	$title = $book->book_name;
	$author = $book->book_author;
	$quantity = $book->number;
	$picture = $book->picture_path;
?>

<div class="card" style="width: 18rem;">
  <picture>
	<img src="<?php echo $picture?>" alt="Flowers" style="width:auto; height: 200px;">
  </picture>
  <div class="card-body">
    <h5 class="card-title"><?php echo $title ?></h5>
    <p class="card-text"><?php echo $author ?></p>
	<p class="card-text">Disponibile in momentul de fata: <?php echo $quantity ?> carti</p>
    <a href="addToWishlist.php?id=<?php echo $id ?>" class="btn btn-primary">Add to wishlist</a>
	<?php  if ($isAdmin == true) {
		echo '</br>';
		echo '</br>';
		echo "<a href='remove_book.php?id=$id' class='btn btn-danger'>Remove this book</a>";
	}
	?>
  </div>
</div>

</div>