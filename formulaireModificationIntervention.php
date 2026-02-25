<?php
$id = $_POST['id'];
$pdo = new PDO("mysql:host=localhost;dbname=pompier", "root", "");
$ins = $pdo->prepare("select * from intervention where id = :id");
$ins->execute([':id' => $id]);
$intervention = $ins->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="fireTruck.ico">
    <title>Modification d'intervention</title>
</head>
<header>
    <form>
        <table>
            <tr>
                <!-- Logo dans le header -->
                <td><img class="logo" src="fireTruck.ico" alt="Logo Caserne"></td>
                <td><input class="btn-header" value="Casernes" type="button" onclick="this.form.action = 'index.php'; this.form.method = 'GET'; this.form.submit();"></td>
                <td><input class="btn-header" value="Interventions" type="button" onclick="this.form.action = 'indexIntervention.php'; this.form.method = 'GET'; this.form.submit();"></td>
            </tr>
        </table>
    </form>
</header>

<body>
    <h1>Modification de l'intervention :</h1>
    <form class="form-caserne" action="modifierIntervention.php" method="POST">
        <table class="table-caserne">
            <tr>
                <td>Adresse : </td>
                <td><input class="input-style" type="text" name="adresse" value="<?= $intervention['Adresse'] ?>" required></td>
            </tr>
            <tr>
                <td>Type d'intervention : </td>
                <td>
                    <select class="select-style" name="idSelectTypeIntervention">
                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=pompier", "root", "");
                        $ins = $pdo->prepare("select * from typeIntervention order by id");
                        $ins->setFetchMode(PDO::FETCH_ASSOC);
                        $ins->execute();
                        $tabTypeIntervention = $ins->fetchAll();
                        $idTypeIntervention = $intervention['IdTypeIntervention'];
                        foreach ($tabTypeIntervention as $typeIntervention) {
                            if ($typeIntervention["Id"] == $idTypeIntervention)
                                echo "<option value=" . $typeIntervention["Id"] . " selected>" . $typeIntervention["NomTypeIntervention"] . "</option>";
                            else
                                echo "<option value=" . $typeIntervention["Id"] . ">" . $typeIntervention["NomTypeIntervention"] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date : </td>
                <td><input class="input-style" type="datetime-local" name="dateTime" value="<?= $intervention['DateTime'] ?>" required></td>
            </tr>
            <tr>
                <td><input class="btn-action" type="submit" value="Modifier"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?= $intervention['Id'] ?>">
        <input type="hidden" name="idCaserne" value="<?= $intervention['IdCaserne'] ?>">
    </form>
</body>

</html>