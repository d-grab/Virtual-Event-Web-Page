<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$Message = $_POST['Message'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contacts(firstname, lastname, city, email, Message) values(?, ?, ?, ?,?)");
		$stmt->bind_param("sssss", $firstname, $lastname, $city, $email,  $Message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank you for contacting us!";
		$stmt->close();
		$conn->close();
	}
?>