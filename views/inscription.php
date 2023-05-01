<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publics/bs4/css/bootstrap.css" />
    <link rel="stylesheet" href="../publics/css/style.css" />
    <title>GestionDeParking</title>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h2 class="text-center text-muted mt-4">Enregistrement</h2>
            <form action="http://127.0.0.1:80/parking/controls/enregistrement.php?action=enregistre" method="POST" class = "shadow border mt-4 p-4" style="border-radius: 2%;">
                <input class="form-control mb-4" type="text" name="matricule" id="matricule" placeholder="Numéro matricule">
                <input class="form-control mb-4" type="text" name="couleur" id="couleur" placeholder="Couleur de la voiture">
                <input class="form-control mb-4" type="text" name="marque" id="marque" placeholder="Marque">
                <input class="form-control mb-4" type="text" name="nom" id="nom" placeholder="Nom de la propriétaire">
                <input class="form-control mb-4" type="text" name="adresse" id="adresse" placeholder="Adresse de la propiétaire">

                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                        <input class="btn btn-outline-warning  btn-block mb-2" type="submit"  name ="btnajouter" value="Ajouter">
                    </div>
                    <div class="col-sm-2">
                        <input class="btn btn-outline-danger  btn-block" type="submit" name="btnannuler" value="Annuler">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

<script src="../publics/js/jquery.js"></script>
<script src="../publics/bs4/js/bootstrap.js"></script>
<script src="../publics/js/login.js"></script>
</body>
</html>

