<?php
$title = "Détail du message - Administration";
$admin_active = "messages";
include_once('header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-envelope"></i> Détail du message
                </h1>
                <a href="/gestion/messages" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>

    <?php if (empty($message)): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Message introuvable.
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-lg bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <?= strtoupper(substr($message['prenom'], 0, 1) . substr($message['nom'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <h5 class="mb-0">
                                            <?= htmlspecialchars($message['prenom'] . ' ' . $message['nom']) ?>
                                        </h5>
                                        <div class="text-muted">
                                            <i class="fas fa-envelope me-2"></i>
                                            <a href="mailto:<?= htmlspecialchars($message['email']) ?>" class="text-decoration-none">
                                                <?= htmlspecialchars($message['email']) ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="mb-2">
                                    <?php if (!$message['lu']): ?>
                                        <span class="badge bg-info">
                                            <i class="fas fa-envelope me-1"></i>
                                            Non lu
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-success">
                                            <i class="fas fa-envelope-open me-1"></i>
                                            Lu
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($message['reponse'])): ?>
                                        <span class="badge bg-primary">
                                            <i class="fas fa-reply me-1"></i>
                                            Répondu
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sujet :</label>
                            <h4 class="text-primary"><?= htmlspecialchars($message['sujet']) ?></h4>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Message :</label>
                            <div class="bg-light p-3 rounded">
                                <?= nl2br(htmlspecialchars($message['contenu'])) ?>
                            </div>
                        </div>
                        
                        <?php if (!empty($message['reponse'])): ?>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Votre réponse :</label>
                            <div class="alert alert-primary border-start border-primary border-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">
                                        <i class="fas fa-reply me-2"></i>
                                        Réponse envoyée
                                    </h6>
                                    <small class="text-muted">
                                        <?= date('d/m/Y à H:i', strtotime($message['date_reponse'])) ?>
                                    </small>
                                </div>
                                <div>
                                    <?= nl2br(htmlspecialchars($message['reponse'])) ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                <small>Message #<?= $message['id'] ?></small>
                            </div>
                            
                            <div class="btn-group">
                                <?php if (empty($message['reponse'])): ?>
                                    <a href="/gestion/message-repondre?id=<?= $message['id'] ?>" 
                                       class="btn btn-primary">
                                        <i class="fas fa-reply me-2"></i>
                                        Répondre
                                    </a>
                                <?php endif; ?>
                                
                                <a href="mailto:<?= htmlspecialchars($message['email']) ?>?subject=Re: <?= urlencode($message['sujet']) ?>&body=<?= urlencode("Bonjour " . $message['prenom'] . ",\n\nSuite à votre message du " . date('d/m/Y', strtotime($message['date_creation'])) . ":\n\n" . $message['contenu'] . "\n\n---\n\n") ?>" 
                                   class="btn btn-outline-info">
                                    <i class="fas fa-external-link-alt me-2"></i>
                                    Répondre par email
                                </a>
                                
                                <a href="/gestion/message-supprimer?id=<?= $message['id'] ?>" 
                                   class="btn btn-outline-danger"
                                   data-confirm="Supprimer définitivement ce message ?">
                                    <i class="fas fa-trash me-2"></i>
                                    Supprimer
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include_once('footer.php'); ?> 