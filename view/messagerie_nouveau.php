<?php
$title = "Nouveau message - Murder Party";
include_once('view/autres_pages/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-plus"></i> Nouveau message
                </h1>
                <a href="/messagerie" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à la messagerie
                </a>
            </div>
        </div>
    </div>

    <!-- Affichage des erreurs -->
    <?php if (!empty($erreurs)): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <h6><i class="fas fa-exclamation-triangle me-2"></i>Erreurs :</h6>
                <ul class="mb-0">
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= htmlspecialchars($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Message de succès -->
    <?php if (!empty($succes)): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                Votre message a été envoyé avec succès ! Les organisateurs vous répondront dans les plus brefs délais.
                <hr>
                <a href="/messagerie" class="btn btn-success">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à ma messagerie
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!$succes): ?>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-envelope me-2"></i>
                        Contacter les organisateurs
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/messagerie/nouveau">
                        <div class="mb-3">
                            <label for="sujet" class="form-label">
                                <i class="fas fa-tag me-2"></i>
                                Sujet du message *
                            </label>
                            <select class="form-select" id="sujet" name="sujet" required>
                                <option value="">Choisissez un sujet...</option>
                                <option value="Question générale" <?= ($_POST['sujet'] ?? '') === 'Question générale' ? 'selected' : '' ?>>Question générale</option>
                                <option value="Allergies alimentaires" <?= ($_POST['sujet'] ?? '') === 'Allergies alimentaires' ? 'selected' : '' ?>>Allergies alimentaires</option>
                                <option value="Transport et accès" <?= ($_POST['sujet'] ?? '') === 'Transport et accès' ? 'selected' : '' ?>>Transport et accès</option>
                                <option value="Costumes et accessoires" <?= ($_POST['sujet'] ?? '') === 'Costumes et accessoires' ? 'selected' : '' ?>>Costumes et accessoires</option>
                                <option value="Déroulement de la soirée" <?= ($_POST['sujet'] ?? '') === 'Déroulement de la soirée' ? 'selected' : '' ?>>Déroulement de la soirée</option>
                                <option value="Modification de réservation" <?= ($_POST['sujet'] ?? '') === 'Modification de réservation' ? 'selected' : '' ?>>Modification de réservation</option>
                                <option value="Problème technique" <?= ($_POST['sujet'] ?? '') === 'Problème technique' ? 'selected' : '' ?>>Problème technique</option>
                                <option value="Autre" <?= ($_POST['sujet'] ?? '') === 'Autre' ? 'selected' : '' ?>>Autre</option>
                            </select>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Sélectionnez le sujet qui correspond le mieux à votre demande.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="contenu" class="form-label">
                                <i class="fas fa-comment me-2"></i>
                                Votre message *
                            </label>
                            <textarea 
                                class="form-control" 
                                id="contenu" 
                                name="contenu" 
                                rows="8" 
                                placeholder="Décrivez votre question ou demande en détail..."
                                required><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Minimum 10 caractères. Soyez précis dans votre demande pour obtenir une réponse adaptée.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <i class="fas fa-clock me-2"></i>
                                    <strong>Délai de réponse :</strong> Les organisateurs répondent généralement sous 24-48h.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="/messagerie" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Conseils -->
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Conseils pour un message efficace
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>✅ À faire :</h6>
                            <ul class="small">
                                <li>Choisir le bon sujet</li>
                                <li>Être précis et détaillé</li>
                                <li>Mentionner les dates importantes</li>
                                <li>Indiquer vos contraintes spécifiques</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>❌ À éviter :</h6>
                            <ul class="small">
                                <li>Messages trop courts ou vagues</li>
                                <li>Plusieurs sujets dans un message</li>
                                <li>Informations personnelles sensibles</li>
                                <li>Demandes urgentes de dernière minute</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
// Auto-redimensionnement du textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('contenu');
    if (textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});
</script>

<?php include_once('view/autres_pages/footer.php'); ?> 