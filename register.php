<?php
require 'functions.php';
if(isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['passion1']) && isset($_POST['passion2']) && isset($_POST['passion3'])){
    $messages_erreur=[];
    if(!test_login($_POST['username'])){
        array_push($messages_erreur, 'login invalide');
    }
    if(!test_password($_POST['password1'],$_POST['password2'])){
        array_push($messages_erreur,'mot de passe invalide');
    }
    if(!test_passion($_POST['passion1'])){
        array_push($messages_erreur,'passion 1 invalide');
    }
    if(!test_passion($_POST['passion2'])){
        array_push($messages_erreur,'passion 2 invalide');
    }
    if(!test_passion($_POST['passion3'])){
        array_push($messages_erreur,'passion 3 invalide');
    }
    if(empty($messages_erreur)){
        //todo ici on va implémenter la création d'un nouvel utilisateur
    }
}
require "inc/header.php";
if(!empty($messages_erreur)){
    echo'<ul>';
    foreach($messages_erreur as $message){
        echo '<li>'.$message.'</li>';
    }
    echo'</ul>';

}
require 'pages/registerForm.php';
require 'inc/footer.php';