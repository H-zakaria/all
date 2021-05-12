<?php
function show_signup()
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
        <a href="form_login.php">Vous avez déjà un compte?</a>
        <button type="submit" name="submit_signup">s'enregristrer</button>
      </form>
      <?php
      if (!isset($_GET['signup'])) {
        exit();
      } else {
        $signupCheck = $_GET['signup'];


        if ($signupCheck == "emptyfields") {
          echo "<p class = 'error'>Tout les champs doivent être remplis.</p>";
          exit();
        } elseif ($signupCheck == "invalidusername") {
          echo "<p class = 'error'>Vous avez utilisé des carractère interdits.</p>";
          exit();
        } elseif ($signupCheck == "usernametaken") {
          echo "<p class = 'error'>Ce nom est déjà pris.</p>";
          exit();
        } elseif ($signupCheck == "success") {
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