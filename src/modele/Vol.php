<?php

class Vol{
    private $idVol;
    private $heureDep;
    private $heureArv;
    private $villeDep;
    private $villeArv;
    private $refAvion;
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
    public function getHeureArv()
    {
        return $this->heureArv;
    }

    /**
     * @param mixed $heureArv
     */
    public function setHeureArv($heureArv)
    {
        $this->heureArv = $heureArv;
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

}