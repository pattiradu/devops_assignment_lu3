<?php
// Include your database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize inputs
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $gender = mysqli_real_escape_string($conn, $gender);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to insert data
    $sql = "INSERT INTO tbl_users (user_firstname, user_lastname, user_gender, user_email, user_password) 
            VALUES ('$firstname', '$lastname', '$gender', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit(); // Ensure the script stops after the redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
