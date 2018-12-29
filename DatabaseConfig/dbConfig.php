<?php
class DatabaseConnection {
	public static function getDatabaseConnection () {
		return $db = mysqli_connect( 'localhost','root','123456','library');
	}
}
?>
