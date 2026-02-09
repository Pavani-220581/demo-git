<?php
include "db.php";

function registerUser() {
    global $conn;

    // Static counter (lab requirement)
    static $count = 0;
    $count++;

    // Form data
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $mobile   = $_POST['mobile'];
    $password = $_POST['password'];
    $gender   = $_POST['gender'];
    $address  = $_POST['address'];

    /* ---------- FILE UPLOAD PART ---------- */

    $file_name = $_FILES['upload_file']['name'];
    $temp_name = $_FILES['upload_file']['tmp_name'];
    $upload_dir = "uploads/";
    $upload_path = $upload_dir . basename($file_name);

    // Check uploads folder
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move uploaded file
    if (!move_uploaded_file($temp_name, $upload_path)) {
        die("File upload failed");
    }

    /* ---------- DATABASE INSERT ---------- */

    $sql = "INSERT INTO users 
            (username, email, mobile, password, gender, address, file_name)
            VALUES 
            ('$name', '$email', '$mobile', '$password', '$gender', '$address', '$file_name')";

    if (!mysqli_query($conn, $sql)) {
        die("Database Error: " . mysqli_error($conn));
    }

    echo "<h2>Registration Successful!</h2>";
    echo "<p>Total registrations in this request: $count</p>";
    echo "<p>Uploaded File: <b>$file_name</b></p>";

    echo "<a href='download.php?file=$file_name'>
            <button>Download Uploaded File</button>
          </a><br><br>";

    echo "<a href='login.php'>Go to Login</a>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    registerUser();
}
?>

