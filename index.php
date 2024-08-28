<?php
// index.php

$tasks = json_decode(file_get_contents('tasks.json'), true);
?>
<h1>Todo List</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li><?php echo htmlspecialchars($task['task']); ?></li>
    <?php endforeach; ?>
</ul>
<a href="add.php">Add New Task</a>
