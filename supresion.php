<?php
    // supresion d'une voyage : 
    $id_voyage = $_GET['id']; 
    require_once "database.php" ; 
    // supresion de voyage : 
    $sql = "DELETE FROM reservation WHERE idvoyage=?" ; 
    $etat_supresion = $pdo->prepare($sql); 
    $etat_supresion->execute([$id_voyage]); 
    $sql_requet_supresion = "DELETE FROM voyag WHERE id_voyage=? " ; 
    $stmt = $pdo->prepare($sql_requet_supresion); 
    $stmt->execute([$id_voyage]); 
    header("Location: Admin.php"); 




?>