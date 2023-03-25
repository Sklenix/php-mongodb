<?php
require 'vendor/autoload.php';

$databaseHost = 'localhost';
$databaseName = 'pa200hw03';
$databaseUsername = 'xsklena1';
$databasePort = 27017;
$databasePassword = 'Database12345';

$connectionUrl = sprintf('mongodb://%s:%d/%s', $databaseHost, $databasePort, $databaseName);
$connection = new MongoDB\Client($connectionUrl, array('username' => $databaseUsername, 'password' => $databasePassword));

$db = $connection->hw03pa200;
?>
