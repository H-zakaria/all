<?php

include_once 'header.php';
?>
<table>
    <thead>
        <tr>
            <th>Numero du service</th>
            <th>Designation</th>
            <th>Ville</th>
            <th class="fk">nombres d'employés du service</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $noemp = $_GET['noserv'];


        $datas = selectNbrOfEmpsByServs();


        foreach ($datas as $data) {

            echo "<tr>";
            echo "<td>" . $data['noserv'] . "</td>";
            echo "<td>" . $data['service'] . "</td>";
            echo "<td>" . $data['ville'] . "</td>";
            echo "<td class = 'fk' >" . $data['nombre_d_employes_du_service'] . "</td>";
            echo "</tr>";
        }




        ?>
    </tbody>
</table>
<a href="tableau-connecte.php"><button>TABLEAU</button></a>
</body>

</html>