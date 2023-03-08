<nav>
  <i class="bi bi-list" id="menu-boutton"></i>

  <ul style="left:-100%">
    <li><a href="/TODO">Accueil</a></li>
    <li>
      <a
        href="<?= isset($_SESSION) && isset($_SESSION['id']) ? "/PHPcours/TODO/profil.php": "/PHPcours/TODO/login.php"?>">
        <?= isset($_SESSION) && isset($_SESSION['id']) ? "Profil": "Se Connecter"?>
      </a>
    </li>

    <?= 
            isset($_SESSION) && isset($_SESSION['id']) ? 
            "<li><a href='/PHPcours/TODO/routes/logout.php'> Se doconnecter </a></li>": ""
        ?>
  </ul>


</nav>