<?php
$title = "Gestion de la messagerie - Administration";
$admin_active = "messages";
include_once('header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-envelope"></i> Gestion de la messagerie
                </h1>
                <div class="badge bg-info fs-6">
                    <?= count(array_filter($messages, function($m) { return !$m['lu']; })) ?> 
                    message(s) non lu(s)
                </div>
            </div>
            
            <!-- Messages de feedback -->
            <?php if (isset($_GET['success'])): ?>
                <?php if ($_GET['success'] === 'deleted'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Succès !</strong> Le message a été supprimé avec succès.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if (isset($_GET['error'])): ?>
                <?php if ($_GET['error'] === 'delete_failed'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Erreur !</strong> Impossible de supprimer le message. Veuillez réessayer.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if (empty($messages)): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Aucun message reçu pour le moment.
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
                            Tous (<?= count($messages) ?>)
                        </label>
                        
                        <input type="radio" class="btn-check" name="filtre" id="non_lus" value="non_lus">
                        <label class="btn btn-outline-info" for="non_lus">
                            <i class="fas fa-envelope me-1"></i>
                            Non lus (<?= count(array_filter($messages, function($m) { return !$m['lu']; })) ?>)
                        </label>
                        
                        <input type="radio" class="btn-check" name="filtre" id="lus" value="lus">
                        <label class="btn btn-outline-success" for="lus">
                            <i class="fas fa-envelope-open me-1"></i>
                            Lus (<?= count(array_filter($messages, function($m) { return $m['lu']; })) ?>)
                        </label>
                        
                        <input type="radio" class="btn-check" name="filtre" id="avec_reponse" value="avec_reponse">
                        <label class="btn btn-outline-primary" for="avec_reponse">
                            <i class="fas fa-reply me-1"></i>
                            Avec réponse (<?= count(array_filter($messages, function($m) { return !empty($m['reponse']); })) ?>)
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des messages -->
    <div class="row">
        <div class="col-12">
            <?php foreach ($messages as $message): ?>
            <div class="card mb-3 message-item <?= !$message['lu'] ? 'border-info' : '' ?>" 
                 data-statut="<?= $message['lu'] ? 'lu' : 'non_lu' ?>"
                 data-reponse="<?= !empty($message['reponse']) ? 'avec_reponse' : 'sans_reponse' ?>">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm <?= !$message['lu'] ? 'bg-info' : 'bg-secondary' ?> text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <?= strtoupper(substr($message['prenom'], 0, 1) . substr($message['nom'], 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="mb-0 <?= !$message['lu'] ? 'fw-bold' : '' ?>">
                                <?= htmlspecialchars($message['prenom'] . ' ' . $message['nom']) ?>
                            </h6>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                                |
                                <i class="fas fa-envelope me-1"></i>
                                <?= htmlspecialchars($message['email']) ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <?php if (!$message['lu']): ?>
                            <span class="badge bg-info mb-1">
                                <i class="fas fa-envelope me-1"></i>
                                Non lu
                            </span>
                        <?php else: ?>
                            <span class="badge bg-success mb-1">
                                <i class="fas fa-envelope-open me-1"></i>
                                Lu
                            </span>
                        <?php endif; ?>
                        
                        <?php if (!empty($message['reponse'])): ?>
                            <br>
                            <span class="badge bg-primary">
                                <i class="fas fa-reply me-1"></i>
                                Répondu
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="card-body">
                    <h6 class="card-title <?= !$message['lu'] ? 'fw-bold' : '' ?>">
                        <?= htmlspecialchars($message['sujet']) ?>
                    </h6>
                    
                    <p class="card-text">
                        <?= nl2br(htmlspecialchars(substr($message['contenu'], 0, 200))) ?>
                        <?php if (strlen($message['contenu']) > 200): ?>
                            <span class="text-muted">... (message tronqué)</span>
                        <?php endif; ?>
                    </p>
                    
                    <?php if (!empty($message['reponse'])): ?>
                    <div class="alert alert-light border-start border-primary border-3 mt-3">
                        <h6 class="alert-heading">
                            <i class="fas fa-reply me-2"></i>
                            Votre réponse
                            <small class="text-muted">
                                (<?= date('d/m/Y à H:i', strtotime($message['date_reponse'])) ?>)
                            </small>
                        </h6>
                        <p class="mb-0">
                            <?= nl2br(htmlspecialchars($message['reponse'])) ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted small">
                            Message #<?= $message['id'] ?>
                        </div>
                        
                        <div class="btn-group">
                            <a href="/admin/message?id=<?= $message['id'] ?>" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i>
                                Voir
                            </a>
                            
                            <?php if (empty($message['reponse'])): ?>
                                <a href="/admin/message-repondre?id=<?= $message['id'] ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-reply me-1"></i>
                                    Répondre
                                </a>
                            <?php endif; ?>
                            
                            <a href="mailto:<?= htmlspecialchars($message['email']) ?>?subject=Re: <?= urlencode($message['sujet']) ?>" 
                               class="btn btn-outline-info btn-sm">
                                <i class="fas fa-external-link-alt me-1"></i>
                                Email
                            </a>
                            
                            <a href="/admin/message-supprimer?id=<?= $message['id'] ?>" 
                               class="btn btn-outline-danger btn-sm"
                               data-confirm="Supprimer définitivement ce message ?">
                                <i class="fas fa-trash me-1"></i>
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-primary"><?= count($messages) ?></h4>
                    <small>Total messages</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-info">
                        <?= count(array_filter($messages, function($m) { return !$m['lu']; })) ?>
                    </h4>
                    <small>Non lus</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-success">
                        <?= count(array_filter($messages, function($m) { return $m['lu']; })) ?>
                    </h4>
                    <small>Lus</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-primary">
                        <?= count(array_filter($messages, function($m) { return !empty($m['reponse']); })) ?>
                    </h4>
                    <small>Avec réponse</small>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
.message-item.d-none {
    display: none !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des filtres
    const filtres = document.querySelectorAll('input[name="filtre"]');
    const messages = document.querySelectorAll('.message-item');
    
    filtres.forEach(filtre => {
        filtre.addEventListener('change', function() {
            const valeur = this.value;
            
            messages.forEach(message => {
                const statut = message.getAttribute('data-statut');
                const reponse = message.getAttribute('data-reponse');
                
                let afficher = false;
                
                switch(valeur) {
                    case 'tous':
                        afficher = true;
                        break;
                    case 'non_lus':
                        afficher = (statut === 'non_lu');
                        break;
                    case 'lus':
                        afficher = (statut === 'lu');
                        break;
                    case 'avec_reponse':
                        afficher = (reponse === 'avec_reponse');
                        break;
                }
                
                if (afficher) {
                    message.classList.remove('d-none');
                } else {
                    message.classList.add('d-none');
                }
            });
        });
    });
    
    // Gestion de la confirmation de suppression
    const liensSupprimer = document.querySelectorAll('a[data-confirm]');
    liensSupprimer.forEach(lien => {
        lien.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm');
            if (!confirm(message)) {
                e.preventDefault();
                return false;
            }
        });
    });
});
</script>

<?php include_once('footer.php'); ?> 
