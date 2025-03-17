<?php
session_start();

if (isset($_SESSION['username'])) {
    if(isset($_POST['key'])){
        include '../db.conn.php';
      
        $key = "%{$_POST['key']}%";
        $sql = "SELECT * FROM users
                WHERE username
                LIKE ? OR name LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$key, $key]);

        if($stmt->rowCount() > 0){ 
            $users = $stmt->fetchAll();

            foreach ($users as $user) {
                if ($user['user_id'] == $_SESSION['user_id']) continue;
                ?>
                <li class="list-group-item">
                    <a href="chat.php?user=<?=$user['username']?>"
                       class="d-flex justify-content-between align-items-center p-2">
                        <div class="d-flex align-items-center">
                            <img src="uploads/<?=$user['p_p']?>"
                                 class="rounded-circle" style="width:40px; height:40px;">
                            <h3 class="fs-xs m-2">
                                <?=$user['name']?>
                                <?php if ($user['Verified'] == 1): ?>
                                    <i class="fa fa-check" aria-hidden="true" style="color:white; background-color: blue;border-radius:50%; border:1px solid blue;height:15px;width:15px;line-height:15px;font-size: 15px;"></i>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </a>
                </li>
                <?php
            }
        } else { ?>
            <div id="notFoundMessage" class="alert alert-info text-center">
                <i class="fa fa-user-times d-block fs-big" style="color: lightcoral;"></i>
                '<?=htmlspecialchars($_POST['key'])?>'
                is not found.
            </div>

            <script>
                // JavaScript to hide the message after 5 seconds and redirect to home.php
                setTimeout(function() {
                    document.getElementById('notFoundMessage').style.display = 'none';
                    window.location.href = 'home.php'; // Redirect to home.php after hiding the message
                }, 3000); // 5000 milliseconds = 5 seconds
            </script>
        <?php }
    }

} else {
    header("Location: ../../index.php");
    exit;
}
?>
