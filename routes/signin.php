<?php

//lancer la session
session_start();

//include...
include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/controllers/userController.php";

//verifiy si le formulaire est rempli isset()
if(isset($_POST['email'], $_POST['password'])){
  //si la formulaire a une error d'envie
  //alors fermer la session et rediriger la page
  header("Location: /login.php");
  die(); //instruction qui ferme la session

//instencier la class user controller(verfify(email et pwd))
$user = new UserController($_POST['email'], $_POST['password']);

//+TODO: tester si les données sont valid sinon lever une error
//verify si user exist sinon fermer la session


if(!($user->exist())){
header("Location: /login.php?connexion=error&passwordError=passwordIncorrect");
die();

}
//verify le mdp est correct


//demarrer ma session






}