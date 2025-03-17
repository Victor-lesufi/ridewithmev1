<?php

# Define the log file path
$log_file = '../registration.log';

# Function to write logs
# Function to write logs with function name
function write_log($message) {
    global $log_file;
    $timestamp = date("Y-m-d H:i:s");
    $function_name = __FUNCTION__; // Get the name of the function
    error_log("[$timestamp] - [$function_name] - $message\n", 3, $log_file);
}


# check if username, password, name, and email submitted
if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['name']) &&
    isset($_POST['email'])
) {

    # Include the database connection file
    include '../db.conn.php';

    # Get data from POST request and store them in vars
    $name = $_POST['name'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    # Make URL data format for redirection
    $data = 'name=' . $name . '&username=' . $username . '&email=' . $email;

    # Simple form validation
    if (empty($name)) {
        $em = "Name is required";
        write_log("Failed registration attempt: Name is missing.");
        header("Location: ../../signup.php?error=$em");
        exit;
    } else if (empty($username)) {
        $em = "Username is required";
        write_log("Failed registration attempt: Username is missing.");
        header("Location: ../../signup.php?error=$em&$data");
        exit;
    } else if (empty($password)) {
        $em = "Password is required";
        write_log("Failed registration attempt: Password is missing.");
        header("Location: ../../signup.php?error=$em&$data");
        exit;
    } else if (strlen($password) < 5) {
        $em = "Password must be at least 5 characters long";
        write_log("Failed registration attempt: Password too short.");
        header("Location: ../../signup.php?error=$em&$data");
        exit;
    } else {
        # Check if the username is already taken
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $em = "The username ($username) is taken!";
            write_log("Failed registration attempt: Username '$username' already exists.");
            header("Location: ../../signup.php?error=$em&$data");
            exit;
        } else {
            write_log("Username '$username' is available, proceeding to the next steps.");

            # Initialize $new_img_name as null in case the user doesn't upload a profile picture
            $new_img_name = null;

            # Profile Picture Uploading (optional)
            if (isset($_FILES['pp']) && $_FILES['pp']['error'] === 0) {
                $img_name  = $_FILES['pp']['name'];
                $tmp_name  = $_FILES['pp']['tmp_name'];
                
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = $username . '.' . $img_ex_lc;
                    $img_upload_path = '../../uploads/' . $new_img_name;

                    if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        write_log("Profile picture uploaded successfully for user '$username'.");
                    } else {
                        write_log("Failed to move the uploaded profile picture for user '$username'.");
                    }
                } else {
                    $em = "You can't upload files of this type. Allowed extensions are 'jpg', 'jpeg', and 'png'.";
                    write_log("Failed registration attempt: Invalid profile picture format for user '$username'.");
                    header("Location: ../../signup.php?error=$em&$data");
                    exit;
                }
            } else {
                # Log that no profile picture was uploaded and proceed
                write_log("No profile picture uploaded for user '$username'. Proceeding without a profile picture.");
            }

            # Checking if the email is already taken
            $sql = "SELECT email FROM users WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                $em = "This email ($email) already exists. Try resetting your password.";
                write_log("Failed registration attempt: Email '$email' already exists.");
                header("Location: ../../signup.php?error=$em&$data");
                exit;
            } else {
                write_log("Email '$email' is available, proceeding with registration.");
            }

            # Password hashing
            $password = password_hash($password, PASSWORD_DEFAULT);

            # Inserting data into the database
            if ($new_img_name) {
                $sql = "INSERT INTO users (name, username, password, p_p, email) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$name, $username, $password, $new_img_name, $email]);
                write_log("User '$username' successfully registered with profile picture.");
            } else {
                $sql = "INSERT INTO users (name, username, password, email) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$name, $username, $password, $email]);
                write_log("User '$username' successfully registered without profile picture.");
            }

            # Success message
            $sm = "Your account has been created successfully. You may log in now.";
            write_log("Registration successful for user '$username'. Redirecting to login page.");
            header("Location: ../../index.php?success=$sm");
            exit;
        }
    }
} else {
    write_log("Failed registration attempt: Required fields are missing.");
    header("Location: ../../signup.php");
    exit;
}
