<?php

// Exemple typique d'une fonction de communication avec la BDD (CAS de SELECT)
function maQuery($sql, $select)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $rs = mysqli_query($con, $sql);
    // SI c'est nécessaire (CAS DU SELECT)
    if ($select == 'select') {
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        mysqli_free_result($rs);
        return $data;
    }

    mysqli_close($con);
}
function selectInfosSups()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT  e.noemp, e.nom, e.prenom, service, e.emploi FROM emp e
    INNER JOIN serv s on e.noserv = s.noserv
    WHERE e.noemp IN(SELECT DISTINCT sup from emp);";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectAllProjectsNum()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = " SELECT DISTINCT noproj FROM proj;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}

function selectNbrOfEmpsByServs()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT serv.*, count(emp.noemp) as 'nombre_d_employes_du_service' from serv
        INNER JOIN emp on emp.noserv = serv.noserv;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function infosGeneralesEmp()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT e.*, s.service, p.nomproj, e2.nom as nsup FROM emp e
                    INNER JOIN serv s on s.noserv = e.noserv
                    INNER JOIN proj p on p.noproj = e.noproj
                    LEFT JOIN emp e2 on e.sup = e2.noemp;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectModifHisto($noemp)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT m.modification, m.Date, m.Time FROM date_modif m WHERE m.noemp = $noemp;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectDetailInfosSup($noemp)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT sup.noemp, sup.nom, s.service, sup.emploi, sup.sup, proj.nomproj
    FROM emp as sup
    INNER JOIN emp e on e.sup = sup.noemp
    INNER JOIN serv as s on sup.noserv = s.noserv
    INNER JOIN proj on sup.noproj = proj.noproj
    WHERE e.noemp ='$noemp';";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectDetailInfos($noemp)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT e.*, s.*, p.* FROM emp e 
                    INNER JOIN serv s on e.noserv = s.noserv
                    INNER JOIN proj p on e.noproj = p.noproj
                    WHERE noemp ='$noemp';";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectAllOfOneEmpByNoemp($noemp)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT * FROM emp WHERE noemp = $noemp;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectServByNoserv($noserv)
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT * FROM serv WHERE noserv = $noserv;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}

function selectAllFromServ()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT * FROM serv;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function selectAllSupsNum()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT DISTINCT e.noemp FROM emp e
    INNER JOIN emp e2 on e.noemp = e2.sup;";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;

    mysqli_close($con);
}
function ajoutsJour()
{
    $con = mysqli_init();
    if (!$con) {
        die("mysqli_init failed");
    }
    mysqli_real_connect($con, 'localhost', 'zak', 'mdp', 'gestion_emp');
    $sql = "SELECT count(*) as 'count' from emp where date_ajout = DATE(NOW());";
    $rs = mysqli_query($con, $sql);

    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    mysqli_free_result($rs);
    return $data;


    mysqli_close($con);
}
function checkSession()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: includes/signup&login.php");
    }
}
// function fetch($sql, $conn)
// {
//     $result = mysqli_query($conn, $sql);
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }

// function selectAllSups($conn)
// {
//     /* Selectionne num, prenom, nom, nom du service, emploi */
//     $sql = "SELECT  e.noemp, e.nom, e.prenom, service, e.emploi FROM emp e
//     INNER JOIN serv s on e.noserv = s.noserv
//     WHERE e.noemp IN(SELECT DISTINCT sup from emp);";
//     return fetch($sql, $conn);
// }

// function countAjoutsDuJour($conn)
// {
//     $sql = "SELECT count(*) from emp where date_ajout = DATE(NOW());";
//     $result = mysqli_query($conn, $sql);
//     $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     return $datas;
// }

// function nomDuSup($conn)
// {
//     $sql = "SELECT e.*, s.service, p.nomproj, e2.nom as nsup FROM emp e
//             INNER JOIN serv s on s.noserv = e.noserv
//             INNER JOIN proj p on p.noproj = e.noproj
//             LEFT JOIN emp e2 on e.sup = e2.noemp;";

//     return fetch($sql, $conn);
// }

// function selectAllFromServ($conn)
// {
//     $sql = "SELECT * FROM serv;";
//     return fetch($sql, $conn);
// }

// function selectSupsNum($conn)
// {
//     $sql = "SELECT DISTINCT e.noemp FROM emp e
//                  INNER JOIN emp e2 on e.noemp = e2.sup;";
//     $result2 = mysqli_query($conn, $sql);
//     return mysqli_fetch_all($result2, MYSQLI_NUM);
// }
// function selectThisServ($conn, $noserv)
// {
//     $sql = "SELECT * FROM serv WHERE noserv = $noserv;";
//     return fetch($sql, $conn);
// }

// function selectThisEmp($conn, $noemp)
// {
//     $sql = "SELECT * FROM emp WHERE noemp = $noemp;";
//     return fetch($sql, $conn);
// }
