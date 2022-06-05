<?php
include './config.php';

$mysqli = new mysqli ($config['DB_HOST'] , $config['DB_USERNAME'] , $config['DB_PASSWORD'], $config['DB_DATABASE']);

$id = $_POST['currentID'];

$success = $mysqli->query("DELETE FROM tasks WHERE id = $id");

echo $id;
$mysqli->close();
?>