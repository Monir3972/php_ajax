<?php 
	include('../db.php');
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
	    $status =  $_POST['data'];
	    $sql = "UPDATE `users` SET `status`='0' WHERE id = '$status'";
	    echo $sql;
	    $stmt = $connection->prepare($sql);

		 // execute the query
		$stmt->execute();

	echo $stmt->rowCount() . " records UPDATED successfully";
		

}


?>