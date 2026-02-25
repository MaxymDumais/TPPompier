<?php

$id = $_POST['id'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$province = $_POST['province'];
$codePostal = $_POST['codePostal'];
$telephone = $_POST['telephone'];

$pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");

$ins = $pdo->prepare("update caserne set Nom = :nom, Adresse = :adresse, Ville = :ville, Province = :province, CodePostal = :codePostal, Telephone = :telephone where Id = :id");

$ins->execute([
    ':nom' => $nom,
    ':adresse' => $adresse,
    ':ville' => $ville,
    ':province' => $province,
    ':codePostal' => $codePostal,
    ':telephone' => $telephone,
    ':id' => $id
]);

header('Location: index.php');
?>