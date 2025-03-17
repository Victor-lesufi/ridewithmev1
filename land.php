<?php
session_start();

if (isset($_SESSION['username'])) {
    # database connection file
    include 'app/db.conn.php';
    include 'app/helpers/user.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';
    include 'connect.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        header {
            background-color: #007bff;
            width: 100%;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            z-index: 999;
            color: #fff;
            font-size: 1.2rem;
        }

        header .back-button {
            position: absolute;
            left: 10px;
            color: #333;
        }
        
        .container {
            max-width: 960px;
            margin: 80px auto 0; /* Added margin-top to avoid overlap with fixed header */
            padding: 0 15px;
            text-align: center;
        }

        .image {
            width: 100%;
            max-width: 500px;
            height: auto;
        }
        
        .cnt {
            margin-top: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 19px;
            font-weight: bold;
            cursor: pointer;
        }

        @media screen and (max-width: 576px) {
            h3 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.9rem;
            }
            
            button {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="back-button">
        <a href="home.php" style="color: black"><i class="fa fa-arrow-left"></i></a>
    </div>
    <h2 style="color: black" >Chatbot</h2>
</header>
<div class="container">
    <h5 class="mt-5">Welcome to 24/7 chatAI <?php echo $_SESSION['name'];?>!,<br>the name of this robot is Moleta-Israel.</h5>
    <img class="image" src="images/robot.jpeg" alt=""><br><br>
    <p>You will be chatting with a robot (Moleta-Israel). It will try to answer any questions you might have to the best of its ability. If it doesn't help you, go to your home page and search for <strong>Victor Lesufi</strong>; he will resolve issues you might have.</p>
    <div class="cnt">
        <button><a href="bot.php" style="color: #fff; text-decoration: none;">Continue to chat</a></button>
    </div>
</div>

</body>
</html>
