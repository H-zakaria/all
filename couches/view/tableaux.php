<?php

function afficherTabEmp()
{
  include_once(__DIR__ . '/../Service/ServiceService.php');

?>
  <div class="container">

    <div class="table1">



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
            <?php if ($_SESSION['profil'] == 'admin') { ?>
              <th></th>
              <th></th>
            <?php } ?>

          </tr>
        </thead>
        <tbody>
          <?php
          $empService = new EmployeService;
          $infosEmps =  $empService->infosGeneralesEmp();
          $sups = $empService->selectAllSupsNum();

          $sups_1d = [];
          $i = 0;
          foreach ($sups as $array) {
            $sups_1d[$i] = $array['noemp'];
            $i++;
          }

          foreach ($infosEmps as $infosEmp) {
            if (in_array($infosEmp->getNoemp(), $sups_1d)) {
              echo "<tr class='sup'>";
            } else {
              echo "<tr>";
            }
            echo "<td>" . $infosEmp->getNoemp() . "</td>";
            echo "<td>" . $infosEmp->getNom() . "</td>";
            echo "<td>" . $infosEmp->getPrenom() . "</td>";
            echo "<td>" . $infosEmp->getEmploi() . "</td>";
            echo "<td>" . $infosEmp->getNomSup() . "</td>";
            echo "<td>" . $infosEmp->getEmbauche() . "</td>";
            echo "<td>" . $infosEmp->getSal() . "</td>";
            echo "<td>" . $infosEmp->getComm() . "</td>";
            echo "<td>" . $infosEmp->getNomService() . "</td>";
            echo "<td>" . $infosEmp->getNomProjet() . "</td>";

            $noemp = $infosEmp->getNoemp();
            echo "<td><a href='details.php?noemp=$noemp'><button>details</button></a></td>";
            if ($_SESSION['profil'] == "admin") {
              echo "<td><a href='form_modif.php?noemp=$noemp'><button>Modifier</button></a></td>";
              if (in_array($infosEmp->getNoemp(), $sups_1d)) {
                echo "<td><a href='#'><button disabled>supprimer</button></a></td>";
              } else {
                echo "<td><a href='supr.php?noemp=$noemp'><button>supprimer</button></a></td>";
              }
            }


            echo "</tr>";
          }


          ?>
        </tbody>
      </table>

    </div>
  <?php
}


function afficherTabServices()
{

  ?>

    <table class="services">
      <thead>
        <tr>
          <th>No service</th>
          <th>Designation</th>
          <th>Ville</th>
          <th>Nombre d'employes</th>
          <?php if ($_SESSION['profil'] == 'admin') { ?>
            <th></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php

        echo "<br>";
        echo "<hr>";
        echo "<br>";

        $serv = new ServiceService();
        $services = $serv->selectAllFromServ();
        // print_r($datas);


        foreach ($services as $service) {
          $noserv = $service->getNoserv();

          echo "<tr>";
          echo "<td>" . $service->getNoserv() . "</td>";
          echo "<td>" . $service->getService() . "</td>";
          echo "<td>" . $service->getVille() . "</td>";
          echo "<td class = 'fk' >" . $service->getNbrOfEmps() . "</td>";
          if ($_SESSION['profil'] == 'admin') {
            echo "<td><a href='form_services.php?noserv=$noserv&but=modifier'><button>Modifier</button></a></td>";
          }
          echo "</tr>";
        }

        ?>

      </tbody>
    </table>
  </div>
  </body>

  </html>

<?php } ?>