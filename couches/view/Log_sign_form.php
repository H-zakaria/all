<?php
function log_sign_form()
{
?>


    <body>
        <div class="form_div">

            <form action="http://localhost//Prog/Afpa/gestion_emp_Rep/signup&login.php" class="form_log" method="POST">
                <input type="text" name="username" placeholder="Nom" class="form_field">
                <input type="password" name="password" placeholder="mdp" class="form_field">
                <button type="submit" name="submit_signup">s'enregristrer</button>
                <button type="submit" name="submit_login">se connecter</button>
            </form>

        </div>
    </body>

    </html>
<?php
}
?>