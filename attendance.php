<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include the function file
include 'functions.php';



?>

<?=template_header("Log In")?>

<div class="container">
    <form method="post" action="attendance.php">
        <h1>Attendance Log</h1>
        <div class="form-field">
            <label for="Usernames">Employee No.</label>
            <input type="text" name="userno">
        </div>
        <div class="form-field">
            <label for="Usernames">Employee Name</label>
            <input type="text" name="username">
        </div>
        <div class="form-field">
            <label for="Usernames">Date(dd/mm/yyyy)</label>
            <input type="text" name="date">
        </div>
        <button type="submit" name="log_emp">Submit</button>
    </form>
</div>
<?=template_footer()?>