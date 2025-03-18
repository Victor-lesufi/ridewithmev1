<?php   
session_start();

include 'app/db.conn.php';

  	include 'app/helpers/user.php';
  	include 'app/helpers/chat.php';
  	include 'app/helpers/opened.php';

  	include 'app/helpers/timeAgo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="vic">
    <a href="home.php"><i class="fa fa-arrow-left"></i></a>
    All users
</div>
<style>


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
        float: left;
        margin-left: 9px;
        color:black;
    }
    
    *{
        text-decoration: none;
        
    }
    /* body{
        background-color: lightseagreen;
    } */
    .bn{
        /* background-color: grey; */
        padding: 5px;
        border-radius: 10px;
        display: block;
    }
    .msg{
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
    .h3{
        font-weight: 700;
        font-size: large;
        
    }
    .gy{
        color: grey;
    }
  span{
    font-weight: bold;
    font-size: 25px;
  }
  .back{
   
    position: fixed;
   
  }

</style>


<div class="container">
<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ridewithme";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users WHERE name != '{$_SESSION['username']}'  ";
$result = $conn->query($sql);


$num_users = $result->num_rows;

if ($num_users > 0) {
    echo "<div style='position: relative;'>";
    echo "<div style='position: absolute; top: 18px; right: 8px; background-color: #1877F2; color: white; width: 25px; height: 25px; border-radius: 50%; text-align: center; font-size: 12px; line-height: 25px; position:fixed;'>".$num_users."</div>";
    echo "</div>";
    echo "<table class='ml-5'>";
    
    while($row = $result->fetch_assoc()) {
        // $row = mysqli_fetch_array($result);
        $pp = $row['p_p'];
        $name = $row['name'];
        $id = $row['user_id'];
       
        echo "<tr>
        <td class='bn'>
          <img src='uploads/$pp' class='rounded-circle  mt-1' style='width:65px; height:65px;border:1px solid grey;'><br>
          
          <span class='h3 mt-1'>".$row["name"]." </span>
          
         
          
          <form action='chat.php' method='GET' class='mt-1'>
            <input type='hidden' name='user' value='".$row['username']."'>
            <button type='submit'class='msg '>Message</button>
          </form>
        </td>
      </tr>";
      
        
    }
    echo "</table>";
} else {
    echo "No users found.";
}


$conn->close();
?>



</div>



</body>
</html>