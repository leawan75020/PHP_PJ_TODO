<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/controllers/UserController.php";
    $userController = UserController::createUserFromId($_SESSION['id']);
?>


<!DOCTYPE html>
<html lang="en">
<?php 
$title = "Profil";
include_once "./components/head.php"

?>


<body>

  <?php 

include_once "./components/navbar.php"

?>

  <div class="profil-infos">
    <img id="avatar" src="<?= $_SESSION['avatarURL']?>">
    <p> <?= $_SESSION['email']?> </p>

    <p>changer la photo de profil ici:</p>

    <form action="routes/uploadAvatar.php" method="POST">
      <!-- /*type file pout upload photo enctype="multipart/form-data  -->
      <input type="text" name="avatarURL">
      <button type="submit">Enregistrer</button>
    </form>
  </div>
  <section>
    <h2>Todos</h2>
    <form action="routes/addTodo.php" method="POST">
      <input type="text" name="todo" placeholder="Ajouter une tache" />
      <button>Ajouter +</button>
    </form>
    <i class="bi bi-check2-all"></i>
    <?php foreach($userController->getTodos() as $key => $todoTab):?>
    <div class='todo '>
      <h4 class='<?= ($todoTab['isDone']? "todoDone" : "todoNotDone") ?>'> <?= $todoTab["contenu"]?></h4>

      <div class="todo-controls">
        <?php if(!$todoTab['isDone']):?>
        <form class="validateForm" action="routes/validateTodo.php" method="GET">
          <button type="submit" name="validate" value="<?= $todoTab['id']?>">
            <img src="./images/check.svg">
          </button>
        </form>
        <form class="validateForm" action="routes/removeTodo.php" method="GET">
          <button type="submit" name="remove" value="<?= $todoTab['id']?>">
            <img src="./images/remove.svg">
          </button>
        </form>


        <?php endif?>
      </div>
    </div>





    <?php endforeach?>
  </section>



</body>

</html>