<?php
function afficherDetails()
{
?>
    <div class="details">
        <table>
            <thead>
                <tr>
                    <th>No employé</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>emploi</th>
                    <th>No superieur</th>
                    <th>Embauche</th>
                    <th>Salaire</th>
                    <th>Commission</th>
                    <th>No service</th>
                    <th>No projet</th>
                    <th>Date d'ajout</th>
                    <th class="fk">Service</th>
                    <th class="fk">Ville</th>
                    <th class="fk">Projet</th>
                    <th class="fk">Budget</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $noemp = $_GET['noemp'];

                $empService = new EmployeService;
                $emp = $empService->selectDetailInfos($noemp);

                echo "<tr>";
                echo "<td>" . $emp->getNoemp() . "</td>";
                echo "<td>" . $emp->getNom() . "</td>";
                echo "<td>" . $emp->getPrenom() . "</td>";
                echo "<td>" . $emp->getEmploi() . "</td>";
                echo "<td>" . $emp->getSup() . "</td>";
                echo "<td>" . $emp->getEmbauche() . "</td>";
                echo "<td>" . $emp->getSal() . "</td>";
                echo "<td>" . $emp->getComm() . "</td>";
                echo "<td>" . $emp->getNoserv() . "</td>";
                echo "<td>" . $emp->getNoproj() . "</td>";
                echo "<td>" . $emp->getDate_ajout() . "</td>";
                echo "<td class ='fk'>" . $emp->getNomService() . "</td>";
                echo "<td class ='fk'>" . $emp->getVille() . "</td>";
                echo "<td class ='fk'>" . $emp->getNomProjet() . "</td>";
                echo "<td class ='fk'>" . $emp->getBudget() . "</td>";
                echo "</tr>";

                ?>


            </tbody>
        </table>
        <a href="tableau-connecte.php"><button>TABLEAU</button></a>
        <br>
        <hr>
        <br>
        <h3>Superieur:</h3>
        <table>
            <thead>
                <tr>
                    <th>Numero employe</th>
                    <th>Nom</th>
                    <th class="fk">Service</th>
                    <th>emploi</th>
                    <th>Numero du supérieur</th>
                    <th class="fk">Projet en cours</th>
                </tr>
            </thead>
            <tbody>
                <?php



                $supInfos = $empService->selectDetailInfosSup($noemp);




                echo "<tr>";
                echo "<td>" . $supInfos->getNoemp() . "</td>";
                echo "<td>" .  $supInfos->getNom() . "</td>";
                echo "<td class = 'fk'>" .  $supInfos->getNomService() . "</td>";
                echo "<td>" .  $supInfos->getEmploi() . "</td>";
                echo "<td>" .  $supInfos->getSupNoemp() . "</td>";
                echo "<td class = 'fk'>" . $supInfos->getNomProjet() . "</td>";
                echo "</tr>";




                ?>
            </tbody>
        </table>
        <br>
        <hr>
        <br>
        <h3>Historique des modifications:</h3>
        <table>
            <thead>
                <tr>
                    <th>Modifications</th>
                    <th>Date</th>
                    <th>Heure</th>

                </tr>
            </thead>
            <tbody>
                <?php


                $modifServ = new ModificationService();
                $modifs = $modifServ->selectModifHisto($noemp);



                foreach ($modifs as $modif) {

                    echo "<tr>";
                    echo "<td>" . $modif->getModification() . "</td>";
                    echo "<td>" . $modif->getDate() . "</td>";
                    echo "<td>" . $modif->getTime() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>

    </html>
<?php
}
?>