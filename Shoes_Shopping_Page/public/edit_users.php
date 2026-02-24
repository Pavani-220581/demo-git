<?php
session_start();
$db = require '../config/mongo.php';

$id = $_GET['id'];
$user = $db->users->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newName = $_POST['name'];

    $db->users->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => ['name' => $newName]]
    );

    header("Location: list_users.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo $user['name']; ?>">
    <button type="submit">Update</button>
</form>