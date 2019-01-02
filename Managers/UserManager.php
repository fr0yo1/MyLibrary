<?php
require('DatabaseConfig/dbConfig.php');
class UserManager {
public static function findUser($username,$password) {
	
	$sql = "SELECT * FROM user WHERE email = '$username' and password = '$password'";
	$result = mysqli_query(DatabaseConnection::getDatabaseConnection(),$sql);

	$count = mysqli_num_rows($result);
	return $count;
	}
public static function addNewUser($firstname,$lastname,$username,$password,$confirmedPassword) {
	$validationResult = UserManager::validate($firstname,$lastname,$username,$password,$confirmedPassword);
	
	if ($validationResult["isValid"] == 0) {
		return $validationResult;
	}
	
	$sql = "INSERT INTO USER (firstname, lastname, email,password) VALUES ('$firstname', '$lastname', '$username','$password')";
	$conn = DatabaseConnection::getDatabaseConnection();
	$result = mysqli_query($conn,$sql);
	if ($result != true) {
	 return $array = [
           "isValid" => 0,
           "errorMessage" => "Database error:" .  mysqli_error($conn),
           ];
	} else {
		return $array = [
           "isValid" => 1,
           "errorMessage" => "",
           ];
	}
	mysqli_close($conn);
}
private static function validate($firstname,$lastname,$username,$password,$confirmedPassword) {
	$errorMessage = "";
	$ok = 1;
	if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $errorMessage = $errorMessage . "Email address '$username' is considered invalid.\n";
	$ok = 0;
    }
	if (strcmp($password,$confirmedPassword) != 0) {
	$errorMessage = $errorMessage . "Password does not match the confirm password.\n";
	$ok = 0;
	}
	if(!preg_match("/^[a-zA-Z'-]+$/",$firstname)) { 
	$errorMessage = $errorMessage . "Invalid firstname.\n";
	$ok = 0;
	} 
	if(!preg_match("/^[a-zA-Z'-]+$/",$lastname)) { 
	$errorMessage = $errorMessage . "Invalid lastname.\n";
	$ok = 0;
	} 
	return $array = [
           "isValid" => $ok,
           "errorMessage" => $errorMessage,
           ];
}
};
?>