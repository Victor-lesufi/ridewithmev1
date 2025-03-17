<?php
session_start();

include 'app/db.conn.php';
include 'connect.php';
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--<header style="background-color:smokewhite; width: 100%; height: 48px; display: flex; align-items: center; justify-content: center; position: fixed; top: 0; z-index: 999;border-bottom:1px solid grey;margin-bottom:2px">-->
<!--    <div style="position: absolute; left: 10px;">-->
<!--        <a href="home.php" style="color: #333;"><i class="fa fa-arrow-left"></i></a>-->
<!--    </div>-->
<!--    <h2 style="color: #333; font-size: 1.5rem; text-align: center;">Request</h2>-->
<!--</header>-->
<div class="vic">
    <a href="home.php"><i class="fa fa-arrow-left"></i></a>
    Request
</div>
   
    <div class="container mt-5">
    <form action="send.php" method="POST"  >
            <input type="hidden" name="ride_id">
            <div class="mb-3">
                <label> Name:</label>
                <input type="text" readonly name="name" class="form-control" required value="<?= $_SESSION['username']; ?>">
            </div>
            <div class="mb-3">
                <label>Date:</label>
                <input type="date" name="date" class="form-control" required>

            </div>
            <div class="mb-3">
                <label>Location:</label>
                <input type="location" name="location" class="form-control" required>

            </div>
            <div class="mb-3">
                <label>Time:</label>
                <input type="time" name="time" class="form-control" required>

            </div>
            <div class="mb-3">
                <label>Destination:</label>
                <input type="text" name="destination" class="form-control" required>

            </div>
            <div class="mb-3">
              <label class="mb-0.5">Type:</label>
              <select class="form-select" aria-label="Default select example" name="type" required>
                <option value="">Select type</option>
                <option value="transport">Transport</option>
                <option value="lift">Lift</option>
                
              </select>

            </div>
            <div class="mb-3">
                <label>Price:</label>
                <input type="number" name="price" class="form-control" required>

            </div>
            <div class="mb-3">

                <button class="btn btn-primary" type="submit" name="update_ride">Request</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    
    
    <style>
        
    .container{
        /* background-color: red; */
        margin-top: 65px;
        /* padding-left: 50px; */
    }
    .vic{
        background-color: #58CCED;
       
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 0;
        width: 100%;
        margin-bottom: 50px;
        
    }
    .vic a {
        float: left;
        margin-left: 9px;
        color:black;
    }
    *{
        text-decoration: none;
}
@media screen and (min-width: 768px) {
    .container {
        width: 50%; /* Adjust width as needed */
    }
}
    </style>
</body>
</html>