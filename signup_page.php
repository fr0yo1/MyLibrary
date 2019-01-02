<?php
require ('Managers/UserManager.php');

if (isset($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
} else {
	$firstname = null;
}
if (isset($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
} else {
	$lastname = null;
}
if (isset($_POST["username"])) {
    $username = $_POST["username"];
} else {
	$username = null;
}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
} else {
	$password = null;
}
if (isset($_POST["confirmedPassword"])) {
    $confirmedPassword = $_POST["confirmedPassword"];
} else {
	$confirmedPassword = null;
}
if ($password != null && $username != null && $confirmedPassword != null && $firstname != null && $lastname != null) {
	$result = UserManager::addNewUser($firstname,$lastname,$username,$password,$confirmedPassword);
	if ($result["isValid"] == 1) {
		$_SESSION["islogged"] = true;
		$_SESSION['username'] = $username;
		header('Location: index.php');
	} else {
		echo $result["errorMessage"];
	}
} else {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "All fields must be filled";
	}
}
?>

<div style="width:15%">
         <form class = "form-signin" role = "form" 
            action = "signup.php" method = "post">
			<label for="male">Firstname</label>
			<input type = "text" class = "form-control" 
               name = "firstname" placeholder = "Firstname" value="<?php echo $firstname; ?>"></br>
			<label for="male">Lastname</label>
			<input type = "text" class = "form-control" 
               name = "lastname" placeholder = "Lastname" value="<?php echo $lastname; ?>"></br>
			<label for="male">Username</label>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Username" value="<?php echo $username; ?>" ruired></br>
			<label for="male">Password</label>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Password"></br>
			<label for="male">Confirm Password</label>
			<input type = "password" class = "form-control"
               name = "confirmedPassword" placeholder = "Confirm Password"></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Register</button>
         </form>   
</div> 