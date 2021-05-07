<?php

include_once(__DIR__ . '/../DAO/ModificationDAO.php');
include_once(__DIR__ . '/../Model/Modification.php');

class ModificationService
{
    function selectModifHisto($noemp)
    {
        $modif = new ModificationDAO();
        return $modif->selectModifHisto($noemp);
    }
    function recordModif($noemp, $modification)
    {
        $modif = new Modification;
        $modif->setNoemp($noemp)->setModification($modification);
        $modifDAO = new ModificationDAO();
        return $modifDAO->recordModif($modif);
    }
}
