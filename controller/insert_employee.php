<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		include('../db.php');
	    $name =  $_POST['name'];
	    $email =  $_POST['email'];
	    $contact =  $_POST['contact'];
	    $password =  $_POST['password'];
	    $sql = "INSERT INTO `users`(`name`, `email`, `contact`, `password`) VALUES ('$name','$email','$contact','$password')";
	    $stmt = $connection->prepare($sql);

		 // execute the query
		$stmt->execute();

	echo $stmt->rowCount() . " records UPDATED successfully";
		

}


?>