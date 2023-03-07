<?php

include_once "../controllers/UserController.php";


//si le formulaire et valid par user
if(isset($_POST['email'], $_POST['password'])){

//instencier la class user controller(constructeur (email et pwd))
$user = new UserController($_POST['email'], $_POST['password']);


$user->signupUser();





}