<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Include the function file
include 'functions.php';

// Connect Mysqli
$mysqli = connect_mysqli();
$msg = '';

// If Reg no. is input
if(isset($_POST['username'])) {
    // MySQL query that selects the voter records by Registration No.
    $stmt = mysqli_prepare($conn, 'SELECT * FROM employee_details WHERE no = ?');

    // Bind Parameters
    $_SESSION['user'] = $_POST['username'];
    $username = trim($_POST['username']);
    global $username;
    mysqli_stmt_bind_param($stmt, 's', $username);

    // Execute
    mysqli_stmt_execute($stmt);

    // Store result
    mysqli_stmt_store_result($stmt);

    // Check if the username record exists with the reg_no specified
    if(mysqli_stmt_num_rows($stmt) == 1){
        // Username is correct, so start a new session
        session_start();

        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];
        $ipaddress = $_SESSION['ipaddress'];

        $msg = 'Welcome.';

        // Redirect user to the result page
        header('Location: index.php?id=' . $_GET['id']);
        exit;
    }else {
        $msg = 'Employee with that Registration no. does not exist.';
    }
}else {
    $msg = 'Enter Registration no.';
}

?>

<?=template_header("Log In")?>

<div class="container">
    <form method="post" action="login.php">
        <h1>LogIn</h1>
        <div class="form-field">
            <label for="Usernames">Employee No.</label>
            <input type="text" name="username">
        </div>
        <button type="submit" name="login_user">Login</button>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
<?=template_footer()?>