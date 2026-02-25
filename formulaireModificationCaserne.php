<?php
$id = $_POST['id'];
$pdo = new PDO("mysql:host=localhost;dbname=pompier", "root", "");
$ins = $pdo->prepare("select * from caserne where id = :id");
$ins->execute([':id' => $id]);
$caserne = $ins->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="fireTruck.ico">
    <title>Modification de caserne</title>
</head>
<header>
    <form>
        <table>
            <tr>
                <td><img class="logo" src="fireTruck.ico" alt="Logo Caserne"></td>
                <td><input class="btn-header" value="Casernes" type="button" onclick="this.form.action = 'index.php'; this.form.method = 'GET'; this.form.submit();"></td>
                <td><input class="btn-header" value="Interventions" type="button" onclick="this.form.action = 'indexIntervention.php'; this.form.method = 'GET'; this.form.submit();"></td>
            </tr>
        </table>
    </form>
</header>

<body>
    <form class="form-caserne" action="modifierCaserne.php" method="POST">
        <table>
            <tr>
                <td>Nom : </td>
                <td><input class="input-style" type="text" name="nom" value="<?= $caserne['Nom'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Adresse : </td>
                <td><input class="input-style" type="text" name="adresse" value="<?= $caserne['Adresse'] ?>" required></td>
            </tr>
            <tr>
                <td>Ville : </td>
                <td><input class="input-style" type="text" name="ville" value="<?= $caserne['Ville'] ?>" required></td>
            </tr>
            <tr>
                <td>Province : </td>
                <td><input class="input-style" type="text" name="province" value="<?= $caserne['Province'] ?>" required></td>
            </tr>
            <tr>
                <td>Code postal : </td>
                <td><input class="input-style" type="text" name="codePostal" value="<?= $caserne['CodePostal'] ?>" required></td>
            </tr>
            <tr>
                <td>Téléphone : </td>
                <td><input class="input-style" type="text" name="telephone" value="<?= $caserne['Telephone'] ?>" required></td>
            </tr>
            <tr>
                <td><input class="btn-action" type="submit" value="Modifier"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?= $caserne['Id'] ?>">
    </form>
</body>

</html>