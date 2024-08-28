<?php
// add.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    
    if (!empty($task)) {
        $tasks = json_decode(file_get_contents('tasks.json'), true);
        $tasks[] = ['task' => $task];
        file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
        header('Location: index.php'); // Redirect to list of tasks
        exit();
    }
}
?>
<form method="POST">
    <input type="text" name="task" placeholder="Enter task">
    <button type="submit">Add Task</button>
</form>
