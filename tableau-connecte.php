<?php
include_once 'header.php';

if (isset($_SESSION['user_id'])) {


?>
    <div class="container">
        <div class="table1">

            <?php

            // $datas = countAjoutsDuJour($conn);
            $sql = "SELECT count(*) from emp where date_ajout = DATE(NOW());";
            $datas = maQuery($sql, 'select');


            ?>

            <table class="employes">
                <thead>
                    <tr>
                        <th>No employé</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>emploi</th>
                        <th>Nom du superieur</th>
                        <th>Embauche</th>
                        <th>Salaire</th>
                        <th>Commission</th>
                        <th>service</th>
                        <th>Projet</th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    // $datas = nomDuSup($conn);
                    $sql = "SELECT e.*, s.service, p.nomproj, e2.nom as nsup FROM emp e
            INNER JOIN serv s on s.noserv = e.noserv
            INNER JOIN proj p on p.noproj = e.noproj
            LEFT JOIN emp e2 on e.sup = e2.noemp;";
                    $datas = maQuery($sql, 'select');


                    $sql = "SELECT DISTINCT e.noemp FROM emp e
                INNER JOIN emp e2 on e.noemp = e2.sup;";
                    $sups = maQuery($sql, 'select');


                    $sups_1d = [];
                    $i = 0;
                    foreach ($sups as $array) {
                        $sups_1d[$i] = $array['noemp'];
                        $i++;
                    }





                    foreach ($datas as $data) {
                        if (in_array($data['noemp'], $sups_1d)) {
                            echo "<tr class='sup'>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>" . $data['noemp'] . "</td>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "<td>" . $data['emploi'] . "</td>";
                        echo "<td>" . $data['nsup'] . "</td>";
                        echo "<td>" . $data['embauche'] . "</td>";
                        echo "<td>" . $data['sal'] . "</td>";
                        echo "<td>" . $data['comm'] . "</td>";
                        echo "<td>" . $data['service'] . "</td>";
                        echo "<td>" . $data['nomproj'] . "</td>";

                        echo "<td><a href='details.php?noemp=$data[noemp]'><button>details</button></a></td>";
                        if ($_SESSION['profil'] == "admin") {
                            echo "<td><a href='form_modif.php?noemp=$data[noemp]'><button>Modifier</button></a></td>";
                            if (in_array($data['noemp'], $sups_1d)) {
                                echo "<td><a href='includes/supr.php?noemp=$data[noemp]'><button disabled>supprimer</button></a></td>";
                            } else {
                                echo "<td><a href='includes/supr.php?noemp=$data[noemp]'><button>supprimer</button></a></td>";
                            }
                        }


                        echo "</tr>";
                    }


                    ?>
                </tbody>
            </table>

        </div>

        <table class="services">
            <thead>
                <tr>
                    <th>No service</th>
                    <th>Designation</th>
                    <th>Ville</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                echo "<br>";
                echo "<hr>";
                echo "<br>";


                $sql = "SELECT * FROM serv;";
                // $datas = selectAllFromServ($conn);
                $datas = maQuery($sql, 'select');

                foreach ($datas as $data) {

                    echo "<tr>";
                    echo "<td>" . $data['noserv'] . "</td>";
                    echo "<td>" . $data['service'] . "</td>";
                    echo "<td>" . $data['ville'] . "</td>";
                    echo "<td><a href='details_service.php?noserv=$data[noserv]'><button>details</button></a></td>";
                    echo "<td><a href='form_services.php?noserv=$data[noserv]&but=modifier'><button>Modifier</button></a></td>";
                    echo "<td><a href='includes/supr_service.php?noserv=$data[noserv]'><button>supprimer</button></a></td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>

<?php
} else {
    header("Location: signup&login_form.php");
}
?>
</body>

</html>