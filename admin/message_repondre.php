<?php
$title = "Répondre au message - Administration";
$admin_active = "messages";
include_once('header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-reply"></i> Répondre au message
                </h1>
                <a href="/admin/messages" class="btn btn-outline-secondary">
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
                Réponse envoyée avec succès ! L'utilisateur sera notifié.
                <hr>
                <a href="/admin/messages" class="btn btn-success">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour à la messagerie
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <!-- Message original -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="fas fa-envelope me-2"></i>
                        Message original
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <?= strtoupper(substr($message['prenom'], 0, 1) . substr($message['nom'], 0, 1)) ?>
                                </div>
                                <div>
                                    <h6 class="mb-0">
                                        <?= htmlspecialchars($message['prenom'] . ' ' . $message['nom']) ?>
                                    </h6>
                                    <small class="text-muted">
                                        <a href="mailto:<?= htmlspecialchars($message['email']) ?>" class="text-decoration-none">
                                            <?= htmlspecialchars($message['email']) ?>
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Sujet :</strong> <?= htmlspecialchars($message['sujet']) ?>
                    </div>
                    
                    <div class="bg-light p-3 rounded">
                        <?= nl2br(htmlspecialchars($message['contenu'])) ?>
                    </div>
                </div>
            </div>

            <!-- Formulaire de réponse -->
            <?php if (!$succes): ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-reply me-2"></i>
                        Votre réponse
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/message-repondre?id=<?= $message['id'] ?>">
                        <div class="mb-4">
                            <label for="reponse" class="form-label">
                                <i class="fas fa-comment me-2"></i>
                                Message de réponse *
                            </label>
                            <textarea 
                                class="form-control" 
                                id="reponse" 
                                name="reponse" 
                                rows="8" 
                                placeholder="Saisissez votre réponse ici..."
                                required><?= htmlspecialchars($_POST['reponse'] ?? '') ?></textarea>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Minimum 10 caractères. Utilisez des phrases complètes et un ton professionnel.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Information :</strong> La réponse sera enregistrée dans la messagerie interne et l'utilisateur sera notifié de votre réponse lors de sa prochaine connexion.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="/admin/messages" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Envoyer la réponse
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <!-- Actions supplémentaires -->
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-tools me-2"></i>
                        Actions supplémentaires
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Répondre par email externe</h6>
                            <p class="text-muted small">
                                Ouvrir votre client email avec une réponse pré-remplie.
                            </p>
                            <a href="mailto:<?= htmlspecialchars($message['email']) ?>?subject=Re: <?= urlencode($message['sujet']) ?>&body=<?= urlencode("Bonjour " . $message['prenom'] . ",\n\nSuite à votre message du " . date('d/m/Y', strtotime($message['date_creation'])) . " concernant :\n\n" . $message['contenu'] . "\n\n---\nCordialement,\nL'équipe Murder Party") ?>" 
                               class="btn btn-outline-info">
                                <i class="fas fa-external-link-alt me-2"></i>
                                Répondre par email
                            </a>
                        </div>
                        <div class="col-md-6">
                            <h6>Marquer comme traité</h6>
                            <p class="text-muted small">
                                Si vous avez traité la demande autrement (téléphone, etc.).
                            </p>
                            <a href="/admin/message?id=<?= $message['id'] ?>" 
                               class="btn btn-outline-success">
                                <i class="fas fa-check me-2"></i>
                                Marquer comme lu
                            </a>
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
    const textarea = document.getElementById('reponse');
    if (textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});
</script>

<?php include_once('footer.php'); ?> 