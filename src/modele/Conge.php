<?php

class Conge
{
    private $idConge;
    private $dateDebut;
    private $dateFin;
    private $estValide;
    private $refPilote;
    private $refValidationAdmin;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdConge()
    {
        return $this->idConge;
    }

    /**
     * @param mixed $idConge
     */
    public function setIdConge($idConge)
    {
        $this->idConge = $idConge;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getEstValide()
    {
        return $this->estValide;
    }

    /**
     * @param mixed $estValide
     */
    public function setEstValide($estValide)
    {
        $this->estValide = $estValide;
    }

    /**
     * @return mixed
     */
    public function getRefPilote()
    {
        return $this->refPilote;
    }

    /**
     * @param mixed $refPilote
     */
    public function setRefPilote($refPilote)
    {
        $this->refPilote = $refPilote;
    }

    /**
     * @return mixed
     */
    public function getRefValidationAdmin()
    {
        return $this->refValidationAdmin;
    }

    /**
     * @param mixed $refValidationAdmin
     */
    public function setRefValidationAdmin($refValidationAdmin)
    {
        $this->refValidationAdmin = $refValidationAdmin;
    }

}