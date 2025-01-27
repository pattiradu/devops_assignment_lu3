<?php

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $gender = mysqli_real_escape_string($conn, $gender);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

        $sql = "INSERT INTO tbl_users (user_firstname, user_lastname, user_gender, user_email, user_password) 
            VALUES ('$firstname', '$lastname', '$gender', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
      
        header("Location: login.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
