<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=pompier", "root", "");
    $ins = $pdo->prepare("delete from intervention where id=:id;");
    $ins->execute([':id' => $_POST['id']]);
    echo $_POST['id'];
    header('Location: indexIntervention.php');
} catch (PDOException $e) {
    header('Location: indexIntervention.php');
}
