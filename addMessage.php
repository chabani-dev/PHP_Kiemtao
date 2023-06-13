<?php
require 'functions.php';
//var_dump($_POST);
//var_dump($_SESSION);

if(isset($_POST['message'])){
    add_message($_POST['message'], $_SESSION['id']);
 //todo ici on va implémenter la création d'un message et faire la redirection
    redirect('index.php','');
}

require 'inc/header.php';
if(is_logged_in()){
    require 'pages/messageForm.php';
} else {
    redirect ('login.php', 'disconnect_ok');
}
require 'inc/footer.php';