<?php
$page_title = "Messagerie - Murder Party";
require_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page messagerie avec direction artistique du site */
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
    
    .messagerie-header {
        text-align: center;
        padding: 2rem 0 3rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .messagerie-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
    
    .messagerie-subtitle {
        font-size: 1.2rem;
        color: #8B4513;
        font-style: italic;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .messagerie-card {
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
    
    .messagerie-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #742939, #A94803);
    }
    
    .messagerie-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .messagerie-card-body {
        padding: 2.5rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }
    
    .empty-state-icon {
        color: #A94803;
        margin-bottom: 2rem;
        opacity: 0.7;
    }
    
    .empty-state-title {
        color: #742939;
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .empty-state-description {
        color: #8B4513;
        margin-bottom: 2rem;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    .stat-card {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.1);
        transition: all 0.3s ease;
        text-align: center;
        padding: 2rem 1.5rem;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.15);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .stat-number.primary {
        color: #742939;
    }
    
    .stat-number.success {
        color: #28a745;
    }
    
    .stat-number.warning {
        color: #A94803;
    }
    
    .stat-label {
        color: #8B4513;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    .section-title-messagerie {
        color: #742939;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-messagerie i {
        color: #A94803;
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .message-item {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(116, 41, 57, 0.1);
        transition: all 0.3s ease;
        position: relative;
        background: white;
    }
    
    .message-item:last-child {
        border-bottom: none;
    }
    
    .message-item:hover {
        background: rgba(116, 41, 57, 0.05);
    }
    
    .message-item.has-response {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.05) 0%, rgba(40, 167, 69, 0.02) 100%);
        border-left: 4px solid #28a745;
    }
    
    .message-status-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
        margin-right: 1rem;
    }
    
    .message-status-icon.pending {
        background: rgba(169, 72, 3, 0.1);
        color: #A94803;
    }
    
    .message-status-icon.replied {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }
    
    .message-title {
        color: #742939;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    
    .message-title a {
        color: #742939;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .message-title a:hover {
        color: #A94803;
    }
    
    .message-excerpt {
        color: #5a5a5a;
        margin-bottom: 1rem;
        line-height: 1.5;
        font-size: 0.95rem;
    }
    
    .message-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.85rem;
        color: #8B4513;
        flex-wrap: wrap;
    }
    
    .message-meta i {
        color: #A94803;
        margin-right: 0.25rem;
    }
    
    .message-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
    }
    
    .message-badge.pending {
        background: rgba(169, 72, 3, 0.1);
        color: #A94803;
        border: 1px solid rgba(169, 72, 3, 0.2);
    }
    
    .message-badge.replied {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.2);
    }
    
    .message-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }
    
    .info-card-messagerie {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.2);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.1);
    }
    
    .info-card-messagerie h6 {
        color: #742939;
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    .info-card-messagerie h6 i {
        color: #A94803;
        margin-right: 0.5rem;
    }
    
    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .info-list li {
        color: #5a5a5a;
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
        font-size: 0.9rem;
    }
    
    .info-list li::before {
        content: '•';
        color: #A94803;
        font-weight: bold;
        position: absolute;
        left: 0;
    }
    
    .header-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    @media (max-width: 768px) {
        .messagerie-title {
            font-size: 2rem;
        }
        
        .header-actions {
            justify-content: center;
            margin-top: 1rem;
        }
        
        .message-item {
            padding: 1rem;
        }
        
        .message-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .message-actions {
            margin-top: 1rem;
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
        <div class="messagerie-header">
            <h1 class="messagerie-title">Ma messagerie</h1>
            <p class="messagerie-subtitle">
                Communiquez avec les organisateurs et suivez vos échanges
            </p>
            <div class="mt-3">
                <a href="/messagerie/nouveau" class="btn" style="background: #A94803; color: white; padding: 0.8rem 2rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-plus me-2"></i>
                    Nouveau message
                </a>
            </div>
        </div>

        <?php if (empty($messages)): ?>
        <!-- État vide -->
        <div class="messagerie-card">
                <div class="empty-state">
                    <i class="fas fa-envelope-open fa-5x empty-state-icon"></i>
                    <h4 class="empty-state-title">Aucun message pour le moment</h4>
                    <p class="empty-state-description">
                        Vous n'avez encore envoyé aucun message aux organisateurs.<br>
                        N'hésitez pas à nous contacter pour toutes vos questions !
                    </p>
                    <a href="/messagerie/nouveau" class="btn btn-modern-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>
                        Envoyer votre premier message
                    </a>
                </div>
            </div>
            <?php else: ?>
            
        <!-- Statistiques -->
        <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <span class="stat-number primary"><?= count($messages) ?></span>
                        <span class="stat-label">Messages envoyés</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <span class="stat-number success">
                            <?= count(array_filter($messages, function($m) { return !empty($m['reponse']); })) ?>
                        </span>
                        <span class="stat-label">Réponses reçues</span>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card">
                        <span class="stat-number warning">
                            <?= count(array_filter($messages, function($m) { return empty($m['reponse']); })) ?>
                        </span>
                        <span class="stat-label">En attente de réponse</span>
                    </div>
                </div>
            </div>

        <!-- Liste des messages -->
        <div class="messagerie-card">
                <div class="messagerie-card-body">
                    <h3 class="section-title-messagerie">
                        <i class="fas fa-list"></i> Mes conversations
                    </h3>
                    
                    <div class="messages-list">
                        <?php foreach ($messages as $message): ?>
                        <div class="message-item <?= !empty($message['reponse']) ? 'has-response' : '' ?>">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start">
                                        <div class="message-status-icon <?= !empty($message['reponse']) ? 'replied' : 'pending' ?>">
                                            <?php if (!empty($message['reponse'])): ?>
                                                <i class="fas fa-reply"></i>
                                            <?php else: ?>
                                                <i class="fas fa-clock"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="message-title">
                                                <a href="/messagerie/voir/<?= $message['id'] ?>">
                                                    <?= htmlspecialchars($message['sujet']) ?>
                                                </a>
                                            </h6>
                                            <p class="message-excerpt">
                                                <?= htmlspecialchars(substr($message['contenu'], 0, 120)) ?>
                                                <?php if (strlen($message['contenu']) > 120): ?>...<?php endif; ?>
                                            </p>
                                            <div class="message-meta">
                                                <span>
                                                    <i class="fas fa-calendar"></i>
                                                    Envoyé le <?= date('d/m/Y à H:i', strtotime($message['date_creation'])) ?>
                                                </span>
                                                <?php if (!empty($message['reponse'])): ?>
                                                    <span>
                                                        <i class="fas fa-reply"></i>
                                                        Réponse reçue le <?= date('d/m/Y', strtotime($message['date_reponse'])) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="message-actions">
                                        <span class="message-badge <?= !empty($message['reponse']) ? 'replied' : 'pending' ?>">
                                            <?php if (!empty($message['reponse'])): ?>
                                                <i class="fas fa-check"></i>
                                                Répondu
                                            <?php else: ?>
                                                <i class="fas fa-clock"></i>
                                                En attente
                                            <?php endif; ?>
                                        </span>
                                        <a href="/messagerie/voir/<?= $message['id'] ?>" class="btn btn-modern-outline btn-sm">
                                            <i class="fas fa-eye me-1"></i>
                                            Voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="/messagerie/nouveau" class="btn btn-modern-primary btn-lg">
                            <i class="fas fa-plus me-2"></i>
                            Nouveau message
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 