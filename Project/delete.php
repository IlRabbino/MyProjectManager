<?php 
$mysql = new mysqli('localhost', 'test', 'test', 'todo_db');

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM progetti WHERE id=$id";
    $mysql->query($query);
    header("location: ../index.php");
}


