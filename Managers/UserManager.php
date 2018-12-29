<?php
require('DatabaseConfig/dbConfig.php');
class UserManager {
public static function findUser($username,$password) {
	
	$sql = "SELECT * FROM user WHERE email = '$username' and password = '$password'";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);

	$count = mysqli_num_rows($result);
	return $count;
	}
}
?>