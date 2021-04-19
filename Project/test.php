<?php 
include '../connect.php';

    $cat = 'Web';
    $query = "SELECT id FROM categorie WHERE nome=$cat";
    $result = $mysql->query($query);
    
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"];
        }
    
?>    