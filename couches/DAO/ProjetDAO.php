<?php

class ProjetDAO
{

    function selectAllProjectsNum()
    {
        $db = new mysqli('localhost', 'zak', 'mdp', 'gestion_emp');
        $stmt = $db->prepare("SELECT DISTINCT noproj FROM proj;");
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $db->close();
        return $data;
    }
}
