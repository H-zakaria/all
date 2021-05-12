<?php
function show_login()
{
?>


  <body>
    <div class="form_div">
      <form action="../control/signup&login.php" class="form_log" method="POST">
        <?php
        if (isset($_GET['username'])) {
          $username = $_GET['username'];
          echo '<input type="text" name="username" placeholder="Nom" value="' . $username . '" class="form_field">';
        } else {
          echo  '<input type="text" name="username" placeholder="Nom" class="form_field">';
        }
        ?>
        <input type="password" name="password" placeholder="mdp" class="form_field">
        <a href="../control/form_signup.php">Creer un compte</a>
        <button type="submit" name="submit_login">se connecter</button>
      </form>
      <?php
      if (!isset($_GET['login'])) {
        exit();
      } else {
        $loginCheck = $_GET['login'];


        if ($loginCheck == "emptyfields") {
          echo "<p class = 'error'>Tout les champs doivent être remplis</p>";
          exit();
        } elseif ($loginCheck == "invalidusername") {
          echo "<p class = 'error'>Vous avez utilisé des carractère interdits</p>";
          exit();
        } elseif ($loginCheck == "wrong") {
          echo "<p class = 'error'>Mot de passe ou identifiant inconnu</p>";
          exit();
        } elseif ($loginCheck == "success") {
          echo "<p>Vous êtes inscrit!</p>";
          exit();
        }
      }
      ?>
    </div>
  </body>

  </html>
<?php
}
?>