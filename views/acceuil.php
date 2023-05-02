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
    <div class="container shadow border mt-4">
        <div class="row shadow border 2">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <h2 class="text-center text-muted mt-4 pb-2" style="border-bottom-style:ridge; font-weight:bold; font-family:time new roman;">Bienvenue :</h2>
            <p class="form-control mt-4"><strong>Numéro matricule</strong> : <?php echo $_SESSION["mat"]; ?></p>
            <p class="form-control"><strong>Couler</strong> : <?php echo $_SESSION["couleur"]; ?></p>
            <p class="form-control"><strong>Marque</strong> : <?php echo $_SESSION["marque"]; ?></p>
            <p class="form-control"><strong>Nom</strong> : <?php echo $_SESSION["nom"]; ?></p>
            <p class="form-control mb-4"><strong>Adresse</strong> : <?php echo $_SESSION["adresse"]; ?></p>
            </div>
            <div class="col-sm-2"></div>
            <div class="container">
            <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger btn-block mb-4" onClick="history.back();" name="btninscrire" >Ok</button>
                    </div>
                    <div class="col-sm-2"></div>
            </div>
            </div>
        </div>
    </div>
<script src="../publics/js/jquery.js"></script>
<script src="../publics/bs4/js/bootstrap.js"></script>
<script src="../publics/js/login.js"></script>
</body>
</html>

