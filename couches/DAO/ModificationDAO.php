<?php
include_once(__DIR__ . '/../Model/Modification.php');
include_once(__DIR__ . '/../DAO/CommonDAO.php');

class ModificationDAO extends CommonDAO
{


  function selectModifHisto($noemp)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT m.modification, m.Date, m.Time FROM date_modif m WHERE m.noemp = ?;");
    $stmt->bind_param('i', $noemp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $datas = $rs->fetch_all(MYSQLI_ASSOC);
    $modifs = [];
    foreach ($datas as $d) {
      $modification = new Modification;
      $modification->setModification($d['modification'])->setDate($d['Date'])->setTime($d['Time']);
      array_push($modifs, $modification);
    }
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $modifs;
  }

  function recordModif(Modification $modif)
  {

    $noemp = $modif->getNoemp();
    $modification = $modif->getModification();
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("INSERT INTO date_modif (noemp, modification, DateTime, Date, Time, Year) VALUE( ?, ?, NOW(), NOW(), NOW(), NOW());");
    $stmt->bind_param('is', $noemp, $modification);
    $stmt->execute();
    $rs = $stmt->get_result();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $rs;
  }
}
