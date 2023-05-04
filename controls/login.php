<?php

include("connexion.php");

if(isset($_POST["btnconnecter"])){
    echo "btnconnecter";
    if(isset($_POST["pseudo"]) && isset($_POST["password"])){
        if(!empty($_POST["pseudo"]) && strlen($_POST["password"])<=10){
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $pwd = htmlspecialchars($_POST["password"]);
            var_dump($pseudo, $pwd);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            function select($pseudo, $pwd){
                global $con;
                $selectadmin = $con->prepare("SELECT * FROM `admin` WHERE `pseudo`=? OR `email`=? AND `password`=? ");
                $resultadmin = $selectadmin->execute([$pseudo, $pseudo, $pwd]);
                var_dump($resultadmin);
                $data = $selectadmin->fetch();
                $row = $selectadmin->rowCount();
                var_dump($data);
                var_dump($row);
            }
            select($pseudo, $pwd);
        }
    }
}

if(isset($_POST["btnnouveau"])){
    header("Location: http://127.0.0.1/socialNet/views/inscription.php");
}

?>