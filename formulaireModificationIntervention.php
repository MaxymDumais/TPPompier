<?php
    $id = $_POST['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
    $ins = $pdo->prepare("select * from intervention where id = :id");
    $ins->execute([':id' => $id]);
    $intervention = $ins->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'intervention</title>
</head>
<body>
    <form action="modifierIntervention.php" method="POST">
        <table>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" name="adresse" value="<?= $intervention['Adresse']?>" required></td>
            </tr>
            <tr>
                <td>Type d'intervention : </td>
                <td>
                <select name="idSelectTypeIntervention">
                    <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
                        $ins = $pdo->prepare("select * from typeIntervention order by id");
                        $ins->setFetchMode(PDO::FETCH_ASSOC);
                        $ins->execute();
                        $tabTypeIntervention = $ins->fetchAll();
                        $idTypeIntervention = $intervention['IdTypeIntervention'];
                        foreach ($tabTypeIntervention as $typeIntervention) {
                        if($typeIntervention["Id"] == $idTypeIntervention)
                            echo "<option value=" . $typeIntervention["Id"] . " selected>" . $typeIntervention["NomTypeIntervention"] . "</option>";
                        else
                            echo "<option value=" . $typeIntervention["Id"] . ">" . $typeIntervention["NomTypeIntervention"] . "</option>";
                        }
                    ?>
                </select>
            </tr>
            <tr><td><input type="submit" value="Modifier"></td></tr>
        </table>
        <input type="hidden" name="id" value="<?= $intervention['Id'] ?>">
        <input type="hidden" name="idCaserne" value="<?= $intervention['IdCaserne'] ?>">
    </form>
</body>
</html>