<?php
$title = "Détails utilisateur - Administration";
$admin_active = "utilisateurs";
include_once('header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-user"></i> Détails de l'utilisateur
                </h1>
                <a href="/gestion/utilisateurs" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>

    <!-- Informations personnelles -->
    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-id-card me-2"></i>
                        Informations personnelles
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar-lg bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 1.5rem;">
                            <?= strtoupper(substr($utilisateur['prenom'], 0, 1) . substr($utilisateur['nom'], 0, 1)) ?>
                        </div>
                        <h4 class="mt-3 mb-1">
                            <?= htmlspecialchars($utilisateur['prenom'] . ' ' . $utilisateur['nom']) ?>
                        </h4>
                        <span class="badge bg-success">Utilisateur actif</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Email</label>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            <a href="mailto:<?= htmlspecialchars($utilisateur['email']) ?>" class="text-decoration-none">
                                <?= htmlspecialchars($utilisateur['email']) ?>
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Téléphone</label>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone me-2 text-primary"></i>
                            <?php if (!empty($utilisateur['telephone'])): ?>
                                <a href="tel:<?= htmlspecialchars($utilisateur['telephone']) ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($utilisateur['telephone']) ?>
                                </a>
                            <?php else: ?>
                                <span class="text-muted">Non renseigné</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted small">Âge</label>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-birthday-cake me-2 text-primary"></i>
                            <?php if (!empty($utilisateur['age'])): ?>
                                <?= htmlspecialchars($utilisateur['age']) ?> ans
                            <?php else: ?>
                                <span class="text-muted">Non renseigné</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label text-muted small">Date d'inscription</label>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar me-2 text-primary"></i>
                            <?= date('d/m/Y à H:i', strtotime($utilisateur['date_inscription'])) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-comments fa-2x text-primary mb-2"></i>
                            <h4 class="text-primary"><?= count($commentaires_utilisateur) ?></h4>
                            <small>Commentaires</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-envelope fa-2x text-info mb-2"></i>
                            <h4 class="text-info"><?= count($messages_utilisateur) ?></h4>
                            <small>Messages envoyés</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                            <h4 class="text-warning">
                                <?= floor((time() - strtotime($utilisateur['date_inscription'])) / (60 * 60 * 24)) ?>
                            </h4>
                            <small>Jours depuis inscription</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-tools me-2"></i>
                        Actions rapides
                    </h6>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                        <a href="mailto:<?= htmlspecialchars($utilisateur['email']) ?>" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>
                            Envoyer un email
                        </a>
                        <?php if (!empty($utilisateur['telephone'])): ?>
                        <a href="tel:<?= htmlspecialchars($utilisateur['telephone']) ?>" class="btn btn-success">
                            <i class="fas fa-phone me-2"></i>
                            Appeler
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Onglets pour commentaires et messages -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="userTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="commentaires-tab" data-bs-toggle="tab" data-bs-target="#commentaires" type="button" role="tab">
                        <i class="fas fa-comments me-2"></i>
                        Commentaires (<?= count($commentaires_utilisateur) ?>)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab">
                        <i class="fas fa-envelope me-2"></i>
                        Messages (<?= count($messages_utilisateur) ?>)
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="userTabsContent">
                <!-- Onglet Commentaires -->
                <div class="tab-pane fade show active" id="commentaires" role="tabpanel">
                    <div class="card border-top-0">
                        <div class="card-body">
                            <?php if (empty($commentaires_utilisateur)): ?>
                            <div class="text-center py-4">
                                <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
                                <h6>Aucun commentaire</h6>
                                <p class="text-muted">Cet utilisateur n'a publié aucun commentaire.</p>
                            </div>
                            <?php else: ?>
                            <?php foreach ($commentaires_utilisateur as $commentaire): ?>
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
                                                Approuvé
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

                                    <?php if (!$commentaire['approuve']): ?>
                                    <div class="mt-2">
                                        <a href="/gestion/commentaire-approuver?id=<?= $commentaire['id'] ?>" 
                                           class="btn btn-success btn-sm me-2">
                                            <i class="fas fa-check me-1"></i>
                                            Approuver
                                        </a>
                                        <a href="/gestion/commentaire-rejeter?id=<?= $commentaire['id'] ?>" 
                                           class="btn btn-danger btn-sm">
                                            <i class="fas fa-times me-1"></i>
                                            Rejeter
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Onglet Messages -->
                <div class="tab-pane fade" id="messages" role="tabpanel">
                    <div class="card border-top-0">
                        <div class="card-body">
                            <?php if (empty($messages_utilisateur)): ?>
                            <div class="text-center py-4">
                                <i class="fas fa-envelope-open fa-3x text-muted mb-3"></i>
                                <h6>Aucun message</h6>
                                <p class="text-muted">Cet utilisateur n'a envoyé aucun message.</p>
                            </div>
                            <?php else: ?>
                            <?php foreach ($messages_utilisateur as $message): ?>
                            <div class="card mb-3 <?= $message['lu'] ? 'border-success' : 'border-info' ?>">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">
                                                <i class="fas fa-tag me-1"></i>
                                                <?= htmlspecialchars($message['sujet']) ?>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                                            </small>
                                        </div>
                                        <div>
                                            <?php if (!empty($message['reponse'])): ?>
                                                <span class="badge bg-success">
                                                    <i class="fas fa-reply me-1"></i>
                                                    Répondu
                                                </span>
                                            <?php elseif ($message['lu']): ?>
                                                <span class="badge bg-info">
                                                    <i class="fas fa-eye me-1"></i>
                                                    Lu
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-warning">
                                                    <i class="fas fa-envelope me-1"></i>
                                                    Non lu
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <p class="mb-2"><?= nl2br(htmlspecialchars($message['contenu'])) ?></p>
                                    
                                    <?php if (!empty($message['reponse'])): ?>
                                    <div class="alert alert-success mt-3">
                                        <h6><i class="fas fa-reply me-2"></i>Réponse :</h6>
                                        <p class="mb-0"><?= nl2br(htmlspecialchars($message['reponse'])) ?></p>
                                        <small class="text-muted">
                                            Répondu le <?= date('d/m/Y à H:i', strtotime($message['date_reponse'])) ?>
                                        </small>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mt-2">
                                        <a href="/gestion/message?id=<?= $message['id'] ?>" 
                                           class="btn btn-outline-primary btn-sm me-2">
                                            <i class="fas fa-eye me-1"></i>
                                            Voir détail
                                        </a>
                                        <?php if (empty($message['reponse'])): ?>
                                        <a href="/gestion/message-repondre?id=<?= $message['id'] ?>" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-reply me-1"></i>
                                            Répondre
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>

<style>
/* Correction du contraste des onglets */
.nav-tabs {
    border-bottom: 2px solid #dee2e6;
}

.nav-tabs .nav-link {
    color: #495057 !important;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-bottom: none;
    font-weight: 500;
    padding: 0.75rem 1.25rem;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link:hover {
    color: #0d6efd !important;
    background-color: #e9ecef;
    border-color: #dee2e6 #dee2e6 #f8f9fa;
    transform: translateY(-2px);
}

.nav-tabs .nav-link.active {
    color: #0d6efd !important;
    background-color: #ffffff;
    border-color: #dee2e6 #dee2e6 #ffffff;
    border-bottom: 2px solid #ffffff;
    font-weight: 600;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
}

.nav-tabs .nav-link i {
    color: inherit;
}

/* Amélioration du contenu des onglets */
.tab-content .card {
    border-top-left-radius: 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.tab-pane .card-body {
    padding: 2rem;
}

/* Badges dans les onglets */
.nav-tabs .nav-link .badge {
    margin-left: 0.5rem;
    font-size: 0.75em;
}
</style> 