<?php
include_once(__DIR__ . '/../Model/Service.php');
include_once(__DIR__ . '/CommonDAO.php');
include_once(__DIR__ . '/../exceptions/DAOException.php');

class ServiceDAO extends CommonDAO
{


  function deleteServ($noserv)
  {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $stmt = $db->prepare("DELETE FROM serv WHERE Noserv = ?;");
      $stmt->bind_param('i', $noserv);
      $stmt->execute();
      $rs = $stmt->get_result();
      $db->close();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }
    return $rs;
  }

  function updateService($updatedServ)
  {
    $noserv = $updatedServ->getNoserv();
    $service = $updatedServ->getService();
    $ville = $updatedServ->getVille();
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $stmt = $db->prepare("UPDATE serv SET noserv = ?, service = ?, ville = ? WHERE noserv = ?  or  service = ?;");
      $stmt->bind_param('issis', $noserv, $service, $ville, $noserv, $service);
      $stmt->execute();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }
  }


  function selectNbrOfEmpsByServs()
  {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $stmt = $db->prepare("SELECT serv.*, count(emp.noemp) as 'nombre_d_employes_du_service' from serv
    INNER JOIN emp on emp.noserv = serv.noserv;");
      $stmt->execute();
      $rs = $stmt->get_result();
      $datas = $rs->fetch_all(MYSQLI_ASSOC);
      $empsByServ = [];
      foreach ($datas as $data) {
        $serv = new Service;
        $serv->setNoserv($data['noserv'])->setService($data['service'])->setVille($data['ville'])->setNbrOfEmps($data['nombre_d_employes_du_service']);
        array_push($empsByServ, $serv);
      }
      $rs->free();
      $db->close();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }

    return $empsByServ;
  }

  function selectServByNoserv($noserv)
  {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $stmt = $db->prepare("SELECT * FROM serv WHERE noserv = ?;");
      $stmt->bind_param('i', $noserv);
      $stmt->execute();
      $rs = $stmt->get_result();
      $data = $rs->fetch_array(MYSQLI_ASSOC);

      $serv = new Service;
      $serv->setNoserv($data['noserv'])->setService($data['service'])->setVille($data['ville']);


      $rs->free();
      $db->close();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }
    return $serv;
  }

  function selectAllFromServ()
  {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $stmt = $db->prepare("SELECT serv.*, count(emp.noemp) as 'nombre_employes' FROM serv LEFT JOIN emp ON serv.noserv = emp.noserv GROUP BY noserv;");
      $stmt->execute();
      $rs = $stmt->get_result();
      $data = $rs->fetch_all(MYSQLI_ASSOC);
      $services = [];
      foreach ($data as $d) {
        $service = new Service;
        $service->setNoserv($d['noserv'])->setService($d['service'])->setVille($d['ville'])->setNbrOfEmps($d['nombre_employes']);
        array_push($services, $service);
      }
      $rs->free();
      $db->close();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }
    return $services;
  }

  function createService(Service $newServ)
  {
    mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    try {
      $db = $this->connexion();
      $noserv = $newServ->getNoserv();
      $nomServ = $newServ->getService();
      $ville = $newServ->getVille();
      $stmt = $db->prepare("INSERT INTO serv(noserv, service, ville) VALUES(?,?,?);");
      $stmt->bind_param('iss', $noserv, $nomServ, $ville);
      $stmt->execute();
      $db->close();
    } catch (Exception $e) {

      throw new DAOException($e->getMessage(), $e->getCode());
    }
  }
}
