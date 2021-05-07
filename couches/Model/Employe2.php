<?php

class Employe2
{


    private  $noemp;
    private  $nom;
    private  $prenom;
    private  $emploi;
    private  $sup;
    private  $embauche;
    private  $sal;
    private  $comm;
    private  $noserv;
    private  $noproj;
    private  $date_ajout;
    private  $nomSup;
    private  $nomService;
    private  $nomProjet;
    private  $supNoemp;
    private  $ville;
    private  $budget;




    /**
     * Get the value of noemp
     */
    public function getNoemp()
    {
        return $this->noemp;
    }

    /**
     * Set the value of noemp
     *
     * @return  self
     */
    public function setNoemp($noemp)
    {
        $this->noemp = $noemp;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of emploi
     */
    public function getEmploi()
    {
        return $this->emploi;
    }

    /**
     * Set the value of emploi
     *
     * @return  self
     */
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    /**
     * Get the value of sup
     */
    public function getSup()
    {
        return $this->sup;
    }

    /**
     * Set the value of sup
     *
     * @return  self
     */
    public function setSup($sup)
    {
        $this->sup = $sup;

        return $this;
    }

    /**
     * Get the value of embauche
     */
    public function getEmbauche()
    {
        return $this->embauche;
    }

    /**
     * Set the value of embauche
     *
     * @return  self
     */
    public function setEmbauche($embauche)
    {
        $this->embauche = $embauche;

        return $this;
    }

    /**
     * Get the value of sal
     */
    public function getSal()
    {
        return $this->sal;
    }

    /**
     * Set the value of sal
     *
     * @return  self
     */
    public function setSal($sal)
    {
        $this->sal = $sal;

        return $this;
    }

    /**
     * Get the value of comm
     */
    public function getComm()
    {
        return $this->comm;
    }

    /**
     * Set the value of comm
     *
     * @return  self
     */
    public function setComm($comm)
    {
        $this->comm = $comm;

        return $this;
    }

    /**
     * Get the value of noserv
     */
    public function getNoserv()
    {
        return $this->noserv;
    }

    /**
     * Set the value of noserv
     *
     * @return  self
     */
    public function setNoserv($noserv)
    {
        $this->noserv = $noserv;

        return $this;
    }

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
     * Get the value of date_ajout
     */
    public function getDate_ajout()
    {
        return $this->date_ajout;
    }

    /**
     * Set the value of date_ajout
     *
     * @return  self
     */
    public function setDate_ajout($date_ajout)
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    /**
     * Get the value of nomSup
     */
    public function getNomSup()
    {
        return $this->nomSup;
    }

    /**
     * Set the value of nomSup
     *
     * @return  self
     */
    public function setNomSup($nomSup)
    {
        $this->nomSup = $nomSup;

        return $this;
    }

    /**
     * Get the value of nomService
     */
    public function getNomService()
    {
        return $this->nomService;
    }

    /**
     * Set the value of nomService
     *
     * @return  self
     */
    public function setNomService($nomService)
    {
        $this->nomService = $nomService;

        return $this;
    }

    /**
     * Get the value of nomProjet
     */
    public function getNomProjet()
    {
        return $this->nomProjet;
    }

    /**
     * Set the value of nomProjet
     *
     * @return  self
     */
    public function setNomProjet($nomProjet)
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    /**
     * Get the value of supNoemp
     */
    public function getSupNoemp()
    {
        return $this->supNoemp;
    }

    /**
     * Set the value of supNoemp
     *
     * @return  self
     */
    public function setSupNoemp($supNoemp)
    {
        $this->supNoemp = $supNoemp;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

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
