<?php
session_start();

if (!isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
         <link rel="stylesheet" href="css/style.css"> 
        <link rel="icon" href="imges/txi.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    
    background: #eaf4f4;
    
}

.login-section{
        width: 100%;
    height: 50vh;
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
.leihlo{
    
    margin-left:26px;
    cursor:pointer;
    display:none;
}

.login-section{
    background-color:#F5FCFF;
    padding:8.5px;
    border-radius:7px;
}
a{
    text-decoration:none;
}
.alert{
    background-color:#EF9A9A;
    /*text-align:center;*/
    border-radius:7px;
    /*background-color:green;*/
    padding:6px;
}
.success{
    background-color:#cefad0;
    padding:6px;
    border-radius:7px;
}


    </style>

  
 
                   <div style="text-align: center;margin-top:-9mm;">
    <h2 style="color: blue; background-color: white; border-radius: 7px; margin-top: 25mm; display: inline-block;padding:5px;">RideWithMe</h2><h5>LOGIN</h5>
</div>


        <section class="login-section">
            <div class="head">
                
            </div>
            <div class="form-login">
                <!--<h3 style="text-align:center;">Login</h3>-->
                <form method="post" action="app/http/auth.php">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <div class="success" role="alert">
                            <?php echo htmlspecialchars($_GET['success']); ?>
                        </div>
                    <?php } ?><br>

                    <div class="field email">
                <div class="input-area">
                    <input type="text" placeholder="Username" name="username">
                    <i class=" icon fa fa-user" aria-hidden="true"></i>
                    
                </div>
                
            </div>


      <!--              <div class="password-container">-->
      <!--  <input type="password" name="password" id="password" required>-->
      <!--  <label for="password">Password<span>*</span> </label>-->
      <!--  <span id="togglePassword" onclick="togglePasswordVisibility()">-->
      <!--  <i class="fas fa-eye-slash"></i>-->
      <!--  </span>-->
      <!--</div>-->
        <div class="field password">
                <div class="input-area">
                    <input type="password"name="password" placeholder="Password" id="password">
                    <i class="icon fas fa-lock"></i>
                     <span id="togglePassword" onclick="togglePasswordVisibility()">
        <!--<i class="  fas fa-eye-slash"></i>-->
                </div>
        
            </div>
               <div class="pass-txt"><a href="forgot-password.php">Forgot password?</a></div>
                    <div style="text-align:center;">
                        <input type="submit" value="LOGIN" name="sbt"><br>
                        Not yet Signedup? <a href="signup.php">Signup here</a> <br><br>
                        <!--<a href="forgot-password.php">Forgot Password?</a><br><br><br><br>-->
                        <a href="profile.php">Victor Lesufi</a> &copy 2024
                        
                    </div>




                </form>
            </div>


        </section>
  <script>     
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.querySelector("#togglePassword i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    }
}
</script>



    </body>

    </html>
<?php
} else {
    header("Location: home.php");
    exit;
}
?>
</div>