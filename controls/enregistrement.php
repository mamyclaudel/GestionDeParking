<?php
include('connexion.php');
session_destroy();
session_start();

if(isset($_POST["btnajouter"])){
    if(isset($_POST["matricule"]) && isset($_POST["couleur"]) && isset($_POST["marque"]) && isset($_POST["nom"]) && isset($_POST["adresse"])){
        $matricule = htmlspecialchars($_POST["matricule"]);
        $couleur = htmlspecialchars($_POST["couleur"]);
        $marque = htmlspecialchars($_POST["marque"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $adresse = htmlspecialchars($_POST["adresse"]);

        function insert($nom, $adresse, $matricule){
            global $conn;
            $insert = $conn->prepare("INSERT INTO `proprietaire`(`idpro`, `nom`, `adresse`, `matriculevoiture`) VALUES (?, ?, ?, ?)");
            $result = $insert->execute([null, $nom, $adresse, $matricule]);
            $data = $insert->fetch();
            $row = $insert->rowCount();
            if($row<=0){
                $_SESSION["idpro"] = $data["idpro"];
                $_SESSION["nom"] = $data["nom"];
                $_SESSION["adresse"] = $data["adresse"];
                $id = $_SESSION["idpro"];
            }
            // global $id;
            // $insert1 = $conn->prepare("INSERT INTO `voiture`(`matriculevoiture`, `couleur`, `marque`, `idpro`) VALUES (?, ?, ?, ?)");
            // $result1 = $insert1->execute([$matricule, $couleur, $marque, $id]);
            // $data = $insert1->fetch();
            // // $row1 = $insert1->rowCount();
            // // if($row1<=0){
            //     $_SESSION["mat"] = $data["matriculevoiture"];
            //     $_SESSION["couleur"] = $data["couleur"];
            //     $_SESSION["marque"] = $data["marque"];
            // // }
        }
        insert($nom, $adresse, $matricule, $matricule);


        function insert1($matricule, $couleur, $marque, $id){
            global $id, $conn;
            $insert1 = $conn->prepare("INSERT INTO `voiture`(`matriculevoiture`, `couleur`, `marque`, `idpro`) VALUES (?, ?, ?, ?)");
            $result1 = $insert1->execute([$matricule, $couleur, $marque, $id]);
            $data1 = $insert1->fetch();
            $row = $insert1->rowCount();
            if($row<=0){
                $_SESSION["mat"] = $data1["matriculevoiture"];
                $_SESSION["couleur"] = $data1["couleur"];
                $_SESSION["marque"] = $data1["marque"];
            }
        }
        insert1($matricule, $couleur, $marque, $id);
    }
}
// header("Location: http://127.0.0.1:80/parking/views/acceuil.php?action=enregistrement_recu");


?>