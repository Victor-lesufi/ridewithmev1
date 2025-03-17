<?php 
  session_start();
if (isset($_SESSION['username'])) {
  	# database connection file
  	include 'app/db.conn.php';

  	include 'app/helpers/user.php';
  	include 'app/helpers/chat.php';
  	include 'app/helpers/opened.php';

  	include 'app/helpers/timeAgo.php';

  	if (!isset($_GET['user'])) {
  		header("Location: home.php");
  		exit;
  	}

  	# Getting User data data
  	$chatWith = getUser($_GET['user'], $conn);

  	if (empty($chatWith)) {
  		header("Location: home.php");
  		exit;
  	}

  	$chats = getChats($_SESSION['user_id'], $chatWith['user_id'], $conn);

  	opened($chatWith['user_id'], $conn, $chats);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>

<style>
	.w-10{
width: 23px;
object-fit: cover;
border-radius: 50%;
	}
	.input-group textarea{
		height: 10px;
		
	}
	.input-group button{
		border-radius:0px 0px 15px 15px;
	}
	.d-flex .fs-7 .fa{
		
		margin-right: 5px;
	} 
	.opened-eye {
color: green;
}

.closed-eye {
color: red;
}
	.btn{
		border-radius: 50%;
	}
	.rounded-circle{
		object-fit: cover;
	}
  .flex{
    
    display: flex;
    margin-right:0;
  }
 
  
</style>



<body class="d-flex
             justify-content-center
             align-items-center
             vh-30">
    <div class="w-400 shadow p-4 rounded">
	

    	   <div class="d-flex align-items-center">
		   <a href="home.php" class="fs-7 link-dark"><i class="fa fa-arrow-left"></i></a>
    	   	  <img  class="rounded-circle" style="width:40px; height:40px;border:1px solid grey ;" src="uploads/<?=$chatWith['p_p']?> "
    	   	       class="w-10 rounded-circle ">

               <h3 class="display-4 fs-sm m-2">
               	  <?=$chatWith['name']?>  <?php if ($chatWith['Verified'] == 1) { ?>
                            <!-- Display the verified icon here -->
                           <i class="fa fa-check" aria-hidden="true"style="color:white; background-color: blue;border-radius:50%; border:1px solid blue;height:15px;width:15px;line-height:15px;font-size: 15px;"></i>
                        <?php } ?>
               	  <div class="d-flex
               	              align-items-center"
               	        title="online">
               	    <?php
                        if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
               	        <div class="online"></div>
               	        <small class="d-block p-1">Online</small>
               	  	<?php }else{ ?>
               	         <small class="d-block p-1 ">
               	         	Last seen:
               	         	<?=last_seen($chatWith['last_seen'])?>
               	         </small>
               	  	<?php } ?>
               	  </div>
               </h3>
    	   </div>

    	   <div class="shadow rounded
    d-flex flex-column
    mt-2 chat-box"
    id="chatBox">
    <?php 
        if (!empty($chats)) {
            foreach($chats as $chat){
                if($chat['from_id'] == $_SESSION['user_id']){ ?>
                    <p class="rtext ">
                        <?=$chat['message']?> 
                        <small class="d-block">
					
    <?=date('H:i', strtotime($chat['created_at']))?>
    <?php if($chat['opened'] == 1){ ?>
        <i class="fa fa-eye opened-eye"></i>

    <?php }else{ ?>
        <i class="fa fa-eye-slash closed-eye"></i>

    <?php } ?>
</small> 

                        </small> 
                    </p>
                <?php }else{ ?>
                  <div class="flex">
                  <img  class="rounded-circle" style="width:30px; height:30px; border:1px solid grey" src="uploads/<?=$chatWith['p_p']?> ">
                    <p class="ltext">
						
                        <?=$chat['message']?> 
                        <small class="d-block">
						<?=date('H:i', strtotime($chat['created_at']))?>
                        </small>      	
                    </p>
                </div>
                <?php } 
            }	
        } else { ?>
            <div class="alert alert-info 
                        text-center">
                <i class="fa fa-comments d-block fs-big"></i>
              <small>You and this user have no chat history,messages are encrypted only you and  '<?=$chatWith['name']?>' can see them. </small>
            </div>
    <?php } ?>

</div>
<div class="input-group mb-3">
  <textarea cols="3"
            id="message"
            class="form-control no-focus-border"
            placeholder="Type message here..."
            oninput="toggleButtonVisibility()"></textarea>
  <button class="btn btn-primary"
          id="sendBtn"
          style="display: none; margin-left: 5px;">
    <i class="fa fa-paper-plane"></i>
  </button>
</div>



<style>

	.no-focus-border:focus {
  outline: none !important;
  box-shadow: none !important;
}

  .input-group,#sendBtn {
    display: flex;
    align-items: center;
	
           
	
  }
  
  .btn-primary {
    margin-left: 10px;
    height: 40px;
    width: 40px;
    border-radius: 50%;
  }
  #message{
	
	border-radius: 20px;
  }
  #sendBtn{
	/* background-color: red; */
	border-radius: 50%;

	
            
           
           
           
	

  }
  


</style>

<script>
  function toggleButtonVisibility() {
    var message = document.getElementById('message');
    var sendBtn = document.getElementById('sendBtn');
    
    if (message.value.trim() === '') {
      sendBtn.style.display = 'none';
    } else {
      sendBtn.style.display = 'block';
    }
  }
</script>

</style>

		  

    </div>

 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

     
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
     
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("app/ajax/getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
    
      setInterval(fechData, 500);
    
    });
	const textarea = document.querySelector('textarea');
const maxHeight = 50; 
textarea.addEventListener('input', function() {
  this.style.height = 'auto';
  if (this.scrollHeight <= maxHeight) {
    this.style.height = this.scrollHeight + 'px';
  } else {
    this.style.height = maxHeight + 'px';
    this.style.overflowY = 'auto'; 
  }
});
</script>
 </body>
 
 </html>
<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>