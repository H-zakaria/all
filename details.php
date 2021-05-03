<?php

include_once 'header.php';

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}
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


            $datas = selectDetailInfos($noemp);



            foreach ($datas as $data) {

                echo "<tr>";
                echo "<td>" . $data['noemp'] . "</td>";
                echo "<td>" . $data['nom'] . "</td>";
                echo "<td>" . $data['prenom'] . "</td>";
                echo "<td>" . $data['emploi'] . "</td>";
                echo "<td>" . $data['sup'] . "</td>";
                echo "<td>" . $data['embauche'] . "</td>";
                echo "<td>" . $data['sal'] . "</td>";
                echo "<td>" . $data['comm'] . "</td>";
                echo "<td>" . $data['noserv'] . "</td>";
                echo "<td>" . $data['noproj'] . "</td>";
                echo "<td>" . $data['date_ajout'] . "</td>";
                echo "<td class ='fk'>" . $data['service'] . "</td>";
                echo "<td class ='fk'>" . $data['ville'] . "</td>";
                echo "<td class ='fk'>" . $data['nomproj'] . "</td>";
                echo "<td class ='fk'>" . $data['budget'] . "</td>";
                echo "</tr>";
            }




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



            $datas2 = selectDetailInfosSup($noemp);


            foreach ($datas2 as $data) {

                echo "<tr>";
                echo "<td>" . $data['noemp'] . "</td>";
                echo "<td>" . $data['nom'] . "</td>";
                echo "<td class = 'fk'>" . $data['service'] . "</td>";
                echo "<td>" . $data['emploi'] . "</td>";
                echo "<td>" . $data['sup'] . "</td>";
                echo "<td class = 'fk'>" . $data['nomproj'] . "</td>";
                echo "</tr>";
            }



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



            $datas3 = selectModifHisto($noemp);



            foreach ($datas3 as $data) {

                echo "<tr>";
                echo "<td>" . $data['modification'] . "</td>";
                echo "<td>" . $data['Date'] . "</td>";
                echo "<td>" . $data['Time'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>