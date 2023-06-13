<?php
$dsn='mysql:host=localhost;dbname=kiemtaoe';
$user='root';

try{
    $pdo=new PDO($dsn,$user);
}catch(Exception $erreur){
    echo 'La connexion à la bdd à échoué';
}