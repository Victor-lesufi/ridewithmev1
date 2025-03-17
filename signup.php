<?php
session_start();

if (!isset($_SESSION['username'])) {
?>



	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SignUp</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" href="images/txi.png">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	</head>

	<body >
	<style>

/*       @media screen and (min-width: 768px) {*/
/*    .form-login {*/
        width: 50%; /* Adjust width as needed */
/*    }*/
/*}*/

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eaf4f4;
}

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
    margin-top: 17px;
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
.terms {
    margin-top: 15px;
    /*display: flex;*/
    /*align-items: center;*/
}

.terms input[type="checkbox"] {
    margin-right: 10px;
}

.terms a {
    color: #007bff;
    text-decoration: none;
}

.terms a:hover {
    text-decoration: underline;
}
       .pass-txt {
    display: flex;
    align-items: center;
}

.pass-txt a {
    margin-right: 10px; /* Adds space between the link and the checkbox */
    color: #007bff;
    text-decoration: none;
}

.pass-txt a:hover {
    text-decoration: underline;
}

.pass-txt input[type="checkbox"] {
    margin: 0;
}


/* General styling */
.pass-txt {
    display: flex;
    align-items: center;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

.pass-txt a {
    margin-right: 10px;
    text-decoration: none;
    color: #007aff; /* iOS default blue color */
}

/* Styling the checkbox */
.pass-txt input[type="checkbox"] {
    -webkit-appearance: none;
    appearance: none;
    width: 10px;
    height: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    position: relative;
    cursor: pointer;
    outline: none;
}

/* Checkbox checked state */
.pass-txt input[type="checkbox"]:checked {
    background-color: #007aff; /* iOS default blue color */
    border: none;
   
}

/* Checkmark */
.pass-txt input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    top: 3px;
    left: 7px;
    width: 6px;
    height: 12px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

    </style>
	
    
<div class="form-login fixed">
                    
    <h1 class="title" style="text-align:center;">Signup</h1>
    <form method="post" action="app/http/signup.php" enctype="multipart/form-data">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php }

        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        } else $name = '';

        if (isset($_GET['username'])) {
            $username = $_GET['username'];
        } else $username = '';
        ?>

     
           <div class="field email">
                <div class="input-area">
                    <input type="text" placeholder="name and surname" name="name" value="<?= $name ?>" >
                    <!-- <i class="icon fas fa-envelope"></i> -->
                    <i class=" icon fa fa-user-circle" aria-hidden="true"></i>
                    
                </div>
                
            </div>

         <div class="field password">
                <div class="input-area">
                    <input type="email" placeholder="email" name="email">
                    <i class="icon fa fa-envelope" aria-hidden="true"></i>
                  
                </div>
        
            </div>

       
           <div class="field password">
                <div class="input-area">
                    <input type="text" placeholder="username" name="username" value="<?= $username ?>">
                    <i class=" icon fa fa-user" aria-hidden="true"></i>
                    
                </div>
        
            </div>


          <div class="field password">
                <div class="input-area">
                    <input type="password" placeholder="Password"  name="password">
                    <i class="icon fas fa-lock"></i>
                    
                </div>
        
            </div>

       
         <div class="field password">
                <div class="input-area">
                    <input type="file" placeholder="profile picture" name="pp">
                    <i class="icon fa fa-camera" aria-hidden="true"></i>
                    
                </div>
        
            </div>


   <div class="pass-txt">
                <a href="terms.php"> T&Cs</a>
                <input type="checkbox" id="terms" name="terms" required>
            </div>
        <div style="text-align:center;">
            <input type="submit" value="Signup">
            Already Signed up? <a href="index.php">Login here</a>
        </div>
       

    </form>
</div>

	</body>

	</html>
<?php
} else {
	header("Location: home.php");
	exit;
}
?>