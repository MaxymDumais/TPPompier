<?php
        try {
            $idCaserne = $_POST['idSelectCaserne'];
            $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
            $ins = $pdo->prepare("delete from intervention where idCaserne = :idCaserne;");
            $ins->execute(
            [':idCaserne' => $idCaserne]
            ); 
            header('Location: indexIntervention.php');
        } catch (PDOException $e) {
            header('Location: indexIntervention.php');
    }
        
?>