<?php
session_start();
$db = require '../config/mongo.php';

$users = $db->users->find();

echo "<h2>All Users</h2>";

foreach ($users as $user) {
    echo "Name: " . $user['name'] . " | ";
    echo "Email: " . $user['email'] . " | ";
    echo "<a href='edit_user.php?id=" . $user['_id'] . "'>Edit</a> | ";
    echo "<a href='delete_user.php?id=" . $user['_id'] . "'>Delete</a>";
    echo "<br><br>";
}
?>