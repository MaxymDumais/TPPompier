<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=pompier","root","");
        $ins = $pdo->prepare("insert into intervention (adresse,idTypeIntervention,idCaserne,dateTime) values(:adresse,:idTypeIntervention,:idCaserne,:dateTime)");
        $ins->execute(array(
            ":adresse"=>$_POST['adresse'],
            ":idTypeIntervention"=>$_POST['idSelectTypeIntervention'],
            ":idCaserne" => $_POST['idSelectCaserne'],
            ":dateTime" => date('Y-m-d H:i:s')
        )); 
        header('Location: indexIntervention.php?idSelectCaserne=' . $_POST['idSelectCaserne']);
    } catch (PDOException $e) {
        header('Location: indexIntervention.php?idSelectCaserne=' . $_POST['idSelectCaserne']);
    }
    
?>