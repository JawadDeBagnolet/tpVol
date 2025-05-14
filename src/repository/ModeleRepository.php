<?php
require_once "../bdd/bdd.php";
require_once "../modele/Modele.php";

class ModeleRepository
{
    private $connexion;

    public function __construct()
    {
        $bdd = new bdd();
        $this->connexion = $bdd->getBdd();
    }

    /**
     * Récupère tous les modèles d'avion
     * @return array Tableau d'objets Modele
     */
    public function recupererTousModeles(): array
    {
        try {
            $query = "SELECT * FROM modele ORDER BY marque, modele";
            $stmt = $this->connexion->query($query);
            $modelesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $modeles = [];
            foreach ($modelesData as $modeleData) {
                $modeles[] = new Modele($modeleData);
            }

            return $modeles;
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (recupererTousModeles): " . $e->getMessage());
            return [];
        }
    }

    /**
     * Récupère un modèle par son ID
     * @param int $idModele
     * @return Modele|null
     */
    public function recupererModeleParId(int $idModele): ?Modele
    {
        try {
            $query = "SELECT * FROM modele WHERE id_modele = :id_modele";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute(['id_modele' => $idModele]);

            $modeleData = $stmt->fetch(PDO::FETCH_ASSOC);

            return $modeleData ? new Modele($modeleData) : null;
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (recupererModeleParId): " . $e->getMessage());
            return null;
        }
    }

    /**
     * Crée un nouveau modèle d'avion
     * @param string $modele
     * @param string $marque
     * @return int|false L'ID du nouveau modèle ou false en cas d'échec
     */
    public function creerModele(string $modele, string $marque)
    {
        try {
            $query = "INSERT INTO modele (modele, marque) VALUES (:modele, :marque)";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute([
                'modele' => $modele,
                'marque' => $marque
            ]);

            return $this->connexion->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (creerModele): " . $e->getMessage());
            return false;
        }
    }

    /**
     * Met à jour un modèle existant
     * @param int $idModele
     * @param string $modele
     * @param string $marque
     * @return bool
     */
    public function mettreAJourModele(int $idModele, string $modele, string $marque): bool
    {
        try {
            $query = "UPDATE modele SET modele = :modele, marque = :marque WHERE id_modele = :id_modele";
            $stmt = $this->connexion->prepare($query);
            return $stmt->execute([
                'id_modele' => $idModele,
                'modele' => $modele,
                'marque' => $marque
            ]);
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (mettreAJourModele): " . $e->getMessage());
            return false;
        }
    }

    /**
     * Supprime un modèle
     * @param int $idModele
     * @return bool
     */
    public function supprimerModele(int $idModele): bool
    {
        try {
            $query = "DELETE FROM modele WHERE id_modele = :id_modele";
            $stmt = $this->connexion->prepare($query);
            return $stmt->execute(['id_modele' => $idModele]);
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (supprimerModele): " . $e->getMessage());
            return false;
        }
    }

    /**
     * Vérifie si un modèle est utilisé par des avions
     * @param int $idModele
     * @return bool
     */
    public function estUtilise(int $idModele): bool
    {
        try {
            $query = "SELECT COUNT(*) FROM avion WHERE ref_modele = :id_modele";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute(['id_modele' => $idModele]);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Erreur dans ModeleRepository (estUtilise): " . $e->getMessage());
            return true; // Par sécurité, on considère qu'il est utilisé en cas d'erreur
        }
    }
}