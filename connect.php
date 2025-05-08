<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];
	$People = $_POST['People'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name, Email, Date, Time, People) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $Name, $Email, $Date, $Time, $People);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration Successfully...";
		$stmt->close();
		$conn->close();
	}
?>