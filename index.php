<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casernes</title>
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
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
        $ins = $pdo->prepare("select * from caserne order by id");
        $ins->setFetchMode(PDO::FETCH_ASSOC);
        $ins->execute(); 
        $tab = $ins->fetchAll(); 
    ?>
    <h1>Liste des casernes  :</h1>
    <form>
        <table>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Province</th>
                <th>Code postal</th>
                <th>Téléphone</th>
                <th><input value="Vider la liste" type="button" onclick="if (confirm('Voulez-vous vraiment supprimer la liste des casernes?')) {this.form.action = 'viderListeCaserne.php'; this.form.method = 'POST'; this.form.submit();}"></th>

            </tr>
            <tr>
                <?php
                    for ($i=0;$i<count($tab);$i++) { 
                    echo "<tr>";
                    echo "<td>" . $tab[$i]["Nom"] . "</td>";
                    echo "<td>" . $tab[$i]["Adresse"] . "</td>";
                    echo "<td>" . $tab[$i]["Ville"] . "</td>";
                    echo "<td>" . $tab[$i]["Province"] . "</td>";
                    echo "<td>" . $tab[$i]["CodePostal"] . "</td>";
                    echo "<td>" . $tab[$i]["Telephone"] . "</td>";
                    echo "<td><input value='Modifier' type='button' onclick=\"document.getElementById('id').value='" . $tab[$i]["Id"] . "'; this.form.action='formulaireModificationCaserne.php'; this.form.method='POST'; this.form.submit();\"></td>";
                    echo "<td><input value='Supprimer' type='button' onclick=\"if (confirm('Voulez-vous vraiment supprimer cette caserne?')) {document.getElementById('id').value='" . $tab[$i]["Id"] . "'; this.form.action='supprimerCaserne.php'; this.form.method='POST'; this.form.submit();}\"></td>";
                    echo "</tr>";
                    }
                ?>
            </tr>
        </table>
        <input type="hidden" id="id" name="id">
    </form>
    <br><br><br>
    <form action="ajouterCaserne.php" method="POST">
        <table>
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom" required></td>
            </tr>
            <tr>
                <td>Adresse : </td>
                <td><input type="text" name="adresse" required></td>
            </tr>
            <tr>
                <td>Ville : </td>
                <td><input type="text" name="ville" required></td>
            </tr>
            <tr>
                <td>Province : </td>
                <td><input type="text" name="province" required></td>
            </tr>
            <tr>
                <td>Code postal : </td>
                <td><input type="text" name="codePostal" required></td>
            </tr>
            <tr>
                <td>Téléphone : </td>
                <td><input type="text" name="telephone" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
            </tr>
        </table>
    </form>
</body>
</html>