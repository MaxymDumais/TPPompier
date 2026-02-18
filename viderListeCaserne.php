<?php
    $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
    $ins = $pdo->prepare("delete from caserne;");
    $ins->execute(); 
    header('Location: index.php');
?>