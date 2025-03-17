<?php
session_start();
require 'app/connection.php';

if(isset($_POST['delete_ride'])){
    $ride_id = mysqli_real_escape_string($con,$_POST['delete_ride']);
    $query = "DELETE FROM test WHERE id='$ride_id'";

    $query_run = mysqli_query($con,$query);

    if($query_run){
        // echo "ride deleted";
        header("Location:ride.php");
        exit(0);
    }else{
        echo "ride not deleted";
        header("Location:index.php");
        exit(0);
    }
}

if(isset($_POST['update_ride'])){
    $ride_id =  mysqli_real_escape_string($con,$_POST['ride_id']);
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $date= mysqli_real_escape_string($con,$_POST['date']);
    $location= mysqli_real_escape_string($con,$_POST['location']);
    $time= mysqli_real_escape_string($con,$_POST['time']);
    $destination= mysqli_real_escape_string($con,$_POST['destination']);
    $price= mysqli_real_escape_string($con,$_POST['price']);
    $type= mysqli_real_escape_string($con,$_POST['type']);

    $query = "UPDATE test SET name='$name', date='$date', location='$location', time= '$time' , destination= '$destination', type= '$type' ,price= '$price' WHERE id='$ride_id'";
  $query_run = mysqli_query($con,$query);

  if($query_run){
    // echo "ride updated";
    header("Location:ride.php");
    exit(0);
  }else{
    echo "ride not  updated";
    header("Location:index.php");
    exit(0);
  }
}

if(isset($_POST['save_ride'])){
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $date= mysqli_real_escape_string($con,$_POST['date']);
    $location= mysqli_real_escape_string($con,$_POST['location']);
    $time= mysqli_real_escape_string($con,$_POST['time']);
    $destination= mysqli_real_escape_string($con,$_POST['destination']);
    $price= mysqli_real_escape_string($con,$_POST['price']);
    $type= mysqli_real_escape_string($con,$_POST['type']);

    $query="INSERT INTO test (name,date,location,time,destination,type,price) VALUES ('$name','$date','$location','$time','$destination','$type','$price')";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        $_SESSION["message"]= "student created";
        header("Location:ride-create.php");
        exit(0);
    }else{
        $_SESSION["message"]= "ride not  created";
        header("Location:ride-create.php");
        exit(0);
    }
}


?>