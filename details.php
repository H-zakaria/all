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

            $sql = "SELECT e.*, s.*, p.* FROM emp e 
                    INNER JOIN serv s on e.noserv = s.noserv
                    INNER JOIN proj p on e.noproj = p.noproj
                    WHERE noemp ='$noemp';";
            $datas = maQuery($sql, 'select');

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


            $sql2 = "SELECT sup.noemp, sup.nom, s.service, sup.emploi, sup.sup, proj.nomproj
                    FROM emp as sup
                    INNER JOIN emp e on e.sup = sup.noemp
                    INNER JOIN serv as s on sup.noserv = s.noserv
                    INNER JOIN proj on sup.noproj = proj.noproj
                    WHERE e.noemp ='$noemp';";
            $datas2 = maQuery($sql2, 'select');

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


            $sql3 = "SELECT m.modification, m.Date, m.Time FROM date_modif m WHERE m.noemp = $noemp";
            $datas3 = maQuery($sql3, 'select');


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