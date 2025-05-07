<?php
require_once "../src/bdd/bdd.php";
require_once "../src/modele/Avion.php";
require_once "../src/repository/AvionRepository.php";
require_once "../src/repository/ModeleRepository.php";

session_start();
if (!isset($_SESSION['connexionAdmin'])) {
    header('location: ../index.php?parametre=fakeAdmin');
    exit();
}

// Récupérer la liste des modèles disponibles
$modeleRepository = new ModeleRepository();
$modeles = $modeleRepository->recupererTousModeles();

require_once 'PopUp.php';
if(isset($_GET['parametre'])) {
    $messages = [
        "ajoutReussi" => "L'avion a été ajouté avec succès",
        "suppressionReussie" => "Suppression réussie",
        "erreur" => "Une erreur est survenue lors de l'ajout"
    ];

    if(array_key_exists($_GET['parametre'], $messages)) {
        $pop = new PopUp();
        $pop->showPopup($messages[$_GET['parametre']]);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajout d'un nouvel avion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="indexADMIN.php">Index Admin</a>
        <div class="navbar-nav">
            <a class="nav-link" href="listeAvions.php">Avions</a>
            <a class="nav-link" href="listeUtilisateurs.php">Utilisateurs</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="form-container">
        <h1 class="text-center mb-4">Ajout d'un nouvel avion</h1>

        <form action="../src/traitement/ajoutAvion.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'avion</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="ref_modele" class="form-label">Modèle d'avion</label>
                <select class="form-select" id="ref_modele" name="ref_modele" required>
                    <option value="">Sélectionnez un modèle</option>
                    <?php foreach ($modeles as $modele): ?>
                        <!-- Ici on utilise les méthodes getter de l'objet Modele -->
                        <option value="<?= htmlspecialchars($modele->getIdModele()) ?>">
                            <?= htmlspecialchars($modele->getMarque() . ' ' . $modele->getModele()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Ajouter l'avion</button>
                <a href="listeAvions.php" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>