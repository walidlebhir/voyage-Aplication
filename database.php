<?php
    //conxio de base de donnes : 
    $username = "root" ; 
    $password = "" ; 
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=voyage",$username , $password) ; 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo"problemme de conexion de base de donnes ".$e->getMessage(); 
    }


?> 