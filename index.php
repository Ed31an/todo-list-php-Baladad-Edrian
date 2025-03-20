<?php
include("db.php");
$result = $conn->query("SELECT * FROM tasks ORDER BY is_completed ASC, created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index File</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
<div class="sidebar">
        <h2>Todo List</h2>
        <br>
        <p>New Task</p>
</div>
<?php include('add_task.php'); ?>
<br><hr>
<table>
    <tr>
        <th>Task</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td style="<?= $row['is_completed'] ? 'text-decoration: line-through; color: gray;' : ''; ?>">
        <?= htmlspecialchars($row['task_name']); ?>
        </td>
        <td>
        <?= $row['is_completed'] ? '<span style="color: green; font-weight: bold;">Completed</span>' : 'Pending'; ?>
        </td>
        <td>
            <?php if (!$row['is_completed']): ?>
            <a href="complete_task.php?completeid=<?= $row['id']; ?>">Complete</a>
            <?php endif; ?>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
            <a href="delete_task.php?deleteid=<?= $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<hr>
</body>
</html>