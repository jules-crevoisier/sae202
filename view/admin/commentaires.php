<?php
$title = "Modération des commentaires - Administration";
$admin_active = "commentaires";
include_once('view/admin/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-comments"></i> Modération des commentaires
                </h1>
                <div class="badge bg-warning fs-6">
                    <?= count(array_filter($commentaires, function($c) { return !$c['approuve']; })) ?> 
                    commentaire(s) en attente
                </div>
            </div>
        </div>
    </div>

    <?php if (empty($commentaires)): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Aucun commentaire soumis pour le moment.
            </div>
        </div>
    </div>
    <?php else: ?>
    
    <!-- Filtres -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="filtre" id="tous" value="tous" checked>
                        <label class="btn btn-outline-secondary" for="tous">
                            <i class="fas fa-list me-1"></i>
                            Tous (<?= count($commentaires) ?>)
                        </label>
                        
                        <input type="radio" class="btn-check" name="filtre" id="attente" value="attente">
                        <label class="btn btn-outline-warning" for="attente">
                            <i class="fas fa-clock me-1"></i>
                            En attente (<?= count(array_filter($commentaires, function($c) { return !$c['approuve']; })) ?>)
                        </label>
                        
                        <input type="radio" class="btn-check" name="filtre" id="approuves" value="approuves">
                        <label class="btn btn-outline-success" for="approuves">
                            <i class="fas fa-check me-1"></i>
                            Approuvés (<?= count(array_filter($commentaires, function($c) { return $c['approuve']; })) ?>)
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des commentaires -->
    <div class="row">
        <div class="col-12">
            <?php foreach ($commentaires as $commentaire): ?>
            <div class="card mb-3 commentaire-item" 
                 data-statut="<?= $commentaire['approuve'] ? 'approuve' : 'attente' ?>">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <?= strtoupper(substr($commentaire['prenom'], 0, 1) . substr($commentaire['nom'], 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="mb-0">
                                <?= htmlspecialchars($commentaire['prenom'] . ' ' . $commentaire['nom']) ?>
                            </h6>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <?= date('d/m/Y à H:i', strtotime($commentaire['date_creation'])) ?>
                            </small>
                        </div>
                    </div>
                    
                    <div>
                        <?php if ($commentaire['approuve']): ?>
                            <span class="badge bg-success">
                                <i class="fas fa-check me-1"></i>
                                Approuvé
                            </span>
                            <?php if ($commentaire['date_approbation']): ?>
                                <br>
                                <small class="text-muted">
                                    le <?= date('d/m/Y à H:i', strtotime($commentaire['date_approbation'])) ?>
                                </small>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="badge bg-warning">
                                <i class="fas fa-clock me-1"></i>
                                En attente
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="card-body">
                    <p class="mb-3">
                        <?= nl2br(htmlspecialchars($commentaire['contenu'])) ?>
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            <i class="fas fa-envelope me-1"></i>
                            <a href="mailto:<?= htmlspecialchars($commentaire['email'] ?? '') ?>" class="text-decoration-none">
                                <?= htmlspecialchars($commentaire['email'] ?? 'Email non disponible') ?>
                            </a>
                        </div>
                        
                        <div class="btn-group">
                            <?php if (!$commentaire['approuve']): ?>
                                <a href="/gestion/commentaires/approuver/<?= $commentaire['id'] ?>" 
                                   class="btn btn-success btn-sm"
                                   data-confirm="Approuver ce commentaire ? Il sera visible sur le site public.">
                                    <i class="fas fa-check me-1"></i>
                                    Approuver
                                </a>
                                <a href="/gestion/commentaires/rejeter/<?= $commentaire['id'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   data-confirm="Rejeter définitivement ce commentaire ?">
                                    <i class="fas fa-times me-1"></i>
                                    Rejeter
                                </a>
                            <?php else: ?>
                                <a href="/gestion/commentaires/rejeter/<?= $commentaire['id'] ?>" 
                                   class="btn btn-outline-danger btn-sm"
                                   data-confirm="Retirer ce commentaire du site public ?">
                                    <i class="fas fa-eye-slash me-1"></i>
                                    Masquer
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-primary"><?= count($commentaires) ?></h4>
                    <small>Total commentaires</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-success">
                        <?= count(array_filter($commentaires, function($c) { return $c['approuve']; })) ?>
                    </h4>
                    <small>Approuvés</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-warning">
                        <?= count(array_filter($commentaires, function($c) { return !$c['approuve']; })) ?>
                    </h4>
                    <small>En attente</small>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
.commentaire-item.d-none {
    display: none !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des filtres
    const filtres = document.querySelectorAll('input[name="filtre"]');
    const commentaires = document.querySelectorAll('.commentaire-item');
    
    filtres.forEach(filtre => {
        filtre.addEventListener('change', function() {
            const valeur = this.value;
            
            commentaires.forEach(commentaire => {
                const statut = commentaire.getAttribute('data-statut');
                
                if (valeur === 'tous') {
                    commentaire.classList.remove('d-none');
                } else if (valeur === 'attente' && statut === 'attente') {
                    commentaire.classList.remove('d-none');
                } else if (valeur === 'approuves' && statut === 'approuve') {
                    commentaire.classList.remove('d-none');
                } else {
                    commentaire.classList.add('d-none');
                }
            });
        });
    });
});
</script>

<?php include_once('view/admin/footer.php'); ?> 