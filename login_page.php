<?php
require ('Managers/UserManager.php');

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
if ($password != null && $username != null) {
	$result = UserManager::findUser($username,$password);
	if ($result == 0) {
		echo "<div class='alert alert-danger' role='alert'>
			  Username or password is incorrect</div>";
	} else {
		$_SESSION["islogged"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $result;
		header('Location: index.php');
	}
}
?>

<div style="width:15%">
         <form class = "form-signin" role = "form" 
            action = "login.php" method = "post">
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Username" value="<?php echo $username; ?>" required></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Password" required></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>   
</div> 