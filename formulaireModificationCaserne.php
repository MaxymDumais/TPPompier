<?php
    $id = $_POST['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
    $ins = $pdo->prepare("select * from caserne where id = :id");
    $ins->execute([':id' => $id]);
    $caserne = $ins->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de caserne</title>
</head>
<body>
    <form action="modifierCaserne.php" method="POST">
        <table>
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom" value="<?= $caserne['Nom']?>" readonly></td>
            </tr>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" name="adresse" value="<?= $caserne['Adresse']?>" required></td>
            </tr>
            <tr>
                <td>Ville : </td>
                <td><input type="text" name="ville" value="<?= $caserne['Ville']?>" required></td>
            </tr>
            <tr>
                <td>Province : </td>
                <td><input type="text" name="province" value="<?= $caserne['Province']?>" required></td>
            </tr>
            <tr>
                <td>Code postal : </td>
                <td><input type="text" name="codePostal" value="<?= $caserne['CodePostal']?>" required></td>
            </tr>
            <tr>
                <td>Téléphone : </td>
                <td><input type="text" name="telephone" value="<?= $caserne['Telephone']?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Modifier"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?= $caserne['Id'] ?>">
    </form>
</body>
</html>