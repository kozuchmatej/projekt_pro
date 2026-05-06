<?php
$conn = new mysqli("localhost", "root", "root", "todo_app");

if ($conn->connect_error) {
    die("Chyba pripojenia: " . $conn->connect_error);
}
?>