<?php



if (
	isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['location']) && isset($_POST['time'])
	&& isset($_POST['destination']) && isset($_POST['price']) && isset($_POST['type'])
) {
	include 'db_conn.php';

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$lastname = validate($_POST['lastname']);
	$location = validate($_POST['location']);
	$time = validate($_POST['time']);
	$destination = validate($_POST['destination']);
	$type= validate($_POST['type']);
	$price = validate($_POST['price']);




	if (empty($lastname) || empty($name) || empty($location) || empty($time)  || empty($destination) || empty($price) || empty($type)) {
		header("Location: index.php");
	} else {

		$sql = "INSERT INTO test(name, lastname, location,time,destination,type,price) VALUES('$name', 
		'$lastname','$location','$time','$destination','$type','$price' )";
		$res = mysqli_query($conn, $sql);

		if ($res) {

			echo "Your ride details was inserted  successfully!";
		} else {
			echo "Your message could not be sent!";
		}
	}
} else {
	header("Location: index.php");
}
