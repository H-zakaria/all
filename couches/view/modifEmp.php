<?php
function afficherFormModifEmp(Employe2 $emp)
{
?>


  <div class="form_div">
    <form class="form" action="form_modif.php" method="POST">
      <input type="hidden" name="noemp" value="<?php echo $emp->getNoemp() ?>">
      <input type="text" name="nom" value="<?php echo $emp->getNom(); ?>" placeholder="Entrez le nom">
      <input type="text" name="prenom" value="<?php echo $emp->getPrenom(); ?>" placeholder="Entrez le prenom">
      <input type="text" name="emploi" value="<?php echo $emp->getEmploi(); ?>" placeholder="Entrez l'emploi'">
      <input type="number" name="sup" value="<?php echo $emp->getSup(); ?>" placeholder="Numero du suprérieur">
      <input type="date" name="embauche" value="<?php echo $emp->getEmbauche(); ?>" placeholder="Entrez la date d'embauche">
      <input type="number" step="any" name="sal" value="<?php echo $emp->getSal(); ?>" placeholder="Entrez le salaire">
      <input type="number" step="any" name="comm" value="<?php echo $emp->getComm(); ?>" placeholder="commission">
      <input type="number" name="noserv" value="<?php echo $emp->getNoserv(); ?>" placeholder="Entrez le numero de service">
      <input type="number" name="noproj" value="<?php echo $emp->getNoproj(); ?>" placeholder="Entrez le numero projet">
      <input type="submit" value="Soumettre">
    </form>
    <a href="tableau-connecte.php"><button>TABLEAU</button></a>
  </div>


  </body>

  </html>
<?php
}
?>