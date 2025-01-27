<?php
session_start();

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
   
    $sql = "SELECT * FROM tbl_users WHERE user_email = '$email' AND user_password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // User found, login successful
        $user = mysqli_fetch_assoc($result);

        // Set session variables for the logged-in user
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_firstname'] . " " . $user['user_lastname'];
        
        // Redirect to home page
        header("Location: home.php");
        exit();
    } else {
        // If credentials are wrong, redirect to login page with an error message
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
