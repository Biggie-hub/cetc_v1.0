<?php

// Reusable function to connect to mysqli
function connect_mysqli(){
    // mysqli connect details
    $DATABASE_HOST = "localhost";
    $DATABASE_USER = "root";
    $DATABASE_PASS = "";
    $DATABASE_NAME = "cetc";

    // Create connection
    global $conn;
    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
}

// Template header
function template_header($title) {
    // DO NOT INDENT THE BELOW PHP CODE OR YOU WILL ENCOUNTER ISSUES
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="styles.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <a href=index.php><h1>Home</h1></a>
                <h1>Chebango EPZ Tea Company</h1>
                <a href="attendance.php"><i class="fas fa-poll-h"></i>Admin</a>
                <a href="login.php">login</a>
                <a href="logout.php">log out</a>
            </div>
        </nav>
    </html>
    EOT;
    }

// Template footer
function template_footer() {
    // DO NOT INDENT THE PHP CODE
    echo <<<EOT
        </body>
    </html>
    EOT;
    }

?>

?>