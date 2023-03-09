<?php
session_start();

include_once "../controllers/UserController.php";

//créer l'utilisateur à partir de l'id
$user= UserController::createUserFromId($_SESSION['id']);

//valider la tache vie le usercontroller
$user->removeTodo($_GET['remove']);

//redirection
header('Location: /PHPcours/TODO/profil.php');




?>