<?php
$conn = new mysqli("localhost", "root", "root");


$conn->query("CREATE DATABASE IF NOT EXISTS todo_app");
$conn->select_db("todo_app");


$conn->query("
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50)
)");


$conn->query("
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    is_done BOOLEAN DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
)");


$conn->query("INSERT INTO users (username) VALUES ('test_user')");
$conn->query("INSERT INTO tasks (user_id, title) VALUES (1, 'Prvá úloha'), (1, 'Druhá úloha')");

echo "Databáza vytvorená!";
?>
