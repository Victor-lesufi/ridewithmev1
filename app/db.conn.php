<?php 

# server name
$sName = "localhost";
# user name
$uName = "u627331213_victor";
# password
$pass = "076victorL%";

# database name
$db_name = "u627331213_ridewithme";

#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}


























