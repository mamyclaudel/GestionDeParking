<?php

try{
    $con = new PDO("mysql: host:localhost; dbname:socialnet", "root", "");
    // echo "connected";
}catch(PDOException $e){
    echo $e;
    die();
}

?>