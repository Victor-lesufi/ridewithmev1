<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>success</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

		
    <style>
       
     .text-center{
    background-color:#d7e3fc;
    padding: 10px;
    border-radius: 10px;
    text-align: center;
    margin-top: 7px;
    margin-left: 5px;
    margin-right: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9); 
    margin-bottom:5px;
}

        span{
            color: grey;
        }
     
        button{
            border-radius: 25px;
            width: 85%;
            line-height: 35px;
            color:black;
            background-color:#2ec4b6;
        }
        
        	@media (min-width: 992px) { 
			.text-center {
				position: absolute;
				top: 30%;
				left: 50%;
				transform: translate(-50%, -50%);
			}
		}
		.AI{
		    background-color: #F5F5F5;
		    bottom:-20px;
		    position:fixed;
		    width:100%;
		    left:0;
		    /*text-align:center;*/
		    border-radius:5px;
		    /*font-size:9px;*/
		    /*padding:4px;*/
		}
		.green-button {
    background-color: green;
    color: white;
  }

  .red-button {
    background-color: red;
    color: white;
  }
    </style>
      <div class='AI'>
        <p>Do you give consent for using the ride data you just provided to build an AI algorithm that will suggest rides that match where you are going?</p>
        <p>The default is yes. You can toggle to change your preference:
        <button id="consentButton" style="width:15%" onclick="toggleConsent()">yes</button></p>
    </div>

    <script>
        function toggleConsent() {
            var button = document.getElementById("consentButton");
            if (button.innerHTML === "yes") {
                button.innerHTML = "no";
                button.style.backgroundColor = "red";
                button.style.color = "black";
            } else {
                button.innerHTML = "yes";
                button.style.backgroundColor = "green";
                button.style.backgroundcolor = "";
            }
        }
    </script>
</body>
</html>


<?php


if (
	isset($_POST['name']) && isset($_POST['date']) && isset($_POST['location']) && isset($_POST['time'])
	&& isset($_POST['destination']) && isset($_POST['price']) && isset($_POST['type'])
) {
	include 'app/db_conn.php';

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	$name = validate($_POST['name']);
	$date = validate($_POST['date']);
	$location = validate($_POST['location']);
	$time = validate($_POST['time']);
	$destination = validate($_POST['destination']);
	$price = validate($_POST['price']);
	$type = validate($_POST['type']);




	if (empty($date) || empty($name) || empty($location) || empty($time)  || empty($destination) || empty($price) || empty($type) ) {
		header("Location: index.php");
	} else {

		$sql = "INSERT INTO test(name, date, location,time,destination,type,price) VALUES('$name', 
		'$date','$location','$time','$destination','$type','$price' )";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "<div class='text-center'>
    <h4>Ride uploaded successfully!!</h4><br>
    <i class='fa fa-check' style='color:green;border-radius:50%;background-color:white;height:90px;width:90px;line-height:90px; font-size:4em;border:3px solid green;'></i><br><br>
    <span>Only you can delete or edit them anytime you want.<br><br> </span>
    <button style='background-color: green; color: white; border: none; padding: 10px 20px; cursor: pointer;'>
        <a href='ride.php' style='text-decoration: none; color: white; display: block;'>Finish</a>
    </button>
</div>
";
			
		
			
		} else {
			echo "Your message could not be sent!";
			
		}
	}
	
} else {
	header("Location: ride.php");
}
