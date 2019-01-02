<?php

	$firstname = $user->firstname;

	echo "<h1>Hello, $firstname</h1>";
?>
<h2>Your whishlist:</h2>
<div class="container">
    <ul class="list-group">
        
		<?php
		foreach ($wishedBooks as $book) {
			$book_name =  $book->book_name;
			$book_author = $book->book_author;
			$book_id = $book-> book_id;
			echo "<li class='list-group-item clearfix'>
                  $book_name . $book_author
            <span class='pull-right button-group'>
                <a href='show_book.php?id=$book_id' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> Delete</a>
            </span>
        </li>";
		}
		?>
		
    </ul>
</div>