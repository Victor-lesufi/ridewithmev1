<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Logs</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Courier New', monospace; /* Changed to monospaced font */
            background-color: #1e1e1e; /* Dark background */
            color: #ffffff; /* Light text color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 900px;
            background-color: #2e2e2e; /* Slightly lighter background for container */
            padding: 20px;
            box-shadow: none; /* Removed shadow for a flat look */
            border-radius: 4px; /* Reduced rounding */
            overflow: auto;
            max-height: 80vh;
            border: 1px solid #444; /* Border to mimic terminal window */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #00ff00; /* Bright green color for title */
        }

        .log-entry {
            background-color: #3e3e3e; /* Background for log entries */
            border-left: 5px solid #00ff00; /* Green border for entries */
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 2px; /* Reduced rounding for entries */
        }

        .log-entry p {
            margin: 0;
            font-size: 14px;
            color: #ffffff; /* White text color for log entry */
        }

        .timestamp {
            font-weight: bold;
            color: #00ffff; /* Cyan color for timestamps */
        }

        .message {
            color: #ffffff; /* White color for messages */
        }

        /* Scrollbar styling */
        .container::-webkit-scrollbar {
            width: 12px;
        }

        .container::-webkit-scrollbar-track {
            background: #1e1e1e; /* Dark scrollbar track */
        }

        .container::-webkit-scrollbar-thumb {
            background-color: #00ff00; /* Bright green scrollbar */
            border-radius: 20px;
            border: 3px solid #1e1e1e; /* Match the scrollbar track */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registration Logs</h1>
    <?php
    # Define the log file path
    $log_file = 'app/registration.log';

    # Check if the log file exists
    if (file_exists($log_file)) {
        # Read the log file
        $log_entries = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        # Loop through the log entries and display them
        foreach ($log_entries as $entry) {
            # Extract the timestamp and message from the log
            preg_match('/\[(.*?)\] - (.*)/', $entry, $matches);
            if (isset($matches[1]) && isset($matches[2])) {
                $timestamp = $matches[1];
                $message = $matches[2];
                
                echo "<div class='log-entry'>";
                echo "<p class='timestamp'>$timestamp</p>";
                echo "<p class='message'>$message</p>";
                echo "</div>";
            }
        }
    } else {
        echo "<p>No log file found.</p>";
    }
    ?>
</div>

</body>
</html>
