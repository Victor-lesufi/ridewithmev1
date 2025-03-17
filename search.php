<?php
include 'app/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Existing styles */
        .head {
            background-color: lightseagreen;
            width: 100%;
            padding: 5px;
            line-height: 30px;
            position: fixed;
            top: 0;
        }
        .mb-3 input {
            border-radius: 12px;
            padding: 3px;
        }
        .mb-3 .btn {
            border-radius: 12px;
        }
        .container {
            margin-top: 65px;
        }
        .vic {
            background-color: #58CCED;
            line-height: 60px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            margin-bottom: 50px;
        }
        .vic a {
            float: left;
            margin-left: 9px;
            color: black;
        }
        * {
            text-decoration: none;
        }
        .bn {
            padding: 5px;
            border-radius: 10px;
            display: block;
        }
        .msg {
            background-color: #1877F2;
            border-radius: 8px;
            width: 50%;
            color: white;
            font-weight: bold;
            line-height: 30px;
        }
        .rounded-circle {
            object-fit: cover;
            border-radius: 50%;
        }
        .h3 {
            font-weight: 700;
            font-size: large;
        }
        .gy {
            color: grey;
        }
        span {
            font-weight: bold;
            font-size: 25px;
        }
        .back {
            position: fixed;
        }
        .text-danger {
            text-align: center;
        }
        @media (min-width: 768px) {
            .mb-3 {
                display: flex;
                justify-content: center;
            }
        }
        @media (min-width: 992px) {
    
       .msgg{
           display:none;
       }
    
}
    </style>
</head>

<body>
    
    
    <div id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

     Spinner to show during search 
    <div id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
<!--    <div class="spinner-grow text-muted" id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-primary"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-success"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-info"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-warning"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-danger"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-secondary"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-dark"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->
<!--<div class="spinner-grow text-light"id="spinner" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>-->

    <div class="vic">
        <a href="home.php"><i class="fa fa-arrow-left"></i></a>
        Find a ride
    </div>

    <div class="container">
        <div class="container my-5">
            <form method="post" style="display: flex; align-items: center;">
                <div class="search-container" style="display: flex; justify-content: center; margin-top: 20px;margin-left:100px;">
                    <div class="mb-3" style="display: flex;">
                        <input type="search" name="search" placeholder="Search rides" style="padding: 8px; border-radius: 17px 0 0 17px; border: 1px solid #ced4da; width: 200px;">
                        <button class="btn btn-dark btn-sm" name="submit" style="border-radius: 0 17px 17px 0; margin-left: -5px;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table">
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM test WHERE name LIKE '%$search%' OR date LIKE '%$search%' OR location LIKE '%$search%' 
                    OR time LIKE '%$search%' OR destination LIKE '%$search%' OR price LIKE '%$search%' OR type LIKE '%$search%'";

                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<div class="mb-3"><h6 class="msgg">Click on the name to chat with the person, swipe left to view all the details in the table!</h6></div><br><thead>
                                <tr>
                                <th>Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Price</th>
                                </tr></thead>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tbody>
                                    <tr>
                                    <td><a href="chat.php?user=' . $row['name'] . '">' . $row['name'] . '</a></td>
                                    <td>' . $row['location'] . '</td>
                                    <td>' . $row['destination'] . '</td>
                                    <td>' . $row['date'] . '</td>
                                    <td>' . $row['time'] . '</td>
                                    <td>' . $row['type'] . '</td>
                                    <td>R' . $row['price'] . '</td>
                                    </tr>
                                    </tbody>';
                            }
                        } else {
                            echo "<h5 class='text-danger text-centre'>No results for: '$search'</h5>";
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
        
            document.getElementById('spinner').style.display = 'block';
        });

        window.addEventListener('load', function() {
           
            document.getElementById('spinner').style.display = 'none';
        });
    </script>
</body>

</html>
