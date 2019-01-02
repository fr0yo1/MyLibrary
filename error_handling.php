<?php
if (isset($_SESSION['post_data_result'])) {
		$result = $_SESSION['post_data_result'];
		$message;
    if ($result["finishedSuccessfully"] == 1) {
		$message = $result["onSuccesMessage"];
		echo "<div class='alert alert-success' role='alert'>
		 $message
        </div>";
	} else {
		$message =  $result["onErrorMessage"];
		echo "<div class='alert alert-danger' role='alert'>
		 $message
        </div>";
	}
    
    unset($_SESSION['post_data_result']);
    }
?>
