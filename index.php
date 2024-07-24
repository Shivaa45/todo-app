<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Todo List</h1>

    <form method="POST" action="add_todo.php">
        <input type="text" name="title" required>
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        <?php
        $sql = "SELECT * FROM todos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row['title'] . 
                     " <a href='delete_todo.php?id=" . $row['id'] . "'>Delete</a>" .
                     " <a href='toggle_todo.php?id=" . $row['id'] . "&completed=" . $row['completed'] . "'>" . 
                     ($row['completed'] ? "Unmark" : "Mark as done") . "</a>" . 
                     "</li>";
            }
        } else {
            echo "No todos found.";
        }
        ?>
    </ul>
</body>
</html>

