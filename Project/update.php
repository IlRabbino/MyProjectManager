<?php 
include '../connect.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $categoria = $_POST['categoria'];
    $query = "UPDATE progetti SET nome='$nome', descrizione='$descrizione', categoria='$categoria' WHERE id='$id'";
    $mysql->query($query) or die($mysql->error);
}

header("location: ../index.php");
?>