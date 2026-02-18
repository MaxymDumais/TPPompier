<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casernes</title>
</head>
<body>
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
        $ins = $pdo->prepare("select * from caserne order by id");
        $ins->setFetchMode(PDO::FETCH_ASSOC);
        $ins->execute(); 
        $tab = $ins->fetchAll(); 
    ?>
    <form>
        <table>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Province</th>
                <th>Code postal</th>
                <th>Téléphone</th>
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
                    echo "</tr>";
                    }
                ?>
            </tr>
        </table>
        <input type="hidden" id="id" name="id">
    </form>
</body>
</html>