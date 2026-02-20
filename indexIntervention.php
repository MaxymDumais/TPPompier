<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <select name="nomCaserne" onchange="submit();">
        <?php
            $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
            $ins = $pdo->prepare("select * from caserne order by id");
            $ins->setFetchMode(PDO::FETCH_ASSOC);
            $ins->execute(); 
            $tab = $ins->fetchAll(); 
            for ($i=0;$i<count($tab);$i++) { 
                echo "<option>" . $tab[$i]["Nom"] . "</option>";
            }
        ?>
    </select>
</body>
</html>