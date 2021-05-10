<?php
include_once(__DIR__ . '/../Model/Service.php');

class ServiceDAO extends CommonDAO
{


  function deleteServ($noserv)
  {
    $db = $this->connexion();
    $stmt = $db->prepare("DELETE FROM serv WHERE Noserv = ?;");
    $stmt->bind_param('i', $noserv);
    $stmt->execute();
    $rs = $stmt->get_result();
    $db->close();
    return $rs;
  }


  function selectNbrOfEmpsByServs()
  {
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

    return $empsByServ;
  }

  function selectServByNoserv($noserv)
  {

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
    return $serv;
  }

  function selectAllFromServ()
  {
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT * FROM serv;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $services = [];
    foreach ($data as $d) {
      $service = new Service;
      $service->setNoserv($d['noserv'])->setService($d['service'])->setVille($d['ville']);
      array_push($services, $service);
    }
    $rs->free();
    $db->close();
    return $services;
  }
}
