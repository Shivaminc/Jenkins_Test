<?php
if (file_exists('tasks.json')) {
    $tasks = file_get_contents('tasks.json');
    $tasksArray = json_decode($tasks, true);

    foreach ($tasksArray as $task) {
        echo "<li>" . htmlspecialchars($task) . "</li>";
    }
} else {
    echo "<li>No tasks yet!</li>";
}
