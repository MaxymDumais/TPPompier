<?php
    $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
    $ins = $pdo->prepare("insert into caserne (nom,adresse,ville,province,codePostal,telephone) values(:nom,:adresse,:ville,:province,:codePostal,:telephone)");
    $ins->execute(array(
        ":nom"=>$_POST['nom'],
        ":adresse"=>$_POST['adresse'],
        ":ville"=>$_POST['ville'],
        ":province"=>$_POST['province'],
        ":codePostal"=>$_POST['codePostal'],
        ":telephone"=>$_POST['telephone']
        )); 
    header('Location: index.php');
?>