<?php
// update.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'id' is set and is not empty
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $id = $_POST['id'];
        $newTask = $_POST['task'];

        // Check if the task is not empty
        if (!empty($newTask)) {
            $tasks = json_decode(file_get_contents('tasks.json'), true);

            // Validate that the ID exists in the tasks array
            if (isset($tasks[$id])) {
                $tasks[$id]['task'] = $newTask;
                file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
                header('Location: index.php'); // Redirect to list of tasks
                exit();
            } else {
                echo "Invalid task ID.";
            }
        } else {
            echo "Task cannot be empty.";
        }
    } else {
        echo "Task ID is missing.";
    }
} else {
    // Check if 'id' is set in the URL and is not empty
    if (isset($_GET['id']) && $_GET['id'] !== '') {
        $taskId = $_GET['id'];
        $tasks = json_decode(file_get_contents('tasks.json'), true);

        // Validate that the ID exists in the tasks array
        if (isset($tasks[$taskId])) {
            $task = $tasks[$taskId];
        } else {
            echo "Invalid task ID.";
            exit();
        }
    } else {
        echo "Task ID is missing.";
        exit();
    }
}
?>

<!-- HTML form for updating the task -->
<form method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($taskId); ?>">
    <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>">
    <button type="submit">Update Task</button>
</form>
