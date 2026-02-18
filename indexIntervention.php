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
</body>
</html>