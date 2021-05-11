<?php
include_once(__DIR__ . '/../Model/Employe2.php');
include_once(__DIR__ . '/../DAO/CommonDAO.php');
class EmployeDAO extends CommonDAO
{




  //param = objet
  function createEmp(Employe2 $emp)
  {
    $nom = $emp->getNom();
    $prenom = $emp->getPrenom();
    $emploi = $emp->getEmploi();
    $sup = $emp->getSup();
    $embauche = $emp->getEmbauche();
    $sal = $emp->getSal();
    $comm = $emp->getComm();
    $noserv = $emp->getNoserv();
    $noproj =  $emp->getNoproj();
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try{
      $db = $this->connexion();
      $stmt = $db->prepare("INSERT INTO emp(nom, prenom, emploi, sup, embauche, sal, comm, noserv, noproj) VALUES(? ,? ,? ,? ,? ,? ,? ,? ,?);");
      $stmt->bind_param('sssisddii', $nom, $prenom,  $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj);
      $stmt->execute();
      $rs = $stmt->get_result();
      $db->close();
    }catch(Exception $e){

      throw new DAOException($e->getMessage(), $e->getCode());

    }
   

    
    return $rs;
  }
  function updateEmp(Employe2 $emp)
  {
    $noemp = $emp->getNoemp();
    $nom = $emp->getNom();
    $prenom = $emp->getPrenom();
    $emploi = $emp->getEmploi();
    $sup = $emp->getSup();
    $embauche = $emp->getEmbauche();
    $sal = $emp->getSal();
    $comm = $emp->getComm();
    $noserv = $emp->getNoserv();
    $noproj =  $emp->getNoproj();
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("UPDATE emp SET nom = ?, prenom = ?, emploi = ?, sup = ?, embauche = ?, sal = ?, comm = ?, noserv = ?, noproj = ? WHERE noemp = ?;");
    $stmt->bind_param('sssisddiii',  $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj, $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $rs;
  }

  // function setEmpCreationDate($noemp)
  // {
  //     $db = new mysqli('localhost', 'zak', 'mdp', 'gestion_emp');
  //     $stmt = $db->prepare("UPDATE emp SET date_ajout = DATE(NOW()) WHERE noemp = ?;");
  //     $stmt->bind_param('i', $noemp);
  //     $stmt->execute();
  //     $rs = $stmt->get_result();
  //     $db->close();
  //     return $rs;
  // }

  function deleteEmp($noemp)
  {

    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("DELETE FROM emp WHERE noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    
  
    return $rs;
  }

  function selectInfosSups()
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT  e.noemp, e.nom, e.prenom, service, e.emploi FROM emp e 
        INNER JOIN serv s on e.noserv = s.noserv 
        WHERE e.noemp IN(SELECT DISTINCT sup from emp);");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $infosSups = [];
    foreach ($data as $d) {
      $sup = new Employe2;
      $sup->setNoemp($d['noemp'])->setNom($d['nom'])->setPrenom($d['prenom'])->setEmploi($d['emploi'])->setNomService($d['service']);
      array_push($infosSups, $sup);
    }
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $infosSups;
  }

  function selectAllOfOneEmpByNoemp($noemp)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT * FROM emp WHERE noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $emp = new Employe2;
    $emp->setNoemp($data['noemp'])->setNom($data['nom'])->setPrenom($data['prenom'])->setEmploi($data['emploi'])->setSup($data['sup'])->setEmbauche($data['embauche'])->setSal($data['sal'])->setComm($data['comm'])->setNoserv($data['noserv'])->setNoproj($data['noproj'])->setDate_ajout($data['date_ajout']);
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $emp;
  }
  function selectAllOfOneEmpInArray($noemp)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT * FROM emp WHERE noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data;
  }

  function infosGeneralesEmp()
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT e.*, s.service, p.nomproj, e2.nom as nsup FROM emp e
    INNER JOIN serv s on s.noserv = e.noserv
    INNER JOIN proj p on p.noproj = e.noproj
    LEFT JOIN emp e2 on e.sup = e2.noemp;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $infos = [];
    foreach ($data as $d) {
      $emp = new Employe2;
      $emp->setNoemp($d['noemp'])->setNom($d['nom'])->setPrenom($d['prenom'])->setEmploi($d['emploi'])->setNomSup($d['nsup'])->setEmbauche($d['embauche'])->setSal($d['sal'])->setComm($d['comm'])->setNomService($d['service'])->setNomProjet($d['nomproj']);
      array_push($infos, $emp);
    }
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $infos;
  }

  function selectDetailInfosSup($noemp)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT sup.noemp, sup.nom, s.service, sup.emploi, sup.sup as sup_noemp, proj.nomproj
    FROM emp as sup
    INNER JOIN emp e on e.sup = sup.noemp
    INNER JOIN serv as s on sup.noserv = s.noserv
    INNER JOIN proj on sup.noproj = proj.noproj
    WHERE e.noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $d = $rs->fetch_array(MYSQLI_ASSOC);
    $sup = new Employe2;
    $sup->setNoemp($d['noemp'])->setNom($d['nom'])->setEmploi($d['emploi'])->setSupNoemp($d['sup_noemp'])->setNomService($d['service'])->setNomProjet($d['nomproj']);
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $sup;
  }

  function selectAllSupsNum()
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT DISTINCT e.noemp FROM emp e
    INNER JOIN emp e2 on e.noemp = e2.sup;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data;
  }
  function ajoutsJour()
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT count(*) as 'count' from emp where date_ajout = CURDATE();");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data;
  }

  function selectDetailInfos($noemp)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT e.*, s.*, p.* FROM emp e 
      INNER JOIN serv s on e.noserv = s.noserv
      INNER JOIN proj p on e.noproj = p.noproj
      WHERE noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);

    $emp = new Employe2;
    $emp->setNoemp($data['noemp'])->setNom($data['nom'])->setPrenom($data['prenom'])->setEmploi($data['emploi'])->setSup($data['sup'])->setEmbauche($data['embauche'])->setSal($data['sal'])->setComm($data['comm'])->setNoserv($data['noserv'])->setNoproj($data['noproj'])->setDate_ajout($data['date_ajout'])->setNomService($data['service'])->setVille($data['ville'])->setNomProjet('nomproj')->setBudget($data['budget']);

    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }

    return $emp;
  }


  function countEmp()
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT count(*) as 'nombre_d_employes' from emp;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
   }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data;
  }
}
