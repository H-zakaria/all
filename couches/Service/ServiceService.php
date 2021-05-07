<?php
include_once(__DIR__ . '/../DAO/ServiceDAO.php');

class ServiceService
{
    function selectAllFromServ()
    {
        $serv = new ServiceDAO();
        return $serv->selectAllFromServ();
    }
    function selectServByNoserv($noserv)
    {
        $serv = new ServiceDAO();
        return $serv->selectServByNoserv($noserv);
    }
    function selectNbrOfEmpsByServs()
    {
        $serv = new ServiceDAO();
        return $serv->selectNbrOfEmpsByServs();
    }
    function deleteServ($noserv)
    {
        $serv = new ServiceDAO();
        return $serv->deleteServ($noserv);
    }
}
