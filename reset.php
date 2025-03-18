<?php
$conn = mysqli_connect('localhost','root','','ridewithme');
if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $query = "SELECT * FROM password_reset WHERE token='$token'";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $token = $row['token'];
        $email = $row['email'];
    } else {
        header("location:index.php");
    }
}





if (isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $options = ['cost' => 11];
    $hashed = password_hash($password, PASSWORD_BCRYPT, $options);
    if ($password != $confirmpassword) {
        $msg = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $msg = "Password must be atleast 6 charcters long";
    } else {
        $query = "UPDATE users set password='$hashed' WHERE email = '$email'";
        mysqli_query($conn, $query);
        $query = "DELETE FROM password_reset WHERE email = '$email'";
        mysqli_query($conn, $query);
        $msgs = "Password changed, Login <a href='index.php'>here</a>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
        p {
            background-color: lightblue;
            color: white;
            border-radius: 5px;
            padding: 3px;
        }

        .msg {
             background-color: #f8d7da;
            color: #721c24;
            border-radius: 15px;
            text-align: center;
            line-height: 60px;
        }

        .msgs {
            background-color: #B7FFBF;
            border-radius: 15px;
            padding: auto;
            text-align: center;
            line-height: 60px;
        }
     
    
    .form-login{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 95%;
        transform: translate(-50%,-50%);
        background-color: whitesmoke;
        text-align: center;
        padding: 20px;
        border: 0;
        border-radius: 17px;
        box-sizing: border-box;
    }
    .form-login > form{
    position: relative;
    margin: 10px 0;
    padding: 5px;
    }
    .form-login > form >div{
        position: relative;
        margin: 10px 0;
        padding: 8px;
        float: right;
        width: 100% !important;
    }
    .form-login > form > div > label{
        color: grey;
    width: 100%;
    display: block;
    left: 10px;
    text-align: justify;
    padding: 0px;
    position: absolute;
    top: 10px;
    transition: 0.5s;
    }
    .form-login > form > div > input
    {
    width: 100%;
    border: 0;
    outline: none;
    background: transparent;
    margin: 10px 0;
    padding: 5px;
    box-sizing: border-box;
    box-shadow: none;
    border-bottom: 1px solid black;
    }
    .form-login > form > div > input:focus ~ label{
        transform: translateY(-15px);
        color: black;
        font-weight: bold;
    }
    
    .form-login input[type="submit"]{
        border: 0;
        border-bottom: 5px;
        background-color:#0487E2;
        text-transform: uppercase;
        text-align: center;
        padding: 10px 0;
        color: white;
        border-radius: 15px;
        cursor: pointer;
    }
    .form-login > form > div > input:valid ~ label{
        transform: translateY(-18px);
    }
    a{
        text-decoration: none;
    }
    .title{
        text-align: center;
    }
    .bk{
        font-weight: 700;
        font-size: large;
        color:black;
        margin-left:5px;
    }
    @media screen and (min-width: 768px) {
    .form-login {
        width: 50%; /* Adjust width as needed */
    }
}
    
    </style>


   <a href="index.php" class="bk"><i class="fa fa-arrow-left"></i></a><h1 class="title">Reset Password</h1>
    

<div class="form-login">
<div class="msg"><?php if (isset($msg)) {
                            echo $msg;
                        } ?></div>
    <div class="msgs"><?php if (isset($msgs)) {
                            echo $msgs;
                        } ?></div>
    <form action="" method="POST">


        
       
                  <div>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>

                  <div>
                <input type="password" name="confirmpassword"required>
                <label>Comfirm Password</label>
            </div>
            <div>
              <input type="submit" value="Reset Password" name="submit">
                </div>



    </form>
    </div>
</body>

</html>