<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>

<body>
  <h1>Se connecter</h1>
  <main>
    <section>
      <h2>Inscription</h2>

      <form action="routes/signup.php" method="POST">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <!-- <input type="avatarURL" name="avatarURL" placeholder="avatarURL">
        <input type="role" name="role" placeholder="role"> -->
        <button>Valider</button>

      </form>
    </section>
    <section>
      <h2> Connexion </h2>
      <form action="routes/signup.php" method="POST">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">

        <button>Valider</button>

      </form>
    </section>
  </main>
</body>

</html>