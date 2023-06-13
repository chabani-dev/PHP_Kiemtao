<?php
session_start();

//todo on implémente une fonction pour récupérer un utilisateur depuis son id
function get_user_by_id($id,$users){

}

//todo on implémente une fonction qui va vérifier le login et le password et faire la connexion en cas de succès
function login($login, $password){
    //todo on va charger le tableau qui contient les utilisateurs
    require 'data/bdd.php';
$userQuery= "SELECT id,name,password FROM utilisateur;";
 $resultat= $pdo->query($userQuery);
$userList= $resultat->fetchAll(PDO::FETCH_CLASS);
    //todo on va boucler sur le tableau $users et vérifier si la personne qui veut se connecter est présente dans ce tableau
        foreach($userList as $user){

    //todo on teste si le $login donné en paramètre à la fonction est présent dans le tableau
            if ($user->name===$login){

    //todo si cette condition est vérifiée, alors on va pouvoir passer à la deuxième étape : la vérification du mot de passe

                if($user->password===$password){
     //todo si cette 2ème étape se vérifie aussi, alors on peut 'connecter' la personne, càd, on remplit $_SESSION avec ses information
                    $_SESSION['id']=$user->id;
                    $_SESSION['name']=$user->name;
                    return true;
                }
            }
        }
    //todo si on arrive ici, c'est que l'on n'a pas trouvé l'utilisateur demandé ou que le mot de passe est erroné.
return false;
}

//todo cette fonction va permettre la déconnexion
function logout(){
    unset($_SESSION['id']);
    unset($_SESSION['name']);
}


//? cette fonction effectue une redirection et envoyer une information vers la page cible
function redirect($filename, $response){
    if(file_exists($filename)){
        $url=$filename."?response=$response";
        header("Location: $url");
        exit;
    } else {
        header('Location: 404.php');
    }
}

//? cette fonction va afficher un message en fonction de l'information transmise par la fonction redirect()
function display_message($instruction){
    if($instruction==='connect_ok'){
        return 'Bienvenue '.$_SESSION['name'];
    } elseif ($instruction==='connect_error'){
        return 'Login ou mot de passe invalide';
    } elseif ($instruction==='disconnect_ok'){
        return 'Vous êtes déconnecté';
    } elseif ($instruction==='register_ok'){
        return 'Votre compte a été créé';
    } else {
        return '';
    }
}

//? cette fonction va tester si un user est connecté
function is_logged_in(){
    if(empty($_SESSION['name'])){
        return false;
    } else {
        return true;
    }
}


//! ^[a-zA-Z0-9]{6,8}$ REGEX qui autorise un login entre 6 et 8 caractères : minuscules, majuscules et nombres.

//! ^(?=.*[A-Z])(?=.*[!@#$&*._-])(?=.*[0-9])(?=.*[a-z]).{8,20}$ REGEX qui accepte mdp avec au moins 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (parmi !@#$&*._-)

//! ^[a-z]{1,20}$ REGEX qui accepte un mot entre 1 et 20 caractères

//? ces 3 fonctions vont tester grâce à des instructions en REGEX la validité du login, du password ou encore des passions entrées dans le formulaire d'inscription
//?-------------------------------------------------------------
function test_login($str){
    if(preg_match('/\b^[a-zA-Z0-9]{6,12}$\b/',$str)){
        return true;
    } else {
        return false;
    }
}

function test_passion($str){
    if(preg_match('/^[a-zA-Z]{1,20}$/',$str)){
        return true;
    } else {
        return false;
    }
}

function test_password($str1, $str2){
    if(preg_match('/^(?=.*[A-Z])(?=.*[!@#$&*._-])(?=.*[0-9])(?=.*[a-z]).{8,20}$/',$str1) && $str1===$str2){
        return true;
    } else {
        return false;
    }
}
//?-------------------------------------------------------------


//todo cette fonction va permettre d'entrer un nouvel utilisateur dans la bdd
function add_user($login, $password, $passions){
    
}

//todo cette fonction va permettre d'insérer un nouveau message dans la bdd
function add_message($body, $user_id){

}