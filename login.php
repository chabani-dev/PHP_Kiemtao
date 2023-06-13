<?php
require 'functions.php';
if(!empty($_POST)){
    //todo ici on va tester si la personne qui veut se connecter a bien rempli le formulaire et on redirige en fonction avec la fonction redirect() et en affichant le message approprié
if(isset($_POST['username']) && isset($_POST['password']) && login($_POST['username'],$_POST['password'])){
    redirect('index.php','connect_ok');
}else{
        redirect('login.php','connect_error');
}
}
require 'inc/header.php';
if(!is_logged_in()){
    include 'pages/loginForm.php';
} else {
    redirect('index.php','connect_ok');
}
require 'inc/footer.php';