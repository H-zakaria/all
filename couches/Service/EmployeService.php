<?php
include_once(__DIR__ . '/../DAO/EmployeDAO.php');
include_once(__DIR__ . '/../Model/Employe2.php');


//l'endroit où tu veux faire l'action = ajouter
//->service appelle DAO
//DAO rend resultat = v/F
class EmployeService
{


    public function createEmp($nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj)
    {
        $emp = new Employe2;
        $emp->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noserv)->setNoproj($noproj);
        $empDao = new EmployeDAO($emp);
        $created = $empDao->createEmp($emp);
        return $created;
    }
    function ajoutsJour(): array
    {
        $empDAO = new EmployeDAO();
        return $empDAO->ajoutsJour();
    }
    function infosGeneralesEmp()
    {
        $empDAO = new EmployeDAO();
        return $empDAO->infosGeneralesEmp();
    }
    function selectAllSupsNum()
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectAllSupsNum();
    }
    function selectInfosSups()
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectInfosSups();
    }
    function selectAllOfOneEmpByNoemp($noemp)
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectAllOfOneEmpByNoemp($noemp);
    }
    function selectAllOfOneEmpInArray($noemp)
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectAllOfOneEmpInArray($noemp);
    }
    function selectDetailInfosSup($noemp)
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectDetailInfosSup($noemp);
    }
    function  selectDetailInfos($noemp)
    {
        $empDAO = new EmployeDAO();
        return $empDAO->selectDetailInfos($noemp);
    }
    function deleteEmp($noemp)
    {
        $empDAO = new EmployeDAO;
        return $empDAO->deleteEmp($noemp);
    }
    function updateEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj)
    {
        $emp = new Employe2;
        $emp->setNoemp($noemp)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noserv)->setNoproj($noproj);
        $empDAO = new EmployeDAO;
        return $empDAO->updateEmp($emp);
    }
}
