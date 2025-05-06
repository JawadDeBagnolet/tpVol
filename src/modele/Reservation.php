<?php

class Reservation
{
    private $idReservation;
    private $prixBillet;
    private $refUtilisateur;
    private $refVol;

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
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getPrixBillet()
    {
        return $this->prixBillet;
    }

    /**
     * @param mixed $prixBillet
     */
    public function setPrixBillet($prixBillet)
    {
        $this->prixBillet = $prixBillet;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->refUtilisateur;
    }

    /**
     * @param mixed $refUtilisateur
     */
    public function setRefUtilisateur($refUtilisateur)
    {
        $this->refUtilisateur = $refUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getRefVol()
    {
        return $this->refVol;
    }

    /**
     * @param mixed $refVol
     */
    public function setRefVol($refVol)
    {
        $this->refVol = $refVol;
    }

}