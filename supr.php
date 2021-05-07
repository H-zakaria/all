<?php
include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}


$empService = new EmployeService;
$sups = $empService->selectAllSupsNum();
$sups_1d = [];
foreach ($sups as $sup) {
    $sups_1d[] = $sup['noemp'];
}
if (!in_array($_GET['noemp'], $sups_1d)) {
    $noemp = $_GET['noemp'];
    $deleted = $empService->deleteEmp($noemp);
    if (!$deleted) {
        echo "erreur l'employé n'a pas été éffacé de la bdd";
    } else {
        header("Location: ../tableau-connecte.php?suppression=succes");
        // echo 'here';
    }
} else {
    echo "impossible de supprimer un supérieur";
}


?>
</body>

</html>