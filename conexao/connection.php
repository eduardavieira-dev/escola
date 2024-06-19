<?php
$connection = new mysqli("localhost", "root", "", "Sistema_escolar");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
