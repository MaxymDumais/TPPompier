<?php
try {
    $id = $_POST['id'];
    $adresse = $_POST['adresse'];
    $idTypeIntervention = $_POST['idSelectTypeIntervention'];
    $dateTime = $_POST['dateTime'];
    $idCaserne = $_POST['idCaserne'];

    $pdo = new PDO("mysql:host=localhost;dbname=pompier", "root", "");

    $ins = $pdo->prepare("update intervention set Adresse = :adresse, IdTypeIntervention = :idTypeIntervention, DateTime = :dateTime where Id = :id");

    $ins->execute([
        ':adresse' => $adresse,
        ':idTypeIntervention' => $idTypeIntervention,
        ':dateTime' => $dateTime,
        ':id' => $id
    ]);

    header("Location: indexIntervention.php?idSelectCaserne=$idCaserne");
} catch (PDOException $e) {
    header("Location: indexIntervention.php?idSelectCaserne=$idCaserne");
}
