<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    
    if (!empty($task)) {
        if (file_exists('tasks.json')) {
            $tasks = json_decode(file_get_contents('tasks.json'), true);
        } else {
            $tasks = [];
        }
        $tasks[] = ['task' => $task];
        file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
        header('Location: index.php'); // Redirect to list of tasks
        exit();
    }
}
?>
<form method="POST" action="add.php">
    <input type="text" name="task" placeholder="Enter task">
    <button type="submit">Add Task</button>
</form>
