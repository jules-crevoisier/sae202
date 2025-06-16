<?php
$title = "Gestion des utilisateurs - Administration";
$admin_active = "utilisateurs";
include_once('view/admin/header.php');
?>

<style>
    .user-table {
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: none;
        overflow: hidden;
    }

    .table-modern {
        margin: 0;
    }

    .table-modern thead th {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border: none;
        font-weight: 600;
        color: #4a5568;
        padding: 1.25rem 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        border: none;
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover {
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        transform: scale(1.01);
    }

    .table-modern tbody td {
        border: none;
        padding: 1.25rem 1rem;
        vertical-align: middle;
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-badge.admin {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(245, 87, 108, 0.3);
    }

    .status-badge.user {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(67, 233, 123, 0.3);
    }

    .action-btn-group {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .action-btn.email {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .action-btn.view {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        color: white;
        text-decoration: none;
    }

    .stats-mini-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stats-mini-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }

    .stats-mini-card.primary::before {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .stats-mini-card.danger::before {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stats-mini-card.success::before {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .stats-mini-card.info::before {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stats-mini-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .page-header {
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border: none;
        margin-bottom: 2rem;
    }

    .user-count-badge {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        animation: pulse-soft 2s infinite;
    }

    @keyframes pulse-soft {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
</style>

<div class="container-fluid">
    <!-- En-tête de page -->
    <div class="page-header">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-2 fw-bold">
                        <i class="fas fa-users me-3 text-primary"></i>
                        Gestion des utilisateurs
                    </h1>
                    <p class="text-muted mb-0">Gérez les comptes utilisateurs et leurs informations</p>
                </div>
                <div class="user-count-badge">
                    <?= count($utilisateurs) ?> utilisateur(s) inscrit(s)
                </div>
            </div>
        </div>
    </div>

    <?php if (empty($utilisateurs)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card user-table">
                <div class="card-body text-center py-5">
                    <i class="fas fa-users-slash fa-4x text-muted mb-3"></i>
                    <h4 class="fw-bold">Aucun utilisateur</h4>
                    <p class="text-muted">Aucun utilisateur inscrit pour le moment.</p>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    
    <!-- Tableau des utilisateurs -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card user-table">
                <div class="card-header bg-transparent border-0 p-4">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-list me-2 text-primary"></i>
                        Liste des utilisateurs
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Contact</th>
                                    <th>Informations</th>
                                    <th>Inscription</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($utilisateurs as $utilisateur): ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary"><?= htmlspecialchars($utilisateur['id']) ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                <?= strtoupper(substr($utilisateur['prenom'], 0, 1) . substr($utilisateur['nom'], 0, 1)) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">
                                                    <?= htmlspecialchars($utilisateur['prenom'] . ' ' . $utilisateur['nom']) ?>
                                                </h6>
                                                <small class="text-muted">
                                                    <?= htmlspecialchars($utilisateur['email']) ?>
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <?php if (!empty($utilisateur['telephone'])): ?>
                                                <div class="mb-1">
                                                    <i class="fas fa-phone me-2 text-success"></i>
                                                    <a href="tel:<?= htmlspecialchars($utilisateur['telephone']) ?>" class="text-decoration-none">
                                                        <?= htmlspecialchars($utilisateur['telephone']) ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <i class="fas fa-envelope me-2 text-primary"></i>
                                                <a href="mailto:<?= htmlspecialchars($utilisateur['email']) ?>" class="text-decoration-none">
                                                    Email
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <?php if (!empty($utilisateur['age'])): ?>
                                                <div class="mb-1">
                                                    <i class="fas fa-birthday-cake me-2 text-info"></i>
                                                    <?= htmlspecialchars($utilisateur['age']) ?> ans
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <i class="fas fa-calendar me-2 text-muted"></i>
                                                <small class="text-muted">
                                                    Membre depuis <?= floor((time() - strtotime($utilisateur['date_inscription'])) / (60 * 60 * 24)) ?> jours
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?= date('d/m/Y', strtotime($utilisateur['date_inscription'])) ?></strong>
                                            <br>
                                            <small class="text-success">
                                                <?= date('H:i', strtotime($utilisateur['date_inscription'])) ?>
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($utilisateur['is_admin'] ?? false): ?>
                                            <span class="status-badge admin">
                                                <i class="fas fa-crown"></i>
                                                Administrateur
                                            </span>
                                        <?php else: ?>
                                            <span class="status-badge user">
                                                <i class="fas fa-user"></i>
                                                Utilisateur
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="action-btn-group">
                                            <a href="mailto:<?= htmlspecialchars($utilisateur['email']) ?>" 
                                               class="action-btn email" 
                                               data-bs-toggle="tooltip"
                                               title="Envoyer un email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <?php if (!($utilisateur['is_admin'] ?? false)): ?>
                                            <a href="/gestion/utilisateurs/detail/<?= $utilisateur['id'] ?>" 
                                               class="action-btn view" 
                                               data-bs-toggle="tooltip"
                                               title="Voir les détails">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques détaillées -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-mini-card primary">
                <div class="card-body text-center p-4">
                    <i class="fas fa-users fa-2x text-primary mb-3"></i>
                    <h3 class="fw-bold text-primary">
                        <?= count(array_filter($utilisateurs, function($u) { return !($u['is_admin'] ?? false); })) ?>
                    </h3>
                    <p class="text-muted mb-0">Utilisateurs normaux</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-mini-card danger">
                <div class="card-body text-center p-4">
                    <i class="fas fa-crown fa-2x text-danger mb-3"></i>
                    <h3 class="fw-bold text-danger">
                        <?= count(array_filter($utilisateurs, function($u) { return $u['is_admin'] ?? false; })) ?>
                    </h3>
                    <p class="text-muted mb-0">Administrateurs</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-mini-card success">
                <div class="card-body text-center p-4">
                    <i class="fas fa-phone fa-2x text-success mb-3"></i>
                    <h3 class="fw-bold text-success">
                        <?= count(array_filter($utilisateurs, function($u) { return !empty($u['telephone']); })) ?>
                    </h3>
                    <p class="text-muted mb-0">Avec téléphone</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stats-mini-card info">
                <div class="card-body text-center p-4">
                    <i class="fas fa-calendar-plus fa-2x text-info mb-3"></i>
                    <h3 class="fw-bold text-info">
                        <?= count(array_filter($utilisateurs, function($u) { return strtotime($u['date_inscription']) > strtotime('-7 days'); })) ?>
                    </h3>
                    <p class="text-muted mb-0">Cette semaine</p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- Modal pour les détails utilisateur -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="userModalBody">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<?php include_once('view/admin/footer.php'); ?> 