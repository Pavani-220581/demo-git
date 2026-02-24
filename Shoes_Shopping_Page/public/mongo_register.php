<?php
session_start();
require '../config/mongo.php';   // MongoDB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = require '../config/mongo.php';

    // Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = trim($_POST['password']);
    $gender = $_POST['gender'];
    $address = trim($_POST['address']);

    // ===== VALIDATION =====
    if (empty($name) || empty($email) || empty($mobile) || empty($password) || empty($address)) {
        die("All required fields must be filled!");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid Email Format!");
    }

    // ===== DUPLICATE CHECK =====
    $existingUser = $db->users->findOne(['email' => $email]);

    if ($existingUser) {
        die("Email already registered!");
    }

    // ===== FILE UPLOAD =====
    if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0) {

        $uploadDir = "../uploads/";
        $fileName = time() . "_" . basename($_FILES["upload_file"]["name"]);
        $targetFile = $uploadDir . $fileName;

        move_uploaded_file($_FILES["upload_file"]["tmp_name"], $targetFile);
    } else {
        die("File upload failed!");
    }

    // ===== INSERT INTO MONGODB =====
    $insertResult = $db->users->insertOne([
        'name' => $name,
        'email' => $email,
        'mobile' => $mobile,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'gender' => $gender,
        'address' => $address,
        'document' => $fileName,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    if ($insertResult->getInsertedCount() == 1) {
        echo "Registration Successful!";
    } else {
        echo "Something went wrong!";
    }
}
?>