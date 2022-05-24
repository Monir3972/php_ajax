<?php 
	include('../db.php');
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$emp_id = $_POST['fetch_edit_id'];
	    $name =  $_POST['edit_name'];
	    $email =  $_POST['edit_email'];
	    $contact =  $_POST['edit_contact'];
	    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`contact`='$contact' WHERE id = '$emp_id'";
	    $stmt = $connection->prepare($sql);

		 // execute the query
		$stmt->execute();

	echo $stmt->rowCount() . " records UPDATED successfully";
		

}


?>