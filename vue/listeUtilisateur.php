<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .role-admin { background-color: #ffcccc; }
        .role-pilote { background-color: #ccffcc; }
        .role-user { background-color: #f0f0f0; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="indexADMIN.php">Index Admin</a>
        <div class="navbar-nav">
            <a class="nav-link" href="listeAvions.php">Avions</a>
            <a class="nav-link active" href="listeUtilisateurs.php">Utilisateurs</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <?php
    require_once "../src/bdd/bdd.php";
    require_once "../src/modele/Utilisateur.php";
    require_once "../src/repository/UtilisateurRepository.php";

    session_start();
    if (!isset($_SESSION['connexionAdmin'])) {
        header('location: ../index.php?parametre=fakeAdmin');
        exit();
    }

    require_once 'PopUp.php';
    if(isset($_GET['parametre'])) {
        $messages = [
            "modificationReussie" => "Modification du rôle réussie",
            "suppressionReussie" => "Suppression de l'utilisateur réussie",
            "erreur" => "Une erreur est survenue"
        ];

        if(array_key_exists($_GET['parametre'], $messages)) {
            $pop = new PopUp();
            $pop->showPopup($messages[$_GET['parametre']]);
        }
    }

    $userRepository = new UtilisateurRepository();
    $listeUsers = $userRepository->listeUser();
    ?>

    <h1 class="text-center mb-4">Gestion des Utilisateurs</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Ville</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listeUsers as $user): ?>
                <tr class="role-<?= strtolower($user->getRole() ?? 'user') ?>">
                    <td><?= htmlspecialchars($user->getIdUtilisateur() ?? '') ?></td>
                    <td><?= htmlspecialchars($user->getNom() ?? '') ?></td>
                    <td><?= htmlspecialchars($user->getPrenom() ?? '') ?></td>
                    <td><?= htmlspecialchars($user->getEmail() ?? '') ?></td>
                    <td><?= htmlspecialchars($user->getRole() ?? 'user') ?></td>
                    <td><?= htmlspecialchars($user->getVille() ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h2>Modifier un utilisateur</h2>
        <form action="../src/traitement/gestionUtilisateur.php" method="post" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="idUtilisateur" class="form-label">Sélectionner un utilisateur :</label>
                    <select name="idUtilisateur" id="idUtilisateur" class="form-select" required>
                        <?php foreach ($listeUsers as $user): ?>
                            <option value="<?= $user->getIdUtilisateur() ?>">
                                <?= htmlspecialchars(
                                    trim($user->getNom() . ' ' . $user->getPrenom()) .
                                    ' (' . ($user->getEmail() ?? '') . ')'
                                ) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Actions :</label>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" name="action" value="promouvoir_admin" class="btn btn-warning">Promouvoir Admin</button>
                        <button type="submit" name="action" value="promouvoir_pilote" class="btn btn-success">Promouvoir Pilote</button>
                        <button type="submit" name="action" value="declasser_user" class="btn btn-secondary">Déclasser User</button>
                        <button type="submit" name="action" value="supprimer" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="alert alert-info">
            <strong>Légende :</strong>
            <span class="badge bg-warning">Admin</span>
            <span class="badge bg-success">Pilote</span>
            <span class="badge bg-secondary">User</span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>