<?php
$title = "Tableau de bord - Administration";
$admin_active = "dashboard";
include_once('header.php');
?>

<style>
    .stats-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--card-gradient);
    }

    .stats-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .stats-card.primary::before {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .stats-card.warning::before {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stats-card.info::before {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stats-card.success::before {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }

    .stats-icon.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .stats-icon.warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stats-icon.info {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stats-icon.success {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        line-height: 1;
    }

    .stats-label {
        color: #718096;
        font-weight: 500;
        font-size: 0.9rem;
        margin: 0;
    }

    .action-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .action-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .action-btn {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #4a5568;
        display: block;
        position: relative;
        overflow: hidden;
    }

    .action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.5s;
    }

    .action-btn:hover::before {
        left: 100%;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        border-color: #cbd5e0;
        color: #2d3748;
        text-decoration: none;
    }

    .action-btn.primary:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
    }

    .action-btn.warning:hover {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border-color: #f093fb;
    }

    .action-btn.info:hover {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        border-color: #4facfe;
    }

    .action-btn.success:hover {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
        border-color: #43e97b;
    }

    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        color: white;
        border: none;
        overflow: hidden;
        position: relative;
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .comment-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        border-left: 4px solid #f093fb;
    }

    .comment-card:hover {
        transform: translateX(4px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }

    .pulse-badge {
        animation: pulse-glow 2s infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 5px rgba(245, 87, 108, 0.5); }
        50% { box-shadow: 0 0 20px rgba(245, 87, 108, 0.8); }
    }
</style>

<div class="container-fluid">
    <!-- En-tête de bienvenue -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card welcome-card">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="mb-2 fw-bold">
                                <i class="fas fa-chart-line me-3"></i>
                                Tableau de bord
                            </h1>
                            <p class="mb-0 opacity-90">
                                Bienvenue, <?= htmlspecialchars($_SESSION['prenom'] ?? 'Admin') ?> ! 
                                Voici un aperçu de l'activité de votre Murder Party.
                            </p>
                        </div>
                        <div class="col-md-4 text-end d-none d-md-block">
                            <i class="fas fa-skull-crossbones" style="font-size: 4rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques principales -->
    <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card primary">
                <div class="card-body p-4">
                    <div class="stats-icon primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <h2 class="stats-number"><?= htmlspecialchars($stats['total_utilisateurs']) ?></h2>
                    <p class="stats-label">Utilisateurs inscrits</p>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>
                            +12% ce mois
                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card warning">
                <div class="card-body p-4">
                    <div class="stats-icon warning">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h2 class="stats-number"><?= htmlspecialchars($stats['commentaires_en_attente']) ?></h2>
                    <p class="stats-label">Commentaires en attente</p>
                    <div class="mt-3">
                        <?php if ($stats['commentaires_en_attente'] > 0): ?>
                            <small class="text-warning">
                                <i class="fas fa-clock me-1"></i>
                                Action requise
                            </small>
                        <?php else: ?>
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>
                                Tout est à jour
                            </small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card info">
                <div class="card-body p-4">
                    <div class="stats-icon info">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h2 class="stats-number"><?= htmlspecialchars($stats['messages_non_lus']) ?></h2>
                    <p class="stats-label">Messages non lus</p>
                    <div class="mt-3">
                        <?php if ($stats['messages_non_lus'] > 0): ?>
                            <small class="text-info">
                                <i class="fas fa-bell me-1"></i>
                                Nouveaux messages
                            </small>
                        <?php else: ?>
                            <small class="text-success">
                                <i class="fas fa-check me-1"></i>
                                Boîte vide
                            </small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-card success">
                <div class="card-body p-4">
                    <div class="stats-icon success">
                        <i class="fas fa-server"></i>
                    </div>
                    <h2 class="stats-number">100%</h2>
                    <p class="stats-label">Disponibilité</p>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="fas fa-check-circle me-1"></i>
                            Système opérationnel
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card action-card">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-bolt me-2 text-primary"></i>
                        Actions rapides
                    </h4>
                    <p class="text-muted mb-0">Accédez rapidement aux fonctionnalités principales</p>
                </div>
                <div class="card-body pt-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="/gestion/utilisateurs" class="action-btn primary">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold">Utilisateurs</h6>
                                        <small class="opacity-75">Gérer les comptes</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="/gestion/commentaires" class="action-btn warning">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-comments fa-2x"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">Commentaires</h6>
                                        <small class="opacity-75">Modération</small>
                                        <?php if ($stats['commentaires_en_attente'] > 0): ?>
                                            <span class="badge bg-warning pulse-badge ms-2"><?= $stats['commentaires_en_attente'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="/gestion/messages" class="action-btn info">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">Messages</h6>
                                        <small class="opacity-75">Messagerie</small>
                                        <?php if ($stats['messages_non_lus'] > 0): ?>
                                            <span class="badge bg-info pulse-badge ms-2"><?= $stats['messages_non_lus'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="/" class="action-btn success" target="_blank">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-external-link-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold">Site public</h6>
                                        <small class="opacity-75">Voir le site</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Commentaires récents en attente -->
    <?php if (!empty($commentaires_en_attente)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card action-card">
                <div class="card-header bg-transparent border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-clock me-2 text-warning"></i>
                                Commentaires en attente
                            </h4>
                            <p class="text-muted mb-0">Modération requise pour ces commentaires</p>
                        </div>
                        <span class="badge bg-warning pulse-badge"><?= count($commentaires_en_attente) ?></span>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <?php foreach (array_slice($commentaires_en_attente, 0, 3) as $index => $commentaire): ?>
                    <div class="comment-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <?= strtoupper(substr($commentaire['prenom'], 0, 1) . substr($commentaire['nom'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">
                                            <?= htmlspecialchars($commentaire['prenom'] . ' ' . $commentaire['nom']) ?>
                                        </h6>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            <?= date('d/m/Y à H:i', strtotime($commentaire['date_creation'])) ?>
                                        </small>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">
                                    <?= htmlspecialchars(substr($commentaire['contenu'], 0, 150)) ?>
                                    <?php if (strlen($commentaire['contenu']) > 150): ?>...<?php endif; ?>
                                </p>
                            </div>
                            <div class="ms-3">
                                <div class="btn-group">
                                    <a href="/gestion/commentaires/approuver/<?= $commentaire['id'] ?>" 
                                       class="btn btn-success btn-sm"
                                       data-bs-toggle="tooltip"
                                       title="Approuver ce commentaire"
                                       data-confirm="Approuver ce commentaire ?">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="/gestion/commentaires/rejeter/<?= $commentaire['id'] ?>" 
                                       class="btn btn-danger btn-sm"
                                       data-bs-toggle="tooltip"
                                       title="Rejeter ce commentaire"
                                       data-confirm="Rejeter ce commentaire ?">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <?php if (count($commentaires_en_attente) > 3): ?>
                    <div class="text-center pt-3">
                        <a href="/gestion/commentaires" class="btn btn-primary btn-lg">
                            <i class="fas fa-eye me-2"></i>
                            Voir tous les commentaires (<?= count($commentaires_en_attente) ?>)
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-12">
            <div class="card action-card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                    <h4 class="fw-bold">Excellent travail !</h4>
                    <p class="text-muted">Aucun commentaire en attente de modération.</p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include_once('footer.php'); ?> 