<?php 
include '../connect.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome= $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $categoria = $_POST['categoria'];

    $query ="SELECT * FROM categorie WHERE nome = '$categoria'";
    $result = $mysql->query($query) or die($mysql->error);

    if(count($result)==1){
        $row = $result->fetch_assoc();
        $cat = $row['id'];
    }
 
    $sql = sprintf("UPDATE progetti SET nome = '$nome', descrizione = '%s', categoria = '$cat' WHERE id = '$id'", $mysql->real_escape_string($descrizione));
    
    $result = $mysql->query($sql) or die("failed to insert logout time");

    header("location: ../index.php");
}