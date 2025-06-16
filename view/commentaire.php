<?php
$title = "Mes commentaires - Murder Party";
include_once('view/autres_pages/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>
                <i class="fas fa-comments"></i> Mes commentaires
            </h1>
            <p class="text-muted">Partagez votre expérience et consultez vos commentaires précédents.</p>
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
    <?php if ($succes): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                Votre commentaire a été ajouté avec succès ! Il sera visible après validation par nos équipes.
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <!-- Formulaire d'ajout de commentaire -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-plus me-2"></i>
                        Ajouter un commentaire
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/commentaire">
                        <div class="mb-3">
                            <label for="contenu" class="form-label">
                                <i class="fas fa-comment me-2"></i>
                                Votre commentaire *
                            </label>
                            <textarea 
                                class="form-control" 
                                id="contenu" 
                                name="contenu" 
                                rows="6" 
                                placeholder="Partagez votre expérience, vos impressions sur l'événement Murder Party..."
                                required><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Entre 10 et 1000 caractères. Votre commentaire sera vérifié avant publication.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Modération active
                            </small>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>
                                Publier le commentaire
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informations sur la modération -->
            <div class="card mt-3 border-info">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        À propos des commentaires
                    </h6>
                </div>
                <div class="card-body">
                    <div class="small">
                        <p><strong>Modération :</strong> Tous les commentaires sont vérifiés avant publication pour maintenir un environnement respectueux.</p>
                        <p><strong>Délai :</strong> Comptez 24-48h pour la validation de votre commentaire.</p>
                        <p class="mb-0"><strong>Règles :</strong> Restez courtois, constructif et respectueux envers les autres participants.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des commentaires de l'utilisateur -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>
                        Mes commentaires (<?= count($mes_commentaires) ?>)
                    </h5>
                </div>
                <div class="card-body">
                    <?php if (empty($mes_commentaires)): ?>
                    <div class="text-center py-4">
                        <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
                        <h6>Aucun commentaire</h6>
                        <p class="text-muted small">Vous n'avez pas encore publié de commentaire.</p>
                    </div>
                    <?php else: ?>
                    <div class="timeline">
                        <?php foreach ($mes_commentaires as $commentaire): ?>
                        <div class="card mb-3 <?= $commentaire['approuve'] ? 'border-success' : 'border-warning' ?>">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?= date('d/m/Y à H:i', strtotime($commentaire['date_creation'])) ?>
                                    </small>
                                    <?php if ($commentaire['approuve']): ?>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>
                                            Publié
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock me-1"></i>
                                            En attente
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <p class="mb-2"><?= nl2br(htmlspecialchars($commentaire['contenu'])) ?></p>
                                
                                <?php if ($commentaire['approuve'] && $commentaire['date_approbation']): ?>
                                <small class="text-success">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Approuvé le <?= date('d/m/Y', strtotime($commentaire['date_approbation'])) ?>
                                </small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques rapides -->
    <?php if (!empty($mes_commentaires)): ?>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h4 class="text-primary"><?= count($mes_commentaires) ?></h4>
                            <small>Total commentaires</small>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-success">
                                <?= count(array_filter($mes_commentaires, function($c) { return $c['approuve']; })) ?>
                            </h4>
                            <small>Publiés</small>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-warning">
                                <?= count(array_filter($mes_commentaires, function($c) { return !$c['approuve']; })) ?>
                            </h4>
                            <small>En attente</small>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-info">
                                <?= !empty($mes_commentaires) ? date('d/m/Y', strtotime($mes_commentaires[0]['date_creation'])) : '-' ?>
                            </h4>
                            <small>Dernier commentaire</small>
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