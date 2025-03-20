<?php
include("db.php");
if (isset($_GET['id'])) {
    $s_id = $_GET['id'];
    $get_sql = "SELECT * FROM tasks WHERE id='$s_id'";
    $query = mysqli_query($conn, $get_sql);
    
    if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    } else {
    die("Task not found.");
    }
} else {
    die("Error: Task ID not provided.");
}
if (isset($_POST['edit'])) {
    $s_id = $_POST['id']; 
    $s_name = $_POST['task'];
    $edit_sql = "UPDATE tasks SET task_name='$s_name' WHERE id='$s_id'";
    $data = mysqli_query($conn, $edit_sql);
    if ($data) {
        echo "Task updated successfully!";
        header("Location: index.php");
        exit();
    } else {
    echo "Failed to update task.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1e1e2e, #2a2b3c);
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .edit-form {
            background: rgba(45, 47, 59, 0.9);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.5);
            width: 40%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .edit-form input[type="text"], .edit-form input[type="submit"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: rgba(68, 71, 90, 0.8);
            color: white;
            font-size: 16px;
            outline: none;
            box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }
        .edit-form input[type="text"]:focus {
            background: rgba(80, 85, 105, 0.9);
            box-shadow: 0px 0px 10px rgba(80, 250, 123, 0.5);
        }
        .edit-form input[type="submit"] {
            background: linear-gradient(to right, #50fa7b, #33cc66);
            color: #282a36;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .edit-form input[type="submit"]:hover {
            background: #33cc66;
            box-shadow: 4px 4px 15px rgba(80, 250, 123, 0.5);
            transform: scale(1.05);
        }
    </style>
    <title>Edit Task</title>
<body>
   <h1>Edit Task</h1> 
   <form class="edit-form" action="" method="POST">
       <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
       <div>
           <label>Task</label>
           <input type="text" name="task" value="<?= htmlspecialchars($row['task_name']) ?>">
       </div>
       <br>
       <div>
           <input type="submit" name="edit" value="Edit">
       </div>
   </form>
</body>
</html>
