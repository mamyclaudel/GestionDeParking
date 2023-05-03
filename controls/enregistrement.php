<?php
include('connexion.php');

$erreur="";

if(isset($_POST["btnajouter"])){
    if(isset($_POST["matricule"]) && isset($_POST["couleur"]) && isset($_POST["marque"]) && isset($_POST["nom"]) && isset($_POST["adresse"])){
        $matricule = htmlspecialchars($_POST["matricule"]);
        $couleur = htmlspecialchars($_POST["couleur"]);
        $marque = htmlspecialchars($_POST["marque"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $adresse = htmlspecialchars($_POST["adresse"]);

                $select = $conn->prepare("SELECT * FROM `voiture` WHERE `matriculevoiture`=?");
                $result = $select->execute([$matricule]);
                var_dump($result);
                $data = $select->fetch();
                $row = $select->rowCount();
                if($row<=0 && strlen($matricule)<=10){
                    function insert($nom, $adresse, $matricule){
                        global $conn;
                        $insert = $conn->prepare("INSERT INTO `proprietaire`(`idpro`, `nom`, `adresse`, `matriculevoiture`) VALUES (?, ?, ?, ?)");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $result = $insert->execute([null, $nom, $adresse, $matricule]);
                        var_dump($result);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $data = $insert->fetchAll();

                        $select = $conn->prepare("SELECT * FROM `proprietaire` WHERE `matriculevoiture`=?");
                        $result = $select->execute([$matricule]);
                        var_dump($result);
                        $data = $select->fetch(); 
                        $_SESSION["mat"] = $matricule;
                        $_SESSION["id"] = $data["idpro"];
                        $_SESSION["nom"] = $nom;
                        $_SESSION["adresse"] = $adresse;
                        $id = $_SESSION["id"];
                        var_dump($data);
                        var_dump($_SESSION);
                    }
                    insert($nom, $adresse, $matricule, $matricule);

                    $id = $_SESSION["id"];
                    function insert1($matricule, $couleur, $marque, $id){
                        global $conn;
                        var_dump($matricule, $couleur, $marque, $id);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $inserts = $conn->prepare("INSERT INTO `voiture`(`matriculevoiture`, `couleur`, `marque`, `idpro`) VALUES (?, ?, ?, ?)");
                        $result1 = $inserts->execute([$matricule, $couleur, $marque, $id]);
                        $data1 = $inserts->fetch();
                        echo "result1";
                        var_dump($result1);
                        echo"data1";
                        var_dump($data1);
                        $_SESSION["couleur"] = $couleur;
                        $_SESSION["marque"] = $marque;
                    }
                    insert1($matricule, $couleur, $marque, $id);
                    header("Location: http://127.0.0.1:80/parking/views/acceuil.php?action=enregistrement_recu");

                }else{
                    $erreur ="Le numéro matricule est très longue ou déjà existe!";
                    $_SESSION["erreur"] = $erreur;
                    var_dump($_SESSION["erreur"]);
                    header("Location: http://127.0.0.1/parking/views/inscription.php?action=existedeja");
                }
    }
}


?>