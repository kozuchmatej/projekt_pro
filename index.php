<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="text-center mb-4">📝 Todo List</h1>

        <form action="add.php" method="POST" class="d-flex gap-2 mb-4">

            <input 
                type="text" 
                name="title" 
                class="form-control"
                placeholder="Napíš novú úlohu..."
                required
            >

            <button class="btn btn-primary">
                Pridať
            </button>

        </form>

        <?php
        $result = $conn->query("SELECT * FROM tasks");

        while ($row = $result->fetch_assoc()) {

            echo "<div class='d-flex justify-content-between align-items-center border rounded p-3 mb-2 bg-white'>";

            echo "<div>";

            echo $row['is_done']
                ? "<span class='text-decoration-line-through text-muted'>{$row['title']}</span>"
                : "<span>{$row['title']}</span>";

            echo "</div>";

            echo "<div>";

            echo "
            <a href='update.php?id={$row['id']}' 
               class='btn btn-success btn-sm me-2'>
               ✔
            </a>

            <a href='delete.php?id={$row['id']}'
               class='btn btn-danger btn-sm'
               onclick='return confirm(\"Naozaj vymazať?\")'>
               ❌
            </a>";

            echo "</div>";

            echo "</div>";
        }
        ?>

    </div>

</div>

</body>
</html>