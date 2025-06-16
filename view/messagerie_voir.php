<?php
$title = "Message - Murder Party";
include_once('view/autres_pages/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-envelope"></i> Détail du message
                </h1>
                <a href="/messagerie" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à la messagerie
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
        <div class="col-lg-8 mx-auto">
            <!-- Message original -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-0">
                                <i class="fas fa-tag me-2"></i>
                                <?= htmlspecialchars($message['sujet']) ?>
                            </h5>
                        </div>
                        <div class="col-md-4 text-end">
                            <?php if (!empty($message['reponse'])): ?>
                                <span class="badge bg-success">
                                    <i class="fas fa-reply me-1"></i>
                                    Répondu
                                </span>
                            <?php else: ?>
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>
                                    En attente
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>
                            Envoyé le <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                        </small>
                    </div>
                    
                    <div class="mb-4">
                        <h6>Votre message :</h6>
                        <div class="bg-light p-3 rounded">
                            <?= nl2br(htmlspecialchars($message['contenu'])) ?>
                        </div>
                    </div>

                    <?php if (!empty($message['reponse'])): ?>
                    <div class="alert alert-success border-start border-success border-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">
                                <i class="fas fa-reply me-2"></i>
                                Réponse des organisateurs
                            </h6>
                            <small class="text-muted">
                                <?= date('d/m/Y à H:i', strtotime($message['date_reponse'])) ?>
                            </small>
                        </div>
                        <div>
                            <?= nl2br(htmlspecialchars($message['reponse'])) ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-clock me-2"></i>
                        <strong>En attente de réponse</strong><br>
                        Les organisateurs répondent généralement sous 24-48h. Vous serez notifié dès qu'une réponse sera disponible.
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted">
                            <small>Message #<?= $message['id'] ?></small>
                        </div>
                        <div class="btn-group">
                            <a href="/messagerie" class="btn btn-outline-primary">
                                <i class="fas fa-list me-2"></i>
                                Tous mes messages
                            </a>
                            <a href="/messagerie/nouveau" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Nouveau message
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations complémentaires -->
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Informations utiles
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Besoin d'aide ?</h6>
                            <ul class="small">
                                <li>Consultez la <a href="/infos">page infos pratiques</a></li>
                                <li>Relisez le <a href="/concept">concept de l'événement</a></li>
                                <li>Envoyez un nouveau message si nécessaire</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Délais de réponse :</h6>
                            <ul class="small">
                                <li><strong>Questions générales :</strong> 24-48h</li>
                                <li><strong>Urgences :</strong> Même jour</li>
                                <li><strong>Modifications :</strong> 48-72h</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include_once('view/autres_pages/footer.php'); ?> 