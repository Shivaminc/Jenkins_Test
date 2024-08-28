<?php
$tasks = json_decode(file_get_contents('tasks.json'), true);
?>
<h1>Todo List</h1>
<ul>
    <?php foreach ($tasks as $id => $task): ?>
        <li>
            <?php echo htmlspecialchars($task['task']); ?>
            <a href="update.php?id=<?php echo $id; ?>">Update</a>
            <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="add.php">Add New Task</a>
