<?php session_start();?>
<?php
	if(isset($_POST['submit'])){
    $to = "adrian.sandru@yahoo.com";
    $from = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $success = mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); 
	$result["finishedSuccessfully"] = 1;
    $result["onSuccesMessage"] = "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    }

	$page_content = "contact_page.php";
	include('master_page.php');
?>
