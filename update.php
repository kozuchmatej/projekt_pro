<?php
include 'db.php';

$id = intval($_GET['id']);

$conn->query("
    UPDATE tasks 
    SET is_done = NOT is_done 
    WHERE id = $id
");

header("Location: index.php");
?>