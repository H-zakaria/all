<?php
function afficherFormAjout(array $superieurs, array $projets)
{
?>

  <div class="form_div">
    <form class="form" action="ajouter.php" method="POST">
      <input type="text" name="nom" placeholder="Entrez le nom">
      <input type="text" name="prenom" placeholder="Entrez le prenom">
      <input type="text" name="emploi" placeholder="Entrez l'emploi'">
      <label for="sup">Superieur: </label>
      <select id="sup" name="sup">
        <option value="" selected hidden value="">Selectionner</option>
        <?php


        foreach ($superieurs as $sup) {

          $supNoemp = $sup->getNoemp();
        ?>

          <option value=<?php echo $supNoemp ?>><?php echo $sup->getNoemp() . ' ' . $sup->getNom() . " " . $sup->getEmploi() . " " . $sup->getNomService() ?> </option>;

        <?php
        }
        ?>
      </select>

      <input type="date" name="embauche" placeholder="Entrez la date d'embauche">
      <input type="number" step="any" name="sal" placeholder="Entrez le salaire">
      <input type="number" step="any" name="comm" placeholder="Entrez la commission">
      <label for="noserv">Service: </label>
      <select id="noserv" name="noserv">
        <option value="" selected hidden value="">Selectionner</option>
        <option value="1">1- DIRECTION</option>
        <option value="2">2- LOGISTIQUE</option>
        <option value="3">3- VENTES</option>
        <option value="4">4- FORMATION</option>
        <option value="5">5- INFORMATIQUE</option>
        <option value="6">6- COMPTABILITE</option>
        <option value="7">7- TECHNIQUE</option>
      </select>
      <label for="projets">Projet: </label>
      <select id="projets" name="noproj">
        <option value="" selected hidden value="">Selectionner</option>
        <?php

        print_r($projets);

        foreach ($projets as $projet) {

          $noProj = $projet->getNoproj();
        ?>

          <option value=<?php echo $noProj ?>><?php echo '-Num: ' . $projet->getNoproj() . ' -Nom: ' . $projet->getNomproj() . '  -Budget: ' . $projet->getBudget() . '€' ?> </option>;

        <?php
        }
        ?>
      </select>

      <input type="submit" value="Soumettre" class="input_btn">
    </form>
    <a href="tableau-connecte.php"><button>TABLEAU</button></a>
  </div>
  </body>

  </html>
<?php
}
?>