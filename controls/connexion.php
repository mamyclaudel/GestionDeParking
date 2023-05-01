<?php
session_start();
try{
    $conn = new PDO("mysql:host=localhost; dbname=parking", "root", "");
    // echo "connected";
}catch(PDOException $e){
    echo $e;
    die();
}
echo"merci";
echo"merci";
if(isset($_POST["btnvalider"])){
    echo"merci1";
    if(isset($_POST["matricule"])){
        $matricule = htmlspecialchars($_POST["matricule"]);
        echo"merci1";
        $slt = $conn->prepare("SELECT `matriculevoiture`, `couleur`, `marque`, `idpro` FROM `voiture` WHERE `matriculevoiture`=?");
        $slt1 = $conn->prepare("SELECT `idpro`, `nom`, `adresse`, `matriculevoiture` FROM `proprietaire` WHERE `matriculevoiture`=?");
        $result = $slt->execute([$matricule]);
        $result1 = $slt1->execute([$matricule]);
        $data = $slt1->fetch();
        $data = $slt->fetch();
        $row =$slt->rowCount();

        if($row>0){
            if($data["matriculevoiture"] = $_POST["matricule"]){
                $slt2 = $conn->prepare("SELECT * FROM `voiture` INNER JOIN `proprietaire` ON voiture.matriculevoiture=proprietaire.matriculevoiture");
                $result2 = $slt2->execute();
                $data = $slt2->fetch();
                $_SESSION["mat"] = $data["matriculevoiture"];
                $_SESSION["couleur"] = $data["couleur"];
                $_SESSION["marque"] = $data["marque"];
                $_SESSION["nom"] = $data["nom"];
                $_SESSION["adresse"] = $data["adresse"];
                // echo $slt2;
                var_dump($data);
                echo"merci2";

                header("Location: http://127.0.0.1:80/parking/views/acceuil.php?action=bienvenu");
                
            }
        }else{
            header("Location: http://127.0.0.1:80/parking/index.html?action=nomembre");
        }
    }
}

if(isset($_POST["btninscrire"])){
    header("Location: http://127.0.0.1:80/parking/views/inscription.php?action=nouveau");
}


?>