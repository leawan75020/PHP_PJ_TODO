<?php

include_once "../controllers/UserController.php";


//si le formulaire et valid par user
if(isset($_POST['email'], $_POST['password'])){

//instencier la class user controller(constructeur (email et pwd))
$user = new UserController($_POST['email'], $_POST['password']);

//tester si l'utilisateur est déja inscrit et s'il a saisit un bon mail
    if($user->isDataValid()){//teste si les formats sont respectés
        //verif si l'utilisateur existe déjà
        if($user->exist()){
            header('Location: /PHPcours/TODO/login.php?inscription=error&emailError=EmailExist');
            die();
        }
        $user->signupUser();

    }
    else{ //cas ou l'email ou le mdp ne sont pas valides
        $returnData= $user->getErrors();
        header('Location: /PHPcours/TODO/login.php?inscription=error&'.$returnData);
    }

}else{ //cas ou le formulaire a beugé lors de l'envoie
    header('Location: /PHPcours/TODO/login.php');
}