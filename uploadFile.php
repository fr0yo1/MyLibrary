<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        //$uploadOk = 1;
    } else {
		$result = [
				"finishedSuccessfully" => 0,
				"onErrorMessage" => "File is not an image."
				];
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
	$result = [
				"finishedSuccessfully" => 0,
				"onErrorMessage" => "Sorry, file already exists."
				];
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
	$result = [
				"finishedSuccessfully" => 0,
				"onErrorMessage" => "Sorry, your file is too large."
				];
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$result = [
				"finishedSuccessfully" => 0,
				"onErrorMessage" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
				];
    $uploadOk = 0;
}

if ($uploadOk == 1) {
	
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       $uploadOk = 0;
	   $result = [
				"finishedSuccessfully" => 0,
				"onErrorMessage" => "File could not be uploaded"
				];
    }
}
?>