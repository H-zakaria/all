<?php

function afficherFormAjoutService()
{
?>


    </div class="form_div">
    <form class="form_serv" action="ajouter_service.php" target="tableau-connecte.php" method="POST">
        <input type="number" name="noserv" placeholder="Entrez le numero du service">
        <input type="text" name="service" placeholder="Entrez le nom du service">
        <input type="text" name="ville" placeholder="Entrez le nom de la ville">
        <input type="submit" value="Soumettre">
    </form>
    <a href="tableau-connecte.php"><button>TABLEAU</button></a>
    </div>
<?php } ?>


<?php
function afficherFormModifierService(Service $service)
{
?>

    <div class="form_div">
        <form class="form_serv" action="modifier_service.php" method="POST">
            <input type="number" name="noserv" value=<?php echo $service->getNoserv(); ?> placeholder="Entrez le numero du service">
            <input type="text" name="service" value=<?php echo $service->getService(); ?> placeholder="Entrez le nom du service">
            <input type="text" name="ville" value=<?php echo $service->getVille(); ?> placeholder="Entrez le nom de la ville">
            <input type="submit" value="Soumettre">
        </form>
        <a href="tableau-connecte.php"><button>TABLEAU</button></a>
    </div>



    </body>

    </html>
<?php
}
?>