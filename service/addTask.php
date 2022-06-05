<?php
include './config.php';

$mysqli = new mysqli ($config['DB_HOST'] , $config['DB_USERNAME'] , $config['DB_PASSWORD'], $config['DB_DATABASE']);

$task = $_POST['task'];

if ($task !== '') {
     $mysqli->query("INSERT INTO tasks(tasks) VALUES ('$task')");
     echo  $mysqli->insert_id;
}

$mysqli->close();
