<?php
$page_title = "Nouveau message - Murder Party";
require_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page nouveau message avec direction artistique du site */
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
    .message-header {
        text-align: center;
        padding: 2rem 0 3rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .message-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
    
    .message-subtitle {
        font-size: 1.2rem;
        color: #8B4513;
        font-style: italic;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .message-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
    }
    
    .message-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #742939, #A94803);
    }
    
    .message-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .message-card-body {
        padding: 2.5rem;
    }
    
    .section-title-message {
        color: #742939;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-message i {
        color: #A94803;
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .form-group-message {
        margin-bottom: 1.5rem;
    }
    
    .form-label-message {
        color: #742939;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-message i {
        color: #A94803;
        margin-right: 0.5rem;
        width: 16px;
    }
    
    .form-control-message {
        border: 2px solid rgba(116, 41, 57, 0.2);
        border-radius: 12px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
        padding: 1rem;
    }
    
    .form-control-message:focus {
        outline: none;
        border-color: #A94803;
        box-shadow: 0 0 0 3px rgba(169, 72, 3, 0.1);
        background: white;
    }
    
    .form-select-message {
        border: 2px solid rgba(116, 41, 57, 0.2);
        border-radius: 12px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
        padding: 1rem;
    }
    
    .form-select-message:focus {
        outline: none;
        border-color: #A94803;
        box-shadow: 0 0 0 3px rgba(169, 72, 3, 0.1);
        background: white;
    }
    
    .form-text-message {
        color: #8B4513;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .textarea-message {
        resize: vertical;
        min-height: 150px;
    }
    
    .breadcrumb-message {
        background: transparent;
        padding: 0;
        margin-bottom: 1rem;
    }
    
    .breadcrumb-message .breadcrumb-item {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }
    
    .breadcrumb-message .breadcrumb-item.active {
        color: var(--text-primary);
        font-weight: 500;
    }
    
    .breadcrumb-message .breadcrumb-item a {
        color: var(--old-rose);
        text-decoration: none;
        transition: var(--transition-fast);
    }
    
    .breadcrumb-message .breadcrumb-item a:hover {
        color: var(--wine);
    }
    
    .info-card-message {
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .info-card-message h6 {
        color: var(--wine);
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .info-card-message h6 i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .info-card-message p {
        color: var(--text-secondary);
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .info-card-message p:last-child {
        margin-bottom: 0;
    }
    
    .info-card-message strong {
        color: var(--wine);
    }
    
    .tips-card {
        background: var(--bg-primary);
        border: 1px solid rgba(40, 167, 69, 0.2);
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
        margin-top: 2rem;
    }
    
    .tips-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #28a745, #20c997);
    }
    
    .tips-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .tips-card-header {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(32, 201, 151, 0.1));
        color: #28a745;
        padding: 1.5rem;
        border-bottom: 1px solid rgba(40, 167, 69, 0.1);
    }
    
    .tips-card-header h6 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
    }
    
    .tips-card-header i {
        margin-right: 0.5rem;
    }
    
    .tips-card-body {
        padding: 1.5rem;
    }
    
    .tips-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .tips-list li {
        padding: 0.5rem 0;
        font-size: 0.9rem;
        color: var(--text-secondary);
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .tips-list li .icon {
        margin-top: 0.1rem;
        flex-shrink: 0;
    }
    
    .tips-list.do li .icon {
        color: #28a745;
    }
    
    .tips-list.dont li .icon {
        color: #dc3545;
    }
    
    .tips-section-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1rem;
    }
    
    .form-actions-message {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .response-info {
        background: linear-gradient(135deg, rgba(32, 201, 151, 0.1), rgba(40, 167, 69, 0.1));
        border: 1px solid rgba(40, 167, 69, 0.2);
        border-radius: 12px;
        padding: 1rem;
        color: #28a745;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex: 1;
        min-width: 200px;
    }
    
    .response-info i {
        font-size: 1.1rem;
    }
    
    .response-info strong {
        color: #1e7e34;
    }
    
    .btn-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .success-state {
        text-align: center;
        padding: 3rem 2rem;
    }
    
    .success-icon {
        color: #28a745;
        margin-bottom: 1.5rem;
    }
    
    .success-title {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .success-description {
        color: var(--text-secondary);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    
    @media (max-width: 768px) {
        .message-title {
            font-size: 2rem;
        }
        
        .message-card-body {
            padding: 1.5rem;
        }
        
        .form-actions-message {
            flex-direction: column;
            align-items: stretch;
        }
        
        .response-info {
            justify-content: center;
            text-align: center;
        }
        
        .btn-actions {
            justify-content: stretch;
        }
        
        .btn-actions .btn {
            flex: 1;
        }
    }
</style>

<div class="main-content">
    <div class="container-custom">
        <!-- Ornement décoratif -->
        <div class="ornament-header">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement décoratif" />
        </div>
        
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem;">
            <ol class="breadcrumb breadcrumb-message" style="background: transparent; padding: 0;">
                <li class="breadcrumb-item">
                    <a href="/messagerie" style="color: #A94803; text-decoration: none;">
                        <i class="fas fa-envelope me-1"></i>
                        Messagerie
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #742939;">
                    <i class="fas fa-plus me-1"></i>
                    Nouveau message
                </li>
            </ol>
        </nav>

        <!-- Header de la page -->
        <div class="message-header">
            <h1 class="message-title">Nouveau message</h1>
            <p class="message-subtitle">
                Contactez directement les organisateurs pour toutes vos questions
            </p>
        </div>

            <!-- Alertes -->
            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-modern alert-danger alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle fa-2x me-3 mt-1"></i>
                        <div>
                            <strong>Erreur d'envoi</strong><br>
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

            <?php if (!empty($succes)): ?>
                <div class="message-card animate-on-scroll">
                    <div class="message-card-body">
                        <div class="success-state">
                            <i class="fas fa-check-circle fa-5x success-icon"></i>
                            <h3 class="success-title">Message envoyé avec succès !</h3>
                            <p class="success-description">
                                Votre message a été transmis aux organisateurs. Ils vous répondront dans les plus brefs délais, généralement sous 24-48h.
                            </p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="/messagerie" class="btn btn-modern-primary">
                                    <i class="fas fa-envelope me-2"></i>
                                    Retour à ma messagerie
                                </a>
                                <a href="/messagerie/nouveau" class="btn btn-modern-outline">
                                    <i class="fas fa-plus me-2"></i>
                                    Nouveau message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Formulaire de nouveau message -->
                <div class="message-card animate-on-scroll">
                    <div class="message-card-body">
                        <h3 class="section-title-message">
                            <i class="fas fa-envelope"></i> Contacter les organisateurs
                        </h3>
                        
                        <form method="POST" action="/messagerie/nouveau">
                            <div class="form-group-message">
                                <label for="sujet" class="form-label-message">
                                    <i class="fas fa-tag"></i> Sujet du message *
                                </label>
                                <select class="form-select form-select-message" id="sujet" name="sujet" required>
                                    <option value="">Choisissez un sujet...</option>
                                    <option value="Question générale" <?= ($_POST['sujet'] ?? '') === 'Question générale' ? 'selected' : '' ?>>Question générale</option>
                                    <option value="Allergies alimentaires" <?= ($_POST['sujet'] ?? '') === 'Allergies alimentaires' ? 'selected' : '' ?>>Allergies alimentaires</option>
                                    <option value="Transport et accès" <?= ($_POST['sujet'] ?? '') === 'Transport et accès' ? 'selected' : '' ?>>Transport et accès</option>
                                    <option value="Costumes et accessoires" <?= ($_POST['sujet'] ?? '') === 'Costumes et accessoires' ? 'selected' : '' ?>>Costumes et accessoires</option>
                                    <option value="Déroulement de la soirée" <?= ($_POST['sujet'] ?? '') === 'Déroulement de la soirée' ? 'selected' : '' ?>>Déroulement de la soirée</option>
                                    <option value="Modification de réservation" <?= ($_POST['sujet'] ?? '') === 'Modification de réservation' ? 'selected' : '' ?>>Modification de réservation</option>
                                    <option value="Problème technique" <?= ($_POST['sujet'] ?? '') === 'Problème technique' ? 'selected' : '' ?>>Problème technique</option>
                                    <option value="Autre" <?= ($_POST['sujet'] ?? '') === 'Autre' ? 'selected' : '' ?>>Autre</option>
                                </select>
                                <div class="form-text-message">
                                    <i class="fas fa-info-circle"></i>
                                    Sélectionnez le sujet qui correspond le mieux à votre demande
                                </div>
                            </div>

                            <div class="form-group-message">
                                <label for="contenu" class="form-label-message">
                                    <i class="fas fa-comment"></i> Votre message *
                                </label>
                                <textarea 
                                    class="form-control form-control-message textarea-message" 
                                    id="contenu" 
                                    name="contenu" 
                                    rows="8" 
                                    placeholder="Décrivez votre question ou demande en détail. Plus vous serez précis, plus nous pourrons vous aider efficacement..."
                                    required><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
                                <div class="form-text-message">
                                    <i class="fas fa-info-circle"></i>
                                    Minimum 10 caractères. Soyez précis pour obtenir une réponse adaptée
                                </div>
                            </div>

                            <div class="form-actions-message">
                                <div class="response-info">
                                    <i class="fas fa-clock"></i>
                                    <span><strong>Délai de réponse :</strong> 24-48h en moyenne</span>
                                </div>
                                <div class="btn-actions">
                                    <a href="/messagerie" class="btn btn-modern-outline">
                                        <i class="fas fa-times me-2"></i>
                                        Annuler
                                    </a>
                                    <button type="submit" class="btn btn-modern-primary">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Auto-redimensionnement du textarea et compteur de caractères
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('contenu');
    if (textarea) {
        // Redimensionnement automatique
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Compteur de caractères
        const minLength = 10;
        
        function updateCharacterCount() {
            const length = textarea.value.length;
            const formText = textarea.nextElementSibling;
            
            if (length < minLength) {
                formText.style.color = 'var(--rust)';
                formText.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${minLength - length} caractères minimum requis`;
            } else {
                formText.style.color = 'var(--text-muted)';
                formText.innerHTML = `<i class="fas fa-check-circle"></i> ${length} caractères - Message prêt à être envoyé`;
            }
        }
        
        textarea.addEventListener('input', updateCharacterCount);
        updateCharacterCount(); // Initial call
    }
    
    // Animation pour le select
    const select = document.getElementById('sujet');
    if (select) {
        select.addEventListener('change', function() {
            if (this.value) {
                this.style.color = 'var(--text-primary)';
            }
        });
    }
});
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 