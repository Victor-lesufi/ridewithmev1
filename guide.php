<!DOCTYPE html>
<html>
<head>
    <style>
    body {
        margin: 0;
        padding: 0;
    }
    
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        line-height: 70px;
        background-color: #7581C9;
        z-index: 9999;
    }
    
    .logo {
        display: inline-block;
        margin: 10px;
        font-size: 50px;
        font-weight: bold;
        color: #333;
    }
    
    .links {
        display: inline-block;
        margin: 10px;
        float: right;
    }
    
    .links a {
        margin: 5px;
        color: #333;
        text-decoration: none;
        font-size:45px;
    }
    
    .content {
      
        margin-top: 200px;
        padding:10px;
    }
    
    /* Media Query for Mobile Screens */
    @media (max-width: 600px) {
        .logo, .links {
            display: block;
            float: none;
            text-align: center;
           
        }
        
        .logo {
            margin: 10px 0;
        }
        
        .links {
            margin: 10px 0;
        }
        
        .content {
            margin-top: 70px;
        }
    }
</style>

    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
             RideWithMe
        </div>
        <div class="links">
            <a href="index.php">Login</a>
            <a href="signup.php">Register</a>
        </div>
    </div>
    
 <div class="content">
    <li>victor lesufi🤕🤕</li>
    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, a.</li>
    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, a.</li>
    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, a.</li>
    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, a.</li>
   
 </div>
</body>
</html>
