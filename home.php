<?php
session_start();

if (isset($_SESSION['username'])) {

	include 'app/db.conn.php';

	include 'app/helpers/user.php';
	include 'app/helpers/conversations.php';
	include 'app/helpers/timeAgo.php';
	include 'app/helpers/last_chat.php';
	include 'connect.php';


	$user = getUser($_SESSION['username'], $conn);


	$conversations = getConversation($user['user_id'], $conn);

?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>RideWithMe</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		

		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	 <?php
	//include 'nav.php'?>

	<style>

body{
    justify-content: center;
    align-items: center;
    min-height: 50vh;
    text-decoration:none;
    
	/* padding: 10px; */
 }
.first{
	background-color:whitesmoke;
	/* width: 100%; */
	padding: 50px;
	margin-top: 20px;
	border-radius: 5px;
}
.second{
	display: block;
	text-align: center;
	/* background-color: red; */
	/* margin: 3px; */
}
.second img{
	border-radius: 50%;
	object-fit: cover;
	width: 65px;

}
.second img a{
	margin-top: 5px;
	background-color: black;
}
.input input{
	background-color: white;
	padding: 4px;
	border-radius: 9px;

}
#chatList{
	background-color: white;
	overflow: auto;
	border-radius: 7px;
	flex-wrap: wrap;
	overflow-x: hidden;

}
#chatList li a {
	display: flex;
	justify-content: space-between;
	padding: 5px;
	align-items: center;
	
	

}
#chatList li a img{
	width: 45px;
	border-radius: 50%;
}
#chatList li a h3{
	font-size: large;
	margin: 2px;
}
.head{
	/* background-color:lightgrey; */
	width: 100%;
	/* line-height: 18px; */
	/* justify-content: flex-end; */
	/* display: flex; */
	padding: 5px;
	/* position: fixed; */
	/* top: 0px; */
}
.nav .list a{
	
	justify-content: flex-end;
}
.list{
	justify-content: flex-end;
	background-color: red;
	display: flex;
}
.nav .logo a{
	background-color: white;
	justify-content: space-between;
}
/* *{
	overflow-x: hidden;
} */
body{
	/* background-color: lightsteelblue; */
	text-decoration: none;
}
*{
	text-decoration: none;
}
.ngwato{
	background-color: lightsalmon;
	padding: 5px;
	/* border-radius: 10px; */
	margin-bottom: 1px;
	position: fixed;
	top: 0;
	width: 100%;
	line-height: 13px;
}
.ngwato a{
	text-align: right;
	
	float: right;
	justify-content: space-between;
}
.first .second img .w-20{
	background-color: red;
}
.input{
	text-align: center;
	width: auto;
}
img{
	border-radius: 50%;
	object-fit: cover;
	width: 25px;
	
}
.rounded-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #0487E2;
            color: white;
            font-size: 16px;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
        }
        .alert{
            background-color: #cefad0;
             border-radius: 50px;
             margin:10px;
        }
         .conversation-link:hover {
        text-decoration: none; /* Remove underline on hover */
        background-color: #fff6f6;
        position: relative;
        transition: background-color 0.2s ease, color 0.2s ease;
    }
    }
	</style>

	<body>
<?php
include 'nav.php';

?>
	


			<div class="   first ">
						<div class="second">
    <img src="uploads/<?= $user['p_p'] ?>" class="rounded-circle" style="width:135px; height:135px; border:1px solid grey;">
   <h3 class="fs-xs m-2"><?= $user['name'] ?><?php echo ($user['Verified'] == 1) ? ' <i class="fa fa-check" aria-hidden="true"style="color:white; background-color: blue;border-radius:50%; border:1px solid blue;height:16px;width:16px;line-height:16px;font-size: 16px;"></i>
' : ''; ?></h3>
</div>
				<div class=" input ">

				<input type="search" placeholder="Search users..." id="searchText" >

				<!-- <button class="btn btn-primary" id="serachBtn">
					<i class="fa fa-search"></i>
				</button> -->
			</div>
				</div> 


			

			


			
				<ul id="chatList" class=" list-group mvh-50 ">
					<?php if (!empty($conversations)) { ?>
						<?php

						foreach ($conversations as $conversation) { ?>
							<li>
								<a href="chat.php?user=<?= $conversation['username'] ?>" class="conversation-link">
	    				          
									<div class="head"> 
	    					           <div class="vic"> 
										<img class="rounded-circle" style="width:50px;height:50px; border:1px solid grey; "src="uploads/<?= $conversation['p_p'] ?> " >
										<h3 class="fs-xs m-2">
											          <?= $conversation['name'] ?> 		<?php if ($conversation['Verified'] == 1) { ?>
										<i class="fa fa-check" aria-hidden="true"style="color:white; background-color: blue;border-radius:50%; border:1px solid blue;height:15px;width:15px;line-height:15px;font-size: 15px;"></i>
                            
                        <?php } ?><br>
											<small>
												<?php
												echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
												?>
												</h3>
												</div>
											</small>
									
									</div>
									<?php if (last_seen($conversation['last_seen']) == "Active") { ?>
										<div title="online">
											<div class="online"></div>
										</div>
									<?php } ?>
								</a>
							</li>
						<?php } ?>
					<?php } else { ?>
						
						<div class="alert alert-info 
    				            text-center">
							<i class="fa fa-comments-o d-block fs-big"></i>
							You have no messages, start conversation by searching for people. all your chats will appear here
						</div>
					<?php } ?>
				</ul>
			
				</div>

<a href="users.php" class="rounded-button"><i class="fa fa-users"></i> </a>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
			$(document).ready(function() {

			
				$("#searchText").on("input", function() {
					var searchText = $(this).val();
					if (searchText == "") return;
					$.post('app/ajax/search.php', {
							key: searchText
						},
						function(data, status) {
							$("#chatList").html(data);
						});
				});

				
				$("#serachBtn").on("click", function() {
					var searchText = $("#searchText").val();
					if (searchText == "") return;
					$.post('app/ajax/search.php', {
							key: searchText
						},
						function(data, status) {
							$("#chatList").html(data);
						});
				});



				let lastSeenUpdate = function() {
					$.get("app/ajax/update_last_seen.php");
				}
				lastSeenUpdate();
		
				setInterval(lastSeenUpdate, 10000);

			});
		</script>
		</div>
		
	</body>

	</html>
<?php
} else {
	header("Location: index.php");
	exit;
}
