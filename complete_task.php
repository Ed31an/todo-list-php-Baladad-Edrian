<?php
include("db.php");

if (isset($_GET["completeid"])) {
    $id = $_GET["completeid"];
    $check = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $result = $check->get_result();
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE tasks SET is_completed = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
header("Location: index.php");
exit();
?>