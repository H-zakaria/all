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
       
        try{

        $created = $empDao->createEmp($emp);

        }catch(DAOException $e){
            throw new ServiceException($e->getMessage(), $e->getCode());
        }
        return $created;
    }
    function ajoutsJour(): array
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->ajoutsJour();
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function infosGeneralesEmp()
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->infosGeneralesEmp();
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function selectAllSupsNum()
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectAllSupsNum();
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function selectInfosSups()
    {   
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectInfosSups();
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function selectAllOfOneEmpByNoemp($noemp)
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectAllOfOneEmpByNoemp($noemp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function selectAllOfOneEmpInArray($noemp)
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectAllOfOneEmpInArray($noemp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function selectDetailInfosSup($noemp)
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectDetailInfosSup($noemp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function  selectDetailInfos($noemp)
    {
        $empDAO = new EmployeDAO();
        try{
        return $empDAO->selectDetailInfos($noemp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function deleteEmp($noemp)
    {
        $empDAO = new EmployeDAO;
        try{
        return $empDAO->deleteEmp($noemp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
    function updateEmp($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj)
    {
        $emp = new Employe2;
        $emp->setNoemp($noemp)->setNom($nom)->setPrenom($prenom)->setEmploi($emploi)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noserv)->setNoproj($noproj);
        $empDAO = new EmployeDAO;
        try{
        return $empDAO->updateEmp($emp);
    }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }
    }
}
