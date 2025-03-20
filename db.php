<?php
$host = 'localhost'; // Database host
$dbname = 'todo_list'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password
$conn = "";
try {
    $conn = mysqli_connect($host, $username, $password, $dbname);
} catch (mysqli_exception) {
    echo "Could not connect <br>";
}
?>