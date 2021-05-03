<?php
include_once 'header.php';
?>

<?php
if ($_GET['but'] == 'ajouter') {
?>
    </div class="form_div">
    <form class="form" action="includes/ajouter_service.php" target="tableau-connecte.php" method="POST">
        <input type="number" name="noserv" placeholder="Entrez le numero du service">
        <input type="text" name="service" placeholder="Entrez le nom du service">
        <input type="text" name="ville" placeholder="Entrez le nom de la ville">
        <input type="submit" value="Soumettre">
    </form>
    <a href="tableau-connecte.php"><button>TABLEAU</button></a>
    </div>
<?php
} else if ($_GET["but"] == 'modifier') {

    $noserv = $_GET['noserv'];

    // $datas = selectThisServ($conn, $_GET["noserv"]);
    $datas = selectServByNoserv($noserv);


    print_r($datas);



?>
    <div class="form_div">
        <form class="form" action="includes/modifier_service.php" method="POST">
            <input type="number" name="noserv" value=<?php echo $datas[0]['noserv']; ?> placeholder="Entrez le numero du service">
            <input type="text" name="service" value=<?php echo $datas[0]['service']; ?> placeholder="Entrez le nom du service">
            <input type="text" name="ville" value=<?php echo $datas[0]['ville']; ?> placeholder="Entrez le nom de la ville">
            <input type="submit" value="Soumettre">
        </form>
        <a href="tableau-connecte.php"><button>TABLEAU</button></a>
    </div>
<?php

} else {
    echo "l'employé n'existe pas.";
}
?>




</body>

</html>