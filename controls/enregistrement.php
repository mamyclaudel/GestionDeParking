<?php
include('connexion.php');

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
            $data = $insert->fetchAll();
            // if($row>=0){
                $select = $conn->prepare("SELECT `idpro` FROM `proprietaire` WHERE `matriculevoiture`=?");
                $result = $select->execute([$matricule]);
                var_dump($result);
                $data = $select->fetch(); 
                
                $_SESSION["mat"] = $matricule;
                $_SESSION["id"] = $data["idpro"];
                $_SESSION["nom"] = $nom;
                $_SESSION["adresse"] = $adresse;
                $id = $_SESSION["id"];
                var_dump($_SESSION);
            // }
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
            // $row = $inserts->rowCount();
            // if($row<=0){
                $select1 = $conn->prepare("SELECT * FROM `proprietaire` WHERE `matriculevoiture`=?");
                $result = $select1->execute([$matricule]);
                var_dump($result);
                $data = $select1->fetch();

                // $_SESSION["mat"] = $data1["matriculevoiture"];
                // var_dump($_SESSION["mat"]);
                $_SESSION["couleur"] = $couleur;
                $_SESSION["marque"] = $marque;
                var_dump($_SESSION["couleur"]);
                var_dump($_SESSION["marque"]);
            // // }
        }
        insert1($matricule, $couleur, $marque, $id);
    }
}
header("Location: http://127.0.0.1:80/parking/views/acceuil.php?action=enregistrement_recu");


?>