<?php

class Vol{
    private $idVol;
    private $dateDep;
    private $heureDep;
    private $villeDep;
    private $villeArv;
    private $refAvion;
    private $refPilote;
    private $prix;

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
    public function getIdVol()
    {
        return $this->idVol;
    }

    /**
     * @param mixed $idVol
     */
    public function setIdVol($idVol)
    {
        $this->idVol = $idVol;
    }

    /**
     * @return mixed
     */
    public function getHeureDep()
    {
        return $this->heureDep;
    }

    /**
     * @param mixed $heureDep
     */
    public function setHeureDep($heureDep)
    {
        $this->heureDep = $heureDep;
    }

    /**
     * @return mixed
     */
    public function getVilleDep()
    {
        return $this->villeDep;
    }

    /**
     * @param mixed $villeDep
     */
    public function setVilleDep($villeDep)
    {
        $this->villeDep = $villeDep;
    }

    /**
     * @return mixed
     */
    public function getVilleArv()
    {
        return $this->villeArv;
    }

    /**
     * @param mixed $villeArv
     */
    public function setVilleArv($villeArv)
    {
        $this->villeArv = $villeArv;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->refAvion;
    }

    /**
     * @param mixed $refAvion
     */
    public function setRefAvion($refAvion)
    {
        $this->refAvion = $refAvion;
    }

    /**
     * @return mixed
     */
    public function getDateDep()
    {
        return $this->dateDep;
    }

    /**
     * @param mixed $dateDep
     */
    public function setDateDep($dateDep)
    {
        $this->dateDep = $dateDep;
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

}