<?php
function lastChat($id_1, $id_2, $conn){
   
    $sql = "SELECT * FROM chats
            WHERE (from_id=? AND to_id=?)
            OR    (to_id=? AND from_id=?)
            ORDER BY chat_id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);
 
    if ($stmt->rowCount() > 0) {
        $chat = $stmt->fetch();
        $message = $chat['message'];
        $opened = $chat['opened'];
        $unopened_count = 0;

        
        if ($opened == 0) {
            $sql = "SELECT COUNT(*) as num_unopened FROM chats WHERE to_id = ? AND from_id = ? AND opened = 0";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_1, $id_2]);
            $row = $stmt->fetch();
            $unopened_count = $row['num_unopened'];
        }

       
        if (strlen($message) > 41) {
            $message = substr($message, 0, 41) . '...';
        }
        if ($unopened_count > 0) {
            
             $message = "<span style='color:black; font-weight:bold;'>$message</span> <span class='badge rounded-circle bg-danger'>$unopened_count</span>";


        } else {
            $message = "<span>$message</span>";
        }
        

        return $message;
        
    } else {
        return '';
    }
};
?>
