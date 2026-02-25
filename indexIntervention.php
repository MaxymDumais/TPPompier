<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interventions</title>
</head>
<header>
    <form>
        <table>
            <tr>
                <td><input value="Casernes" type="button" onclick="this.form.action = 'index.php'; this.form.method = 'GET'; this.form.submit();"></td>
                <td><input value="Interventions" type="button" onclick="this.form.action = 'indexIntervention.php'; this.form.method = 'Get'; this.form.submit();"></td>
            </tr>   
        </table>
    </form>
</header>
<body>
    <h1>Liste des interventions : </h1>

    <label>Sélectionnez une caserne : </label>
        <form method="get">
        <select name="idSelectCaserne" onchange="this.form.submit();">
            <?php
                $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
                $ins = $pdo->prepare("select * from caserne order by id");
                $ins->setFetchMode(PDO::FETCH_ASSOC);
                $ins->execute(); 
                $tabCaserne = $ins->fetchAll(); 
                $idCaserne = isset($_GET['idSelectCaserne']) ? $_GET['idSelectCaserne'] : $tabCaserne[0]['Id'];
                foreach ($tabCaserne as $caserne) {
                    if($caserne["Id"] == $idCaserne)
                        echo "<option value=" . $caserne["Id"] . " selected>" . $caserne["Nom"] . "</option>";
                    else
                        echo "<option value=" . $caserne["Id"] . ">" . $caserne["Nom"] . "</option>";
                }
            ?>
        </select>
        </form>
        <br><br><br>
        <form>
        <table>
            <tr>
                <th>Adresse</th>
                <th>Type d'intervention</th>
                <th>
                    <input value="Vider la liste" type="button" onclick=
                    "if (confirm('Voulez-vous vraiment supprimer la liste des interventions?')) 
                    {
                        this.form.action = 'viderListeIntervention.php'; 
                        this.form.method = 'POST'; 
                        this.form.submit();
                    }">
                </th>
            </tr>
            <tr>
                <?php
                    $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
                    $ins = $pdo->prepare("select i.*, t.nomTypeIntervention from intervention i join typeIntervention t on i.idTypeIntervention = t.id where idCaserne = $idCaserne");
                    $ins->setFetchMode(PDO::FETCH_ASSOC);
                    $ins->execute();
                    $tabInterventions = $ins->fetchAll(PDO::FETCH_ASSOC);
                    for ($i=0;$i<count($tabInterventions);$i++) { 
                    echo "<tr>";
                    echo "<td>" . $tabInterventions[$i]["Adresse"] . "</td>";
                    echo "<td>" . $tabInterventions[$i]["nomTypeIntervention"] . "</td>";
                    echo "<td><input value='Modifier' type='button' onclick=\"document.getElementById('id').value='" . $tabInterventions[$i]["Id"] . "'; this.form.action='formulaireModificationIntervention.php'; this.form.method='POST'; this.form.submit();\"></td>";
                    echo "<td><input value='Supprimer' type='button' onclick=\"if (confirm('Voulez-vous vraiment supprimer cette intervention?')) {document.getElementById('id').value='" . $tabInterventions[$i]["Id"] . "'; this.form.action='supprimerIntervention.php'; this.form.method='POST'; this.form.submit();}\"></td>";
                    echo "</tr>";
                    }
                ?>
            </tr>
        </table>
        <input type="hidden" id="id" name="id">
        <input type="hidden" name="idSelectCaserne" value="<?= $idCaserne ?>" />
        </form>
        <br><br>
        <h1>Ajouter une intervention : </h1>
    <form action="ajouterIntervention.php" method="POST">
        <table>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" name="adresse" required></td>
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
                        $idTypeIntervention = isset($_GET['idSelectTypeIntervention']) ? $_GET['idSelectTypeIntervention'] : $tabTypeIntervention[0]['Id'];
                        foreach ($tabTypeIntervention as $typeIntervention) {
                        if($typeIntervention["Id"] == $idTypeIntervention)
                            echo "<option value=" . $typeIntervention["Id"] . " selected>" . $typeIntervention["NomTypeIntervention"] . "</option>";
                        else
                            echo "<option value=" . $typeIntervention["Id"] . ">" . $typeIntervention["NomTypeIntervention"] . "</option>";
                        }
                    ?>
                </select>
                <input type="hidden" name="idSelectCaserne" value="<?= $idCaserne ?>" />
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
            </tr>
        </table>
    </form>
    </body>
</html>