<?php
$page_title = "Messagerie - Murder Party";
require_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page messagerie avec la nouvelle palette */
    .messagerie-header {
        padding: 3rem 0;
        margin-bottom: 3rem;
    }
    
    .messagerie-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .messagerie-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
    }
    
    .messagerie-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
    }
    
    .messagerie-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }
    
    .messagerie-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    .messagerie-card-body {
        padding: 2.5rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }
    
    .empty-state-icon {
        color: var(--old-rose);
        margin-bottom: 2rem;
        opacity: 0.7;
    }
    
    .empty-state-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .empty-state-description {
        color: var(--text-secondary);
        margin-bottom: 2rem;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    .stat-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
        text-align: center;
        padding: 2rem 1.5rem;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: rgba(175, 116, 129, 0.2);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .stat-number.primary {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .stat-number.success {
        color: #28a745;
    }
    
    .stat-number.warning {
        color: var(--rust);
    }
    
    .stat-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    .section-title-messagerie {
        color: var(--wine);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-messagerie i {
        color: var(--rust);
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .message-item {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(175, 116, 129, 0.1);
        transition: var(--transition-smooth);
        position: relative;
    }
    
    .message-item:last-child {
        border-bottom: none;
    }
    
    .message-item:hover {
        background: rgba(175, 116, 129, 0.05);
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
        color: var(--rust);
    }
    
    .message-status-icon.replied {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }
    
    .message-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    
    .message-title a {
        color: var(--text-primary);
        text-decoration: none;
        transition: var(--transition-smooth);
    }
    
    .message-title a:hover {
        color: var(--wine);
    }
    
    .message-excerpt {
        color: var(--text-secondary);
        margin-bottom: 1rem;
        line-height: 1.5;
        font-size: 0.95rem;
    }
    
    .message-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.85rem;
        color: var(--text-muted);
        flex-wrap: wrap;
    }
    
    .message-meta i {
        color: var(--old-rose);
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
        color: var(--rust);
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
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 16px;
        padding: 2rem;
        margin-top: 2rem;
    }
    
    .info-card-messagerie h6 {
        color: var(--wine);
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    .info-card-messagerie h6 i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .info-list li {
        color: var(--text-secondary);
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
        font-size: 0.9rem;
    }
    
    .info-list li::before {
        content: '•';
        color: var(--old-rose);
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

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="messagerie-header animate-on-scroll">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h1 class="messagerie-title">
                            <i class="fas fa-envelope text-accent me-3"></i>Ma messagerie
                        </h1>
                        <p class="messagerie-subtitle">
                            Communiquez avec les organisateurs et suivez vos échanges
                        </p>
                    </div>
                    <div class="header-actions">
                        <a href="/messagerie/nouveau" class="btn btn-modern-primary btn-lg">
                            <i class="fas fa-plus me-2"></i>
                            Nouveau message
                        </a>
                    </div>
                </div>
            </div>

            <?php if (empty($messages)): ?>
            <!-- État vide -->
            <div class="messagerie-card animate-on-scroll">
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
            <div class="row mb-4 animate-on-scroll">
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
            <div class="messagerie-card animate-on-scroll">
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

            <!-- Informations et aide -->
            <div class="info-card-messagerie animate-on-scroll">
                <div class="row">
                    <div class="col-md-6">
                        <h6>
                            <i class="fas fa-question-circle"></i>
                            Comment ça marche ?
                        </h6>
                        <ul class="info-list">
                            <li>Envoyez vos questions aux organisateurs</li>
                            <li>Vous recevrez une réponse dans cette messagerie</li>
                            <li>Consultez régulièrement vos messages</li>
                            <li>Toutes vos conversations sont sauvegardées</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>
                            <i class="fas fa-lightbulb"></i>
                            Sujets fréquents
                        </h6>
                        <ul class="info-list">
                            <li>Questions sur le déroulement de la soirée</li>
                            <li>Allergies alimentaires et régimes spéciaux</li>
                            <li>Informations transport et accès au lieu</li>
                            <li>Costumes et accessoires recommandés</li>
                            <li>Annulation ou modification de réservation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 