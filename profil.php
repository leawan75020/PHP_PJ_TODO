<?php 
session_start();

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

  <div>
    <img id="avatar" src="<?= $_SESSION['avatarURL']?>">
    <p> <?= $_SESSION['email']?> </p>

    <p>changer la photo de profil ici:</p>

    <form action="/routes/uploadAvatar.php" method="POST">
      <!-- /*type file pout upload photo enctype="multipart/form-data  -->
      <input type="text" name="avatarURL">
      <button>Enregistrer</button>
    </form>
  </div>
  <div>



</body>

</html>