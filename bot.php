<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bot.css">
   
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<style>
.bk{
    background-color: #007bff;
    padding: 10px;
    line-height: 40px;
    width: 100%;
    position: fixed;
    top: 0;
}



</style>


<div class="bk">
<a href="land.php" class=" fs-10 link-dark"><i class="fa fa-arrow-left"></i></a>
</div>



   
    <div class="wrapper">
        <div class="title">Bot  <i class="fa fa-check" aria-hidden="true"style="color:white; background-color: blue;border-radius:50%; border:1px solid blue;height:16px;width:16px;line-height:16px;font-size: 16px;"></i></div>
        <div class="form">
            <div class="bot-inbox inbox">
                
            </div>
           
           
            
           
            
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here..." required>
                <button id="send-btn"><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function(){

    $("#send-btn").on("click",function(){
   $value = $("#data").val();
   $msg = '<div class="user-inbox inbox"> <div class="msg-header"><p>'+ $value +'</p> </div> </div>';
   $(".form").append($msg);
   $("#data").val('');


$.ajax({

    url:'message.php',
    type:'POST',
    data: 'text='+$value,
    success: function(result){

$replay = '<div class="bot-inbox inbox"><div class="msg-header"> <p>'+ result +'</p></div> </div>';
$(".form").append($replay);


    }




});






    });


});



    </script>
</body>

</html>