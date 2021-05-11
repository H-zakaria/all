<?php
function show_login()
{
?>


  <body>
    <div class="form_div">
      <form action="../control/signup&login.php" class="form_log" method="POST">
        <input type="text" name="username" placeholder="Nom" class="form_field">
        <input type="password" name="password" placeholder="mdp" class="form_field">
        <button type="submit" name="submit_login">se connecter</button>
      </form>
    </div>
    <a href="form_signup.php">Creer un compte</a>
  </body>

  </html>
<?php
}
?>