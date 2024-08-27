<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = trim($_POST['task']);

    if (!empty($task)) {
        $tasks = file_get_contents('tasks.json');
        $tasksArray = json_decode($tasks, true);

        $tasksArray[] = $task;

        file_put_contents('tasks.json', json_encode($tasksArray));
    }
}

header('Location: index.php');
