<?php
$page_title = "Mes commentaires - Murder Party";
require_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page commentaires avec la nouvelle palette */
    .comments-header {
        padding: 3rem 0;
        margin-bottom: 3rem;
    }
    
    .comments-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .comments-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
    }
    
    .comments-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
        height: 100%;
    }
    
    .comments-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }
    
    .comments-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    .comments-card-body {
        padding: 2.5rem;
    }
    
    .section-title-comments {
        color: var(--wine);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-comments i {
        color: var(--rust);
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .form-group-comments {
        margin-bottom: 1.5rem;
    }
    
    .form-label-comments {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-comments i {
        color: var(--old-rose);
        margin-right: 0.5rem;
        width: 16px;
    }
    
    .form-control-comments {
        border: 2px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        background: var(--bg-primary);
        color: var(--text-primary);
        font-size: 1rem;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
        padding: 1rem;
        resize: vertical;
        min-height: 120px;
    }
    
    .form-control-comments:focus {
        outline: none;
        border-color: var(--old-rose);
        box-shadow: 0 0 0 3px rgba(175, 116, 129, 0.1);
        background: var(--bg-primary);
    }
    
    .form-text-comments {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .comment-item {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: var(--transition-smooth);
        position: relative;
    }
    
    .comment-item:hover {
        box-shadow: var(--shadow-sm);
        border-color: rgba(175, 116, 129, 0.2);
    }
    
    .comment-item.published {
        border-left: 4px solid #28a745;
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.05) 0%, rgba(40, 167, 69, 0.02) 100%);
    }
    
    .comment-item.pending {
        border-left: 4px solid var(--rust);
        background: linear-gradient(135deg, rgba(169, 72, 3, 0.05) 0%, rgba(169, 72, 3, 0.02) 100%);
    }
    
    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .comment-date {
        color: var(--text-muted);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .comment-status {
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    
    .comment-status.published {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.2);
    }
    
    .comment-status.pending {
        background: rgba(169, 72, 3, 0.1);
        color: var(--rust);
        border: 1px solid rgba(169, 72, 3, 0.2);
    }
    
    .comment-content {
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }
    
    .comment-approval {
        color: #28a745;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .empty-state-comments {
        text-align: center;
        padding: 3rem 2rem;
    }
    
    .empty-state-icon-comments {
        color: var(--old-rose);
        margin-bottom: 1.5rem;
        opacity: 0.7;
    }
    
    .empty-state-title-comments {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }
    
    .empty-state-description-comments {
        color: var(--text-secondary);
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .info-card-comments {
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 2rem;
    }
    
    .info-card-comments h6 {
        color: var(--wine);
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .info-card-comments h6 i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .info-card-comments p {
        color: var(--text-secondary);
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .info-card-comments p:last-child {
        margin-bottom: 0;
    }
    
    .info-card-comments strong {
        color: var(--wine);
    }
    
    .stats-card-comments {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-accent) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
    }
    
    .stat-item-comments {
        text-align: center;
        padding: 1rem;
    }
    
    .stat-number-comments {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .stat-number-comments.primary {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .stat-number-comments.success {
        color: #28a745;
    }
    
    .stat-number-comments.warning {
        color: var(--rust);
    }
    
    .stat-number-comments.info {
        color: var(--old-rose);
    }
    
    .stat-label-comments {
        color: var(--text-secondary);
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .form-actions-comments {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .moderation-info {
        color: var(--text-muted);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    @media (max-width: 768px) {
        .comments-title {
            font-size: 2rem;
        }
        
        .comments-card-body {
            padding: 1.5rem;
        }
        
        .comment-item {
            padding: 1rem;
        }
        
        .comment-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .form-actions-comments {
            flex-direction: column;
            align-items: stretch;
        }
        
        .moderation-info {
            justify-content: center;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="comments-header animate-on-scroll">
                <h1 class="comments-title">
                    <i class="fas fa-comments text-accent me-3"></i>Mes commentaires
                </h1>
                <p class="comments-subtitle">
                    Partagez votre expérience et consultez vos commentaires précédents
                </p>
            </div>

            <!-- Alertes -->
            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-modern alert-danger alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle fa-2x me-3 mt-1"></i>
                        <div>
                            <strong>Erreur de publication</strong><br>
                            Veuillez corriger les problèmes suivants :
                            <ul class="mb-0 mt-2">
                                <?php foreach ($erreurs as $erreur): ?>
                                    <li><?= htmlspecialchars($erreur) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($succes): ?>
                <div class="alert alert-modern alert-success alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3"></i>
                        <div>
                            <strong>Commentaire ajouté !</strong><br>
                            Votre commentaire a été ajouté avec succès ! Il sera visible après validation par nos équipes.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Formulaire d'ajout de commentaire -->
                <div class="col-lg-6 mb-4">
                    <div class="comments-card animate-on-scroll">
                        <div class="comments-card-body">
                            <h3 class="section-title-comments">
                                <i class="fas fa-plus"></i> Ajouter un commentaire
                            </h3>
                            
                            <form method="POST" action="/commentaire">
                                <div class="form-group-comments">
                                    <label for="contenu" class="form-label-comments">
                                        <i class="fas fa-comment"></i> Votre commentaire *
                                    </label>
                                    <textarea 
                                        class="form-control form-control-comments" 
                                        id="contenu" 
                                        name="contenu" 
                                        rows="6" 
                                        placeholder="Partagez votre expérience, vos impressions sur l'événement Murder Party..."
                                        required><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
                                    <div class="form-text-comments">
                                        <i class="fas fa-info-circle"></i>
                                        Entre 10 et 1000 caractères. Votre commentaire sera vérifié avant publication.
                                    </div>
                                </div>

                                <div class="form-actions-comments">
                                    <div class="moderation-info">
                                        <i class="fas fa-shield-alt"></i>
                                        Modération active
                                    </div>
                                    <button type="submit" class="btn btn-modern-primary">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Publier le commentaire
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Informations sur la modération -->
                    <div class="info-card-comments animate-on-scroll">
                        <h6>
                            <i class="fas fa-info-circle"></i>
                            À propos des commentaires
                        </h6>
                        <p><strong>Modération :</strong> Tous les commentaires sont vérifiés avant publication pour maintenir un environnement respectueux.</p>
                        <p><strong>Délai :</strong> Comptez 24-48h pour la validation de votre commentaire.</p>
                        <p><strong>Règles :</strong> Restez courtois, constructif et respectueux envers les autres participants.</p>
                    </div>
                </div>

                <!-- Liste des commentaires de l'utilisateur -->
                <div class="col-lg-6">
                    <div class="comments-card animate-on-scroll">
                        <div class="comments-card-body">
                            <h3 class="section-title-comments">
                                <i class="fas fa-history"></i> Mes commentaires (<?= count($mes_commentaires ?? []) ?>)
                            </h3>
                            
                            <?php if (empty($mes_commentaires ?? [])): ?>
                            <div class="empty-state-comments">
                                <i class="fas fa-comment-slash fa-4x empty-state-icon-comments"></i>
                                <h6 class="empty-state-title-comments">Aucun commentaire</h6>
                                <p class="empty-state-description-comments">Vous n'avez pas encore publié de commentaire. Partagez votre expérience !</p>
                            </div>
                            <?php else: ?>
                            <div class="comments-timeline">
                                <?php foreach ($mes_commentaires as $commentaire): ?>
                                <div class="comment-item <?= $commentaire['approuve'] ? 'published' : 'pending' ?>">
                                    <div class="comment-header">
                                        <div class="comment-date">
                                            <i class="fas fa-calendar"></i>
                                            <?= date('d/m/Y à H:i', strtotime($commentaire['date_creation'])) ?>
                                        </div>
                                        <div class="comment-status <?= $commentaire['approuve'] ? 'published' : 'pending' ?>">
                                            <?php if ($commentaire['approuve']): ?>
                                                <i class="fas fa-check"></i>
                                                Publié
                                            <?php else: ?>
                                                <i class="fas fa-clock"></i>
                                                En attente
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="comment-content">
                                        <?= nl2br(htmlspecialchars($commentaire['contenu'])) ?>
                                    </div>
                                    
                                    <?php if ($commentaire['approuve'] && $commentaire['date_approbation']): ?>
                                    <div class="comment-approval">
                                        <i class="fas fa-check-circle"></i>
                                        Approuvé le <?= date('d/m/Y', strtotime($commentaire['date_approbation'])) ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <?php if (!empty($mes_commentaires ?? [])): ?>
            <div class="stats-card-comments animate-on-scroll">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-item-comments">
                            <span class="stat-number-comments primary"><?= count($mes_commentaires) ?></span>
                            <span class="stat-label-comments">Total commentaires</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item-comments">
                            <span class="stat-number-comments success">
                                <?= count(array_filter($mes_commentaires, function($c) { return $c['approuve']; })) ?>
                            </span>
                            <span class="stat-label-comments">Publiés</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item-comments">
                            <span class="stat-number-comments warning">
                                <?= count(array_filter($mes_commentaires, function($c) { return !$c['approuve']; })) ?>
                            </span>
                            <span class="stat-label-comments">En attente</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item-comments">
                            <span class="stat-number-comments info">
                                <?= !empty($mes_commentaires) ? date('d/m', strtotime($mes_commentaires[0]['date_creation'])) : '-' ?>
                            </span>
                            <span class="stat-label-comments">Dernier commentaire</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Auto-redimensionnement du textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('contenu');
    if (textarea) {
        // Redimensionnement automatique
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Compteur de caractères
        const maxLength = 1000;
        const minLength = 10;
        
        function updateCharacterCount() {
            const length = textarea.value.length;
            const formText = textarea.nextElementSibling;
            
            if (length < minLength) {
                formText.style.color = 'var(--rust)';
                formText.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${minLength - length} caractères minimum requis`;
            } else if (length > maxLength) {
                formText.style.color = 'var(--wine)';
                formText.innerHTML = `<i class="fas fa-times-circle"></i> ${length - maxLength} caractères en trop`;
            } else {
                formText.style.color = 'var(--text-muted)';
                formText.innerHTML = `<i class="fas fa-check-circle"></i> ${length}/${maxLength} caractères`;
            }
        }
        
        textarea.addEventListener('input', updateCharacterCount);
        updateCharacterCount(); // Initial call
    }
});
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 