<?php
session_start();
$db = require '../config/mongo.php';

$id = $_GET['id'];

$db->users->deleteOne([
    '_id' => new MongoDB\BSON\ObjectId($id)
]);

header("Location: list_users.php");
exit();
?>