<?php
try{
    $con = new PDO("mysql: host:localhost; dbname:socialnet", "root", "");
    // echo "connected";
}catch(PDOException $e){
    echo $e;
    die();
}
// include("connexion.php");

session_start();

if(isset($_POST["btnvalider"])){
    if(isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["date"])){
        if(strlen($_POST["pseudo"])<=30 && strlen($_POST["password"])<=10){
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $mail = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            $date = $_POST["date"];
            var_dump($pseudo, $mail, $password, $date);

            function select($pseudo, $mail){
                global $con;
                $select = $con->prepare("SELECT * FROM `admin` WHERE `pseudo`= $pseudo AND `email`= $mail");
                var_dump($select);
                $result = $select->execute(array($pseudo, $mail));
                var_dump($result);
                $data = $select->fetch();
                $row = $select->rowCount();
            }
            select($pseudo, $mail);

            if(row<=0){
                function insertadmin($pseudo, $mail, $password, $date){
                    $inseradmin = $con->prepare("INSERT INTO `admin`(`id`, `pseudo`, `email`, `password`, `datedenaissance`) VALUES (?, ?, ?, ?, ?)");
                    $resultadmin = $inseradmin->execute([$pseudo, $mail, $password, $date]);

                }
            }
        }
    }
}

?>