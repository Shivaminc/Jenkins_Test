<?php
// delete.php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tasks = json_decode(file_get_contents('tasks.json'), true);
    unset($tasks[$id]);
    $tasks = array_values($tasks); // Re-index array
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
    header('Location: index.php'); // Redirect to list of tasks
    exit();
}
?>
