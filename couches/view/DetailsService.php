<?php
function afficherDetailsServ()
{


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

            $serv = new ServiceService();
            $services = $serv->selectNbrOfEmpsByServs();

            foreach ($services as $serv) {

                echo "<tr>";
                echo "<td>" . $serv->getNoserv() . "</td>";
                echo "<td>" . $serv->getService() . "</td>";
                echo "<td>" . $serv->getVille() . "</td>";
                echo "<td class = 'fk' >" . $serv->getNbrOfEmps() . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <a href="tableau-connecte.php"><button>TABLEAU</button></a>
    </body>

    </html>

<?php
}
?>