<?php
$conn = mysqli_connect('localhost', 'root', '', 'ridewithme');


if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $query = "SELECT * FROM users WHERE email='$email' ";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $db_username = $row['username'];


        $token = uniqid(md5(time()));
        $query = "INSERT INTO password_reset(id,email,token) VALUES(NULL,'$email','$token')";

        if (mysqli_query($conn, $query)) {
            $to = $db_email;
            $subject = "password reset link";
            $message = "click <a href='https://ridewithmee.com/reset.php?token=$token'>here</a> to reset your password";
            // mail($to,$subject,$message);

            //  $msg="password reset link sent to email";

            // $msg = "  Your Username is:<strong> $db_username </strong> <br>Click this link to reset your password: <br>
            $msg = "Click this link to reset your password:
            
     <a href='reset.php?token=$token'>reset.php?token=$token</a> ";
        }
    } else {
        $msg = "<h6 class='text-danger text-centre m-auto'>We have no user registered with email address provided, try signing up instead</h6>";
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
       	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <style>



@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

/*body {*/
/*    width: 100%;*/
/*    height: 100vh;*/
/*    display: flex;*/
/*    align-items: center;*/
/*    justify-content: center;*/
    /*background: #DFF2FF;*/
/*}*/

::selection {
    color: #fff;
    background: #53f0e3;
}

.wrapper {
    width: 380px;
    padding: 40px 30px 50px 30px;
    background: #fff;
    border-radius: 5px;
    text-align: center;
    box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);
}

.wrapper header {
    font-size: 35px;
    font-weight: 600;
}

.wrapper form {
    margin: 40px 0;
}

form .field {
    width: 100%;
    margin-bottom: 20px;
}

form .field.shake {
    animation: shake 0.3s ease-in-out;
}

@keyframes shake {
    0%,
    100% {
        margin-left: 0px;
    }
    20%,
    80% {
        margin-left: -12px;
    }
    40%,
    60% {
        margin-left: 12px;
    }
}

form .field .input-area {
    height: 50px;
    width: 100%;
    position: relative;
}

form input {
    width: 100%;
    height: 100%;
    outline: none;
    padding: 0 45px;
    font-size: 18px;
    background: none;
    caret-color: #5372F0;
    border-radius: 25px;
    border: 1px solid #bfbfbf;
    border-bottom-width: 2px;
    transition: all 0.2s ease;
}

form .field input:focus,
form .field.valid input {
    border-color: #5372F0;
}

form .field.shake input,
form .field.error input {
    border-color: #dc3545;
}

.field .input-area i {
    position: absolute;
    top: 50%;
    font-size: 18px;
    pointer-events: none;
    transform: translateY(-50%);
}

.input-area .icon {
    left: 15px;
    color: #bfbfbf;
    transition: color 0.2s ease;
}

.input-area .error-icon {
    right: 15px;
    color: #dc3545;
}

form input:focus~.icon,
form .field.valid .icon {
    color: #5372F0;
}

form .field.shake input:focus~.icon,
form .field.error input:focus~.icon {
    color: #bfbfbf;
}

form input::placeholder {
    color: #bfbfbf;
    font-size: 17px;
}

form .field .error-txt {
    color: #dc3545;
    text-align: left;
    margin-top: 5px;
}

form .field .error {
    display: none;
}

form .field.shake .error,
form .field.error .error {
    display: block;
}

form .pass-txt {
    text-align: left;
    margin-top: -10px;
}

.wrapper a {
    color: #5372F0;
    text-decoration: none;
}

.wrapper a:hover {
    text-decoration: underline;
}

form input[type="submit"] {
    height: 50px;
    /*margin-top: 30px;*/
    color: #fff;
    padding: 0;
    border: none;
    background: #5372F0;
    cursor: pointer;
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border-radius:20px;
}

form input[type="submit"]:hover {
    background: #2c52ed;
}
.form-login{
    background-color: #F5FCFF;
    padding:10.5px;
    border-radius:7px;
    
}



















    </style>

<a href="index.php" class="bk" style="margin-left:5mm;"><i class="fa fa-arrow-left"></i></a><h1 class="title" style="text-align:center;">Forgot Password</h1>
    
    <div class="form-login">
        <form action="" method="POST">

        
            <!--<div>-->
            <!--    <input type="email" name="email" required>-->
            <!--    <label>Email</label>-->
            <!--</div>-->
            <div class="field password">
                <div class="input-area">
                    <input type="email" placeholder="Email"  name="email">
                    <i class="icon fa fa-envelope" aria-hidden="true"></i>
                    
                </div>
        
            </div>
           
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>
          
        </form>
    </div>
   
    <?php if (isset($msg)) {
                echo $msg;
            } ?>
</div>
   
</body>

</html>