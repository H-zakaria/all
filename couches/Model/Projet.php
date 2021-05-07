<?php

class Projet
{
    private $noproj;
    private $nomproj;
    private $budget;


    /**
     * Get the value of noproj
     */
    public function getNoproj()
    {
        return $this->noproj;
    }

    /**
     * Set the value of noproj
     *
     * @return  self
     */
    public function setNoproj($noproj)
    {
        $this->noproj = $noproj;

        return $this;
    }

    /**
     * Get the value of nomproj
     */
    public function getNomproj()
    {
        return $this->nomproj;
    }

    /**
     * Set the value of nomproj
     *
     * @return  self
     */
    public function setNomproj($nomproj)
    {
        $this->nomproj = $nomproj;

        return $this;
    }

    /**
     * Get the value of budget
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of budget
     *
     * @return  self
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }
}
