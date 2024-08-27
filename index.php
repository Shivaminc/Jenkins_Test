<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add.php" method="POST">
        <input type="text" name="task" placeholder="New Task">
        <button type="submit">Add Task</button>
    </form>

    <h2>Your Tasks:</h2>
    <ul>
        <?php
        include 'tasks.php';
        ?>
    </ul>
</body>
</html>
