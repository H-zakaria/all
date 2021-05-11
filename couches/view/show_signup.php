<?php
function log_sign_form()
{
?>


  <body>
    <div class="form_div">

      <form action="../control/signup&login.php" class="form_log" method="POST">
        <input type="text" name="username" placeholder="Nom" class="form_field">
        <input type="password" name="password" placeholder="mdp" class="form_field">
        <button type="submit" name="submit_signup">s'enregristrer</button>
      </form>
    </div>
  </body>
  </html>
<?php
}
?>