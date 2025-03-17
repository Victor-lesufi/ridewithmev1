<?php

$conn = mysqli_connect("localhost","u627331213_victor","076victorL%","u627331213_ridewithme") or die('database error');

// get mesage through ajax
$getMesage = mysqli_real_escape_string($conn,$_POST['text']);
// check database query

$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesage%'";
$run_query = mysqli_query($conn,$check_data) or die("error");

if(mysqli_num_rows($run_query)>0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['replies'];
    echo $replay;

}else{
    echo"sorry i dont understand what you are saying";
}
?>