<?php
        try {
                $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
                $ins = $pdo->prepare("delete from caserne;");
                $ins->execute(); 
                header('Location: index.php');
        } catch (PDOException $e) {
                header('Location: index.php');
        }
        
?>