<?php
$title = "Messagerie - Murder Party";
include_once('view/autres_pages/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-envelope"></i> Ma messagerie
                </h1>
                <a href="/messagerie/nouveau" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Nouveau message
                </a>
            </div>
        </div>
    </div>

    <?php if (empty($messages)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-envelope-open fa-3x text-muted mb-3"></i>
                    <h4>Aucun message</h4>
                    <p class="text-muted">Vous n'avez encore envoyé aucun message aux organisateurs.</p>
                    <a href="/messagerie/nouveau" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Envoyer votre premier message
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    
    <!-- Statistiques rapides -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-primary"><?= count($messages) ?></h4>
                    <small>Messages envoyés</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-success">
                        <?= count(array_filter($messages, function($m) { return !empty($m['reponse']); })) ?>
                    </h4>
                    <small>Réponses reçues</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="text-info">
                        <?= count(array_filter($messages, function($m) { return empty($m['reponse']); })) ?>
                    </h4>
                    <small>En attente de réponse</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des messages -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-list"></i> Mes messages
                    </h5>
                </div>
                <div class="card-body p-0">
                    <?php foreach ($messages as $message): ?>
                    <div class="border-bottom p-3 <?= empty($message['reponse']) ? '' : 'bg-light' ?>">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <?php if (!empty($message['reponse'])): ?>
                                            <i class="fas fa-reply text-success fa-lg"></i>
                                        <?php else: ?>
                                            <i class="fas fa-clock text-warning fa-lg"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">
                                            <a href="/messagerie/voir/<?= $message['id'] ?>" class="text-decoration-none">
                                                <?= htmlspecialchars($message['sujet']) ?>
                                            </a>
                                        </h6>
                                        <p class="mb-1 text-muted small">
                                            <?= htmlspecialchars(substr($message['contenu'], 0, 100)) ?>
                                            <?php if (strlen($message['contenu']) > 100): ?>...<?php endif; ?>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            Envoyé le <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                                            <?php if (!empty($message['reponse'])): ?>
                                                <span class="text-success ms-2">
                                                    <i class="fas fa-check me-1"></i>
                                                    Réponse reçue le <?= date('d/m/Y', strtotime($message['date_reponse'])) ?>
                                                </span>
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="mb-2">
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
                                <a href="/messagerie/voir/<?= $message['id'] ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="card-footer text-center">
                    <a href="/messagerie/nouveau" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Nouveau message
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Aide -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Informations sur la messagerie
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Comment ça marche ?</h6>
                            <ul class="small">
                                <li>Envoyez vos questions aux organisateurs</li>
                                <li>Vous recevrez une réponse dans cette messagerie</li>
                                <li>Consultez régulièrement vos messages</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Sujets fréquents :</h6>
                            <ul class="small">
                                <li>Questions sur le déroulement</li>
                                <li>Allergies alimentaires</li>
                                <li>Transport et accès</li>
                                <li>Costumes et accessoires</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('view/autres_pages/footer.php'); ?> 