<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $newTask = $_POST['task'];

    if (!empty($id) && !empty($newTask)) {
        $tasks = json_decode(file_get_contents('tasks.json'), true);
        $tasks[$id]['task'] = $newTask;
        file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
        header('Location: index.php'); // Redirect to list of tasks
        exit();
    }
}

$taskId = $_GET['id'];
$tasks = json_decode(file_get_contents('tasks.json'), true);
$task = $tasks[$taskId];
?>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($taskId); ?>">
    <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>">
    <button type="submit">Update Task</button>
</form>
