<?php
require 'app/connection.php';
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRides</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
.bk{
    background-color: lightseagreen;
    padding: 10px;
    width: 100%;
    line-height: 10px;
    /* position: fixed; */
    top: 0;
}
button{
   background-color: white;
    padding: 5px;
    border-radius: 5px;
    
}
/* button:hover{
   background-color: blue;
    
    
} */
button a{
    color: black;
    font-weight: 500;
}
/* button a:hover{
    color: white;
    font-weight: 500;
} */
.rounded-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #0487E2;
            color: white;
            font-size: 16px;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
        }
.header{
   background-color: #58CCED;
    line-height: 50px;
 
}
  .container{
        /* background-color: red; */
        margin-top: 65px;
        /* padding-left: 50px; */
    }
    .vic{
        background-color: #58CCED;
       
        line-height: 60px;
        text-align: center;
        position: fixed;
        top: 0;
        width: 100%;
        margin-bottom: 50px;
        
    }
    .vic a {
        /*float: left;*/
        margin-left: 9px;
        color:black;
        
    }
    *{
        text-decoration: none;
    }
   
   
    .rounded-circle {
        object-fit: cover;
        border-radius: 50%;
 
</style>

<body>

<!--<div class="header">-->
<!--<div class ="container ">-->
<!--<a href="home.php" class=" fs-10 link-dark"><i class="fa fa-arrow-left"></i></a></div>-->
<!--<h5 class="text-center">-->
            
<!--              -->

<!--            </h5>-->
        

<!--</div>-->

<div class="vic">
    <a href="home.php"><i class="fa fa-arrow-left"></i> </a>
    
    
</div>
             
 

    <div class="container">


    <div class="container">

        
            
      
       
        <div class="card-body">
            .<div class="table-responsive">
            <table class="table">
                <thead>

                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM test WHERE name='$_SESSION[username]'";
                    $query_run = mysqli_query($con, $query);
                    

                    if (mysqli_num_rows($query_run) > 0) {
                        

                        echo "<thead>
                                   <tr>
                                  
                                  
                                  <th>From</th>
                                  <th>To</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Type</th>
                                  <th>Price</th>
                                  <th>Actions</th>
                                  
                                   </tr>
                                </thead>";



                        foreach ($query_run as $ride) {
                            //echo $ride['name'];

                    ?>
                            <tr>


                            </tr>
                            <tr>


                                <td><?= $ride['location'] ?></td>
                                <td><?= $ride['destination'] ?></td>
                                <td><?= $ride['date'] ?></td>
                                <td><?= $ride['time'] ?></td>
                                <td><?= $ride['type'] ?></td>
                                <td>R<?= $ride['price'] ?></td>
                                <td>


  <form action="code.php" method="POST" id="deleteForm">
    <div class="group">
        <a href="ride-edit.php?id=<?= $ride['id']; ?>"><i class="fa fa-pencil-square-o fw-500"></i></a>
        <button type="submit" name="delete_ride" value="<?= $ride['id']; ?>" class="btn btn-danger" onclick="return confirmDelete();">
            <i class="fa fa-trash float-end"></i>
        </button>
    </div>
</form>

<script>
    function confirmDelete() {
        // Center the confirm dialog
        var confirmation = confirm("Are you sure you want to delete this ride from <?= $ride['location'] ?> to <?= $ride['destination'] ?>?");
        // You can add additional logic here if needed
        return confirmation;
    }
</script>



                                </td>

                            </tr>
                    <?php
                        }
                    } else {
                        echo "<h2 class='text-danger text-center'> You have no active ride  records. </h2>";
                    }
                    ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
    <a href="info.php" class="rounded-button"><i class="fa fa-plus"></i></a>
</body>

</html>