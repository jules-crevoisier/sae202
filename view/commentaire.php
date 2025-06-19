<?php
$page_title = "Mes commentaires - Murder Party";
require_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page commentaires avec direction artistique du site */
    body {

        min-height: 100vh;
    }
    
    .main-content {
        padding-top: 120px;
        position: relative;
    }
    
    .main-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: repeating-linear-gradient(
            90deg,
            rgba(116, 41, 57, 0.03) 0px,
            rgba(116, 41, 57, 0.03) 1px,
            transparent 1px,
            transparent 20px
        );
        pointer-events: none;
    }
    
    .container-custom {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    /* Ornement décoratif */
    .ornament-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .ornament-header img {
        height: 120px;
        width: auto;
        opacity: 0.8;
        filter: brightness(0) saturate(100%) invert(23%) sepia(18%) saturate(1847%) hue-rotate(314deg) brightness(95%) contrast(89%);
    }
    .comments-header {
        text-align: center;
        padding: 2rem 0 3rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .comments-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
    
    .comments-subtitle {
        font-size: 1.2rem;
        color: #8B4513;
        font-style: italic;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .comments-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
        height: 100%;
        backdrop-filter: blur(10px);
    }
    
    .comments-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #742939, #A94803);
    }
    
    .comments-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .comments-card-body {
        padding: 2.5rem;
    }
    
    .section-title-comments {
        color: #742939;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-comments i {
        color: #A94803;
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .form-group-comments {
        margin-bottom: 1.5rem;
    }
    
    .form-label-comments {
        color: #742939;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-comments i {
        color: #A94803;
        margin-right: 0.5rem;
        width: 16px;
    }
    
    .form-control-comments {
        border: 2px solid rgba(116, 41, 57, 0.2);
        border-radius: 12px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
        padding: 1rem;
        resize: vertical;
        min-height: 120px;
    }
    
    .form-control-comments:focus {
        outline: none;
        border-color: #A94803;
        box-shadow: 0 0 0 3px rgba(169, 72, 3, 0.1);
        background: white;
    }
    
    .form-text-comments {
        color: #8B4513;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .comment-item {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
    }
    
    .comment-item:hover {
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .comment-item.published {
        border-left: 4px solid #28a745;
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.05) 0%, rgba(40, 167, 69, 0.02) 100%);
    }
    
    .comment-item.pending {
        border-left: 4px solid #A94803;
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
        color: #8B4513;
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
        color: #A94803;
        border: 1px solid rgba(169, 72, 3, 0.2);
    }
    
    .comment-content {
        color: #5a5a5a;
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
        background: white;
    }
    
    .empty-state-icon-comments {
        color: #A94803;
        margin-bottom: 1.5rem;
        opacity: 0.7;
    }
    
    .empty-state-title-comments {
        color: #742939;
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }
    
    .empty-state-description-comments {
        color: #8B4513;
        font-size: 0.95rem;
        line-height: 1.5;
    }
    
    .info-card-comments {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 2rem;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.1);
    }
    
    .info-card-comments h6 {
        color: #742939;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .info-card-comments h6 i {
        color: #A94803;
        margin-right: 0.5rem;
    }
    
    .info-card-comments p {
        color: #5a5a5a;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .info-card-comments p:last-child {
        margin-bottom: 0;
    }
    
    .info-card-comments strong {
        color: #742939;
    }
    
    .stats-card-comments {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.2);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.1);
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
        color: #742939;
    }
    
    .stat-number-comments.success {
        color: #28a745;
    }
    
    .stat-number-comments.warning {
        color: #A94803;
    }
    
    .stat-number-comments.info {
        color: #A94803;
    }
    
    .stat-label-comments {
        color: #8B4513;
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
        color: #8B4513;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Boutons stylisés */
    .btn-modern-primary {
        background: #A94803;
        border-color: #A94803;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-modern-primary:hover {
        background: #742939;
        border-color: #742939;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.3);
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

<div class="main-content">
    <div class="container-custom">
        <!-- Ornement décoratif -->
        <div class="ornament-header">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement décoratif" />
        </div>
        
        <!-- Header de la page -->
        <div class="comments-header">
            <h1 class="comments-title">Mes commentaires</h1>
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

                            <div class="row" style="display: flex; align-items: stretch;">
                                  <!-- Formulaire d'ajout de commentaire -->
                    <div class="col-lg-6 mb-4" style="display: flex;">
                      <div class="comments-card animate-on-scroll" style="flex: 1; display: flex; flex-direction: column;">
                          <div class="comments-card-body" style="flex: 1;">
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