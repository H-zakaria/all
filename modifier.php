<?php
include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}


if (isset($_POST['noemp'])) {

    $noemp = $_POST['noemp'];
    $empService = new EmployeService;
    $previous = $empService->selectAllOfOneEmpInArray($noemp);
    print_r($previous);

    $query = [];
    $modif = array_diff($_POST, $previous);
    foreach ($modif as $k => $v) {
        $query[] = $k . ": " . $previous[$k] . " => " . $v;
    }

    echo "<br>";
    echo "<br>";
    // foreach ($query as $q) {
    //     echo $q;
    // }
    echo "<br>";
    echo "<br>";
    // print_r($query);


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $emploi = $_POST['emploi'];
    $sup = $_POST['sup'];
    $embauche = $_POST['embauche'];
    $sal = $_POST['sal'];
    $comm = $_POST['comm'];
    $noserv = $_POST['noserv'];
    $noproj = $_POST['noproj'];

    $updated = $empService->updateEmp($noemp, $nom, $prenom,  $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj);

    $modifService = new ModificationService;
    foreach ($query as $modification) {
        $modifService->recordModif($noemp, $modification);
    }
    // Modification=succes?

    header("Location: tableau-connecte.php");
}
?>
</body>

</html>