<?php
session_start();

# Function to write logs
function write_log($message) {
    $log_file = 'user_activity.log';  // Log file path
    $current_time = date('Y-m-d H:i:s');    // Get current timestamp
    $log_message = "[$current_time] $message\n";  // Format the log message
    
    # Append the message to the log file
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

# Set the max attempts and block time (in seconds)
$max_attempts = 3;
$block_time = 15 * 60; // 15 minutes in seconds

# Check if the user has a block and calculate the remaining block time
if (isset($_SESSION['login_block_time'])) {
    $block_duration = time() - $_SESSION['login_block_time'];

    if ($block_duration < $block_time) {
        $remaining_time = ($block_time - $block_duration) / 60;
        $em = "You are blocked. Please try again after " . round($remaining_time) . " minutes.";
        write_log("Blocked user attempted to login. Remaining block time: $remaining_time minutes.");
        header("Location: ../../index.php?error=$em");
        exit;
    } else {
        # Block time has expired, reset the login attempts
        unset($_SESSION['login_attempts']);
        unset($_SESSION['login_block_time']);
    }
}

# Check if username & password are submitted
if (isset($_POST['username']) && isset($_POST['password'])) {

    # Database connection file
    include '../db.conn.php';

    # Get data from POST request and store them in variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    # Simple form validation
    if (empty($username)) {
        $em = "Username is required";
        write_log("Failed login attempt: Username missing.");
        header("Location: ../../index.php?error=$em");
        exit;
    } else if (empty($password)) {
        $em = "Password is required";
        write_log("Failed login attempt: Password missing for user '$username'.");
        header("Location: ../../index.php?error=$em");
        exit;
    } else {
        # Check if login attempts session exists, otherwise initialize it
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
        }

        # If login attempts exceed the max attempts, block the user
        if ($_SESSION['login_attempts'] >= $max_attempts) {
            $_SESSION['login_block_time'] = time();  // Set block time
            $em = "You have been blocked due to too many failed login attempts. Try again in 15 minutes.";
            write_log("User '$username' blocked due to too many failed attempts.");
            header("Location: ../../index.php?error=$em");
            exit;
        }

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        # If the username exists
        if ($stmt->rowCount() === 1) {
            # Fetching user data
            $user = $stmt->fetch();

            # Check if user is blocked
            if ($user['blocked'] == 1) {
                $em = "Your account is blocked";
                write_log("Failed login attempt: blocked user '$username' attempted to login.");
                header("Location: ../../index.php?error=$em");
                exit;
            }

            # If username matches
            if ($user['username'] === $username) {
                # Verifying the encrypted password
                if (password_verify($password, $user['password'])) {
                    # Successful login
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['user_id'] = $user['user_id'];

                    write_log("Successful login: User $username logged in.");
                    
                    # Reset login attempts on successful login
                    unset($_SESSION['login_attempts']);
                    unset($_SESSION['login_block_time']);

                    # Redirect to 'home.php'
                    header("Location: ../../home.php");
                    exit;
                } else {
                    # Incorrect password
                    $_SESSION['login_attempts']++;
                    $em = "Incorrect login details. Attempt " . $_SESSION['login_attempts'] . " of $max_attempts.";
                    write_log("Failed login attempt: Incorrect password for user '$username'.");
                    
                    if ($_SESSION['login_attempts'] >= $max_attempts) {
                        $_SESSION['login_block_time'] = time();
                        $em = "You have been blocked due to too many failed login attempts. Try again in 15 minutes.";
                             write_log("user '$username'. must retry after 15 mins");
                    }

                    header("Location: ../../index.php?error=$em");
                    exit;
                }
            } else {
                # Incorrect username
                $_SESSION['login_attempts']++;
                $em = "Incorrect username or password. Attempt " . $_SESSION['login_attempts'] . " of $max_attempts.";
                write_log("Failed login attempt: Incorrect username '$username'.");
                
                if ($_SESSION['login_attempts'] >= $max_attempts) {
                    $_SESSION['login_block_time'] = time();
                    $em = "You have been blocked due to too many failed login attempts. Try again in 15 minutes.";
                }

                header("Location: ../../index.php?error=$em");
                exit;
            }
        } else {
            # Username does not exist
            $_SESSION['login_attempts']++;
            $em = "Incorrect username or password. Attempt " . $_SESSION['login_attempts'] . " of $max_attempts.";
            write_log("Failed login attempt: Username '$username' does not exist.");
            
            if ($_SESSION['login_attempts'] >= $max_attempts) {
                $_SESSION['login_block_time'] = time();
                $em = "You have been blocked due to too many failed login attempts. Try again in 15 minutes.";
            }

            header("Location: ../../index.php?error=$em");
            exit;
        }
    }
} else {
    write_log("Direct access attempt to login script without POST data.");
    header("Location: ../../index.php");
    exit;
}
?>
