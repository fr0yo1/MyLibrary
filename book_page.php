<div class="container">
<?php
    $id = $book->book_id;
	$title = $book->book_name;
	$author = $book->book_author;
?>

<div class="card" style="width: 18rem;">
  <!--<img class="card-img-top" src="..." alt="Card image cap">-->
  <div class="card-body">
    <h5 class="card-title"><?php echo $title ?></h5>
    <p class="card-text"><?php echo $author ?></p>
    <a href="addToWishlist.php?id=<?php echo $id ?>" class="btn btn-primary">Add to wishlist</a>
  </div>
</div>

</div>