<?php

include_once(__DIR__ . '/../DAO/ModificationDAO.php');
include_once(__DIR__ . '/../Model/Modification.php');

class ModificationService
{
    function selectModifHisto($noemp)
    {
        $modif = new ModificationDAO();
        try{
        return $modif->selectModifHisto($noemp);
        }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
    }   
    }
    function recordModif($noemp, $modification)
    {
        $modif = new Modification;
        $modif->setNoemp($noemp)->setModification($modification);
        $modifDAO = new ModificationDAO();

        try{
        return $modifDAO->recordModif($modif);
        }catch(DAOException $e){
        throw new ServiceException($e->getMessage(), $e->getCode());
        }
    }
}
