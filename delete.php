<?php
include_once("config.php");
$id = $_GET['id'];
$db->employees->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId($id)));
header("Location:index.php");
?>
