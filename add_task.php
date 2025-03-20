<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
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
        .add-form {
            background: rgba(45, 47, 59, 0.9);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.5);
            width: 40%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .add-form input[type="text"], .add-form input[type="date"], .add-form input[type="submit"] {
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
        .add-form input[type="text"]:focus, .add-form input[type="date"]:focus {
            background: rgba(80, 85, 105, 0.9);
            box-shadow: 0px 0px 10px rgba(80, 250, 123, 0.5);
        }
        .add-form input[type="submit"] {
            background: linear-gradient(to right, #50fa7b, #33cc66);
            color: #282a36;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .add-form input[type="submit"]:hover {
            background: #33cc66;
            box-shadow: 4px 4px 15px rgba(80, 250, 123, 0.5);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h2>New Task</h2>
    <form class="add-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input type="text" name="task" placeholder="Task Name"><br>
    <input type="date" name="date">
    <input type="submit" name="Add" value="Add">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "task", FILTER_SANITIZE_SPECIAL_CHARS);
   
    if (empty($username)) {
    echo "Please Enter Your Task";
    } else {
        $sql = "INSERT INTO tasks (task_name) VALUES ('$username')";
        mysqli_query($conn, $sql);
        echo "Click Again to Add!";
        header("Location: index.php"); 
        exit();
        
    }
}
?>