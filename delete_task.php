<?php
include("db.php");
if (isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $sql ="DELETE FROM tasks WHERE id= $id";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "connected";
        header('Location: index.php');
        exit();
    }else{
        die(mysqli_error($conn));
    }
}?>