<?php
include "db.php"; // global connection variables

function registerUser() {
    global $conn; // required by lab

    // static counter
    static $count = 0;
    $count++;

    // Local variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Boolean flag
    $success = false;

    // Insert query
    $sql = "INSERT INTO users (username, email, mobile, password, gender, address)
            VALUES ('$name', '$email', '$mobile', '$password', '$gender', '$address')";

    if (!mysqli_query($conn, $sql)) {
        die("Error inserting user: " . mysqli_error($conn));
    } else {
        $success = true;
    }

    if ($success) {
        echo "<h2>Registration Successful!</h2>";
        echo "Total registrations in this request: $count";
    }
}

registerUser();
?>
