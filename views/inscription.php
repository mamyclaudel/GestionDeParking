<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publics/bs4/css/bootstrap.css" />
    <link rel="stylesheet" href="../publics/css/style.css" />
    <title>socialNetwork</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 shadow border"  style="margin-top:5%; border-radius:10px; background-color: rgb(132, 151, 156);">
                <h2 class="text-center mt-4 mb-4">Inscription</h2>
                <form class="form form-group" action="http://127.0.0.1/socialNet/controls/enregistrement.php?action=inscrire" method="POST">
                    <input class="form-control mb-2" type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                    <input class="form-control mb-2" type="email" name="email" id="email" placeholder="Adresse mail">
                    <input class="form-control mb-2" type="password" name="password" id="password" placeholder="Password">
                    <label style="cursor: pointer; font-family: time new romans, Courier, monospace; font-style: italic;">
                        <input style="cursor: pointer;" type="checkbox" name="show" id="show"> Show password
                    </label></br>
                    <label for="date">Date de naissance :</label>
                    <input class="form-control mb-2" type="date" name="date" id="date">
                    <div class="row" style="padding-top: 8%;">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <input class="btn btn-primary btn-block mb-2" name="btnvalider" id="btnvalider" type="submit" value="Valider">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-danger btn-block mb-2" name="btnannuler" id="btnannuler">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
<script src="../publics/js/jquery.js"></script>
<script src="../publics/bs4/js/bootstrap.js"></script>
<script src="../publics/js/inscription.js"></script>
</body>
</html>