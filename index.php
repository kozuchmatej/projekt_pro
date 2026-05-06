<?php include 'db.php'; ?>

<h1>Todo List</h1>

<form action="add.php" method="POST">
    <input type="text" name="title" placeholder="Nová úloha" required>
    <button type="submit">Pridať</button>
</form>

<?php
$result = $conn->query("SELECT * FROM tasks");

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    
    echo $row['is_done'] ? "<s>{$row['title']}</s>" : $row['title'];

    echo " 
    <a href='update.php?id={$row['id']}'>✔</a>
    <a href='delete.php?id={$row['id']}'>❌</a>";

    echo "</div>";
}
?>