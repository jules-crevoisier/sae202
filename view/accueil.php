<?php 
$page_title = 'Accueil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles spécifiques pour la page d'accueil avec la nouvelle palette */
    
    /* Section événement */
    .event-info-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-primary) 50%, var(--bg-secondary) 100%);
    }
    
    .event-card {
        position: relative;
        overflow: hidden;
    }
    
    .event-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-accent);
    }
    
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.5rem;
        background: rgba(175, 116, 129, 0.05);
        border-radius: 12px;
        transition: var(--transition-smooth);
        height: 100%;
    }
    
    .info-item:hover {
        background: rgba(175, 116, 129, 0.1);
        transform: translateY(-2px);
    }
    
    .info-icon {
        background: var(--gradient-secondary);
        color: var(--text-light);
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
        box-shadow: var(--shadow-md);
    }
    
    .info-content h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    
    .info-content p {
        color: var(--text-secondary);
        line-height: 1.5;
    }
    
    .info-content strong {
        color: var(--wine);
        font-weight: 600;
    }
    
    /* Section témoignages */
    .testimonials-section {
        padding: 4rem 0;
        background: var(--bg-primary);
    }
    
    .testimonial-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }
    
    .testimonial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-secondary);
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(175, 116, 129, 0.2);
    }
    
    .testimonial-content {
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }
    
    .quote-icon {
        background: var(--gradient-accent);
        color: var(--text-light);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin-bottom: 1rem;
        box-shadow: var(--shadow-sm);
    }
    
    .testimonial-text {
        color: var(--text-secondary);
        font-style: italic;
        line-height: 1.6;
        margin-bottom: 0;
        font-size: 0.95rem;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(175, 116, 129, 0.1);
    }
    
    .author-avatar {
        background: var(--gradient-primary);
        color: var(--text-light);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.9rem;
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }
    
    .author-info {
        flex-grow: 1;
    }
    
    .author-name {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 0.9rem;
    }
    
    .author-date {
        color: var(--text-muted);
        font-size: 0.8rem;
    }
    
    .testimonial-rating {
        color: var(--rust);
        font-size: 0.8rem;
        display: flex;
        gap: 2px;
    }
    
    /* Section Call to Action */
    .cta-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-accent) 30%, var(--bg-secondary) 100%);
    }
    
    .cta-card {
        background: var(--gradient-elegant);
        color: var(--text-light);
        padding: 3rem 2rem;
        border-radius: 25px;
        box-shadow: var(--shadow-xl);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: shine 4s ease-in-out infinite;
    }
    
    .cta-icon {
        background: var(--gradient-accent);
        color: var(--text-light);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto;
        box-shadow: var(--shadow-lg);
        animation: pulse-cta 2s ease-in-out infinite;
    }
    
    @keyframes pulse-cta {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .cta-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-light);
        margin-bottom: 1rem;
    }
    
    .cta-description {
        font-size: 1.1rem;
        color: rgba(255, 252, 239, 0.9);
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    
    .cta-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    /* Boutons CTA spéciaux */
    .btn-cta-primary {
        background: var(--gradient-accent);
        border: none;
        color: var(--text-light);
        font-weight: 600;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-rust);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
        color: var(--text-light);
    }
    
    .btn-cta-secondary {
        background: transparent;
        border: 2px solid var(--old-rose-light);
        color: var(--old-rose-light);
        font-weight: 600;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        transition: var(--transition-smooth);
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-cta-secondary:hover {
        background: var(--old-rose-light);
        color: var(--caput-mortuum);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Section statistiques */
    .stats-section {
        padding: 3rem 0;
        background: var(--bg-primary);
    }
    
    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: rgba(175, 116, 129, 0.05);
        border-radius: 15px;
        transition: var(--transition-smooth);
    }
    
    .stat-item:hover {
        background: rgba(175, 116, 129, 0.1);
        transform: translateY(-3px);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 1rem;
    }
    
    /* Card Murder Party moderne - Style exact comme l'image */
    .hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
    }
    
    .mystery-card {
        background: var(--gradient-elegant) !important;
        border: none !important;
        border-radius: 20px !important;
        box-shadow: var(--shadow-xl) !important;
        padding: 3rem 2.5rem !important;
        text-align: center !important;
        position: relative !important;
        overflow: hidden !important;
        max-width: 400px;
        width: 100%;
        transition: var(--transition-smooth) !important;
        z-index: 2;
        transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
    }
    
    .mystery-card::before {
        display: none !important;
    }
    
    .mystery-card:hover {
        transform: perspective(1000px) rotateY(-2deg) rotateX(2deg) translateY(-5px) !important;
        box-shadow: 0 20px 40px rgba(79, 39, 47, 0.3) !important;
    }
    
    .mystery-icon {
        background: var(--gradient-accent) !important;
        color: var(--text-light) !important;
        width: 80px !important;
        height: 80px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 2rem !important;
        margin: 0 auto 1.5rem auto !important;
        box-shadow: 0 8px 25px rgba(169, 72, 3, 0.3) !important;
        position: relative !important;
        animation: none !important;
    }
    
    /* Pictogramme de masque personnalisé */
    .mystery-icon i {
        display: none; /* Cache l'icône Font Awesome */
    }
    
    .mystery-icon::before {
        content: '';
        position: absolute;
        width: 45px;
        height: 30px;
        background: linear-gradient(135deg, #E6B95C, #D4A574, #C19A4A);
        border-radius: 22px 22px 12px 12px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 
            inset 0 2px 4px rgba(255,255,255,0.3),
            inset 0 -2px 4px rgba(0,0,0,0.2),
            0 2px 8px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    /* Ajout des trous pour les yeux */
    .mystery-icon .eye-left,
    .mystery-icon .eye-right {
        position: absolute;
        width: 10px;
        height: 10px;
        background: var(--caput-mortuum);
        border-radius: 50%;
        top: 50%;
        box-shadow: 
            inset 0 1px 2px rgba(0,0,0,0.5),
            0 1px 2px rgba(255,255,255,0.1);
        z-index: 2;
    }
    
    .mystery-icon .eye-left {
        left: 50%;
        transform: translate(-140%, -50%);
    }
    
    .mystery-icon .eye-right {
        left: 50%;
        transform: translate(40%, -50%);
    }
    
    /* Suppression de l'ancien ::after */
    .mystery-icon::after {
        display: none;
    }
    
    .mystery-content h3 {
        color: var(--text-light) !important;
        font-family: 'Playfair Display', Georgia, serif !important;
        font-weight: 700 !important;
        font-size: 2rem !important;
        margin-bottom: 0.5rem !important;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3) !important;
    }
    
    .mystery-content p {
        color: rgba(255, 252, 239, 0.9) !important;
        font-size: 1rem !important;
        font-weight: 400 !important;
        margin-bottom: 0 !important;
        line-height: 1.4 !important;
        opacity: 0.9;
    }
    
    /* Éléments flottants comme dans l'image */
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
    }
    
    .floating-element {
        position: absolute !important;
        background: var(--gradient-accent) !important;
        color: var(--text-light) !important;
        width: 60px !important;
        height: 60px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 1.3rem !important;
        box-shadow: 0 8px 25px rgba(169, 72, 3, 0.2) !important;
        animation: float-gentle 6s ease-in-out infinite !important;
        opacity: 0.9;
    }
    
    .floating-element.element-1 {
        top: 10% !important;
        right: 10% !important;
        animation-delay: 0s !important;
        background: var(--gradient-accent) !important;
    }
    
    .floating-element.element-2 {
        bottom: 20% !important;
        right: 20% !important;
        animation-delay: 2s !important;
        background: var(--gradient-accent) !important;
        opacity: 0.7;
    }
    
    .floating-element.element-3 {
        top: 50% !important;
        right: 5% !important;
        animation-delay: 4s !important;
        background: var(--gradient-accent) !important;
        opacity: 0.8;
    }
    
    @keyframes float-gentle {
        0%, 100% { 
            transform: translateY(0px) scale(1); 
            opacity: 0.7;
        }
        50% { 
            transform: translateY(-10px) scale(1.05); 
            opacity: 0.9;
        }
    }
    
    /* Suppression de l'effet de brillance */
    .mystery-card::after {
        display: none;
    }
    
    /* Responsive pour la card Murder Party */
    @media (max-width: 768px) {
        .mystery-card {
            max-width: 350px !important;
            padding: 2.5rem 2rem !important;
            transform: perspective(800px) rotateY(-3deg) rotateX(3deg) !important;
        }
        
        .mystery-card:hover {
            transform: perspective(800px) rotateY(-1deg) rotateX(1deg) translateY(-3px) !important;
        }
        
        .mystery-icon {
            width: 70px !important;
            height: 70px !important;
            font-size: 1.8rem !important;
            margin-bottom: 1.25rem !important;
        }
        
        .mystery-content h3 {
            font-size: 1.7rem !important;
        }
        
        .mystery-content p {
            font-size: 0.95rem !important;
        }
        
        .floating-element {
            width: 50px !important;
            height: 50px !important;
            font-size: 1.1rem !important;
        }
        
        .hero-visual {
            min-height: 350px;
        }
    }
    
    @media (max-width: 576px) {
        .mystery-card {
            max-width: 300px !important;
            padding: 2rem 1.5rem !important;
            transform: perspective(600px) rotateY(-2deg) rotateX(2deg) !important;
        }
        
        .mystery-card:hover {
            transform: perspective(600px) rotateY(0deg) rotateX(0deg) translateY(-2px) !important;
        }
        
        .mystery-icon {
            width: 60px !important;
            height: 60px !important;
            font-size: 1.6rem !important;
        }
        
        .mystery-content h3 {
            font-size: 1.5rem !important;
        }
        
        .floating-element {
            width: 45px !important;
            height: 45px !important;
            font-size: 1rem !important;
        }
        
        .hero-visual {
            min-height: 300px;
        }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .cta-title {
            font-size: 1.6rem;
        }
        
        .cta-description {
            font-size: 1rem;
        }
        
        .cta-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-primary,
        .btn-cta-secondary {
            width: 100%;
            max-width: 280px;
        }
        
        .info-item {
            padding: 1rem;
        }
        
        .testimonial-card {
            padding: 1.25rem;
        }
        
        .cta-card {
            padding: 2rem 1.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .stat-number {
            font-size: 2rem;
        }
        
        .cta-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>

<div class="container">
    <!-- Hero Section moderne -->
    <section class="hero-section animate-on-scroll">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="hero-content">
                    <div class="hero-badge mb-4">
                        <i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>
                        <span>Prochaine Murder Party - 29 juin 2024</span>
                    </div>
                    
                    <h1 class="hero-title mb-4">
                        Plongez dans le 
                        <span class="text-mystery">Mystère</span>
                    </h1>
                    
                    <p class="hero-description mb-5">
                        Une enquête palpitante vous attend dans cette soirée immersive unique. 
                        Découvrez qui est le coupable, analysez les indices et vivez une expérience 
                        inoubliable au cœur d'un véritable thriller.
                    </p>
                    
                    <div class="hero-actions">
                        <?php if (!isLoggedIn()): ?>
                            <a href="/auth/inscription" class="btn btn-modern-primary btn-lg me-3">
                                <i class="fas fa-user-plus me-2" aria-hidden="true"></i>
                                Participer à l'événement
                            </a>
                            <a href="/concept" class="btn btn-modern-outline btn-lg">
                                <i class="fas fa-lightbulb me-2" aria-hidden="true"></i>
                                Découvrir le concept
                            </a>
                        <?php else: ?>
                            <a href="/profil" class="btn btn-modern-primary btn-lg me-3">
                                <i class="fas fa-user me-2" aria-hidden="true"></i>
                                Mon profil
                            </a>
                            <a href="/messagerie" class="btn btn-modern-outline btn-lg">
                                <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                                Messagerie
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="mystery-card">
                        <div class="mystery-icon">
                            <i class="fas fa-mask" aria-hidden="true"></i>
                            <div class="eye-left"></div>
                            <div class="eye-right"></div>
                        </div>
                        <div class="mystery-content">
                            <h3>Murder Party</h3>
                            <p>Une soirée d'enquête immersive</p>
                        </div>
                    </div>
                    
                    <div class="floating-elements">
                        <div class="floating-element element-1">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </div>
                        <div class="floating-element element-2">
                            <i class="fas fa-fingerprint" aria-hidden="true"></i>
                        </div>
                        <div class="floating-element element-3">
                            <i class="fas fa-key" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informations de l'événement -->
    <section class="event-info-section animate-on-scroll">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 class="section-title">
                        <i class="fas fa-calendar-alt text-accent me-3" aria-hidden="true"></i>
                        Prochaine Murder Party
                    </h2>
                    <p class="section-subtitle">
                        Toutes les informations essentielles pour votre participation
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card-modern event-card">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-clock" aria-hidden="true"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Quand ?</h5>
                                        <p class="mb-0">
                                            <strong>Samedi 29 juin 2024</strong><br>
                                            de 19h00 à 23h00
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Où ?</h5>
                                        <p class="mb-0">
                                            <strong>Château de Vaux</strong><br>
                                            10000 Troyes
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Participants</h5>
                                        <p class="mb-0">
                                            <strong>6 à 12 joueurs</strong><br>
                                            À partir de 16 ans
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-euro-sign" aria-hidden="true"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Tarif</h5>
                                        <p class="mb-0">
                                            <strong>25€ par personne</strong><br>
                                            Repas inclus
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-modern alert-warning mt-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle fa-2x me-3 text-accent" aria-hidden="true"></i>
                                <div>
                                    <strong>Places limitées !</strong><br>
                                    Inscrivez-vous rapidement pour ne pas manquer cette expérience unique.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Commentaires approuvés -->
    <?php if (!empty($commentaires)): ?>
    <section class="testimonials-section animate-on-scroll">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 class="section-title">
                        <i class="fas fa-comments text-accent me-3" aria-hidden="true"></i>
                        Ce que disent nos participants
                    </h2>
                    <p class="section-subtitle">
                        Découvrez les témoignages de ceux qui ont vécu l'expérience
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php foreach ($commentaires as $index => $commentaire): ?>
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left" aria-hidden="true"></i>
                        </div>
                        <p class="testimonial-text">
                            <?= nl2br(securise($commentaire['contenu'])) ?>
                        </p>
                    </div>
                    
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <?= strtoupper(substr($commentaire['prenom'], 0, 1) . substr($commentaire['nom'], 0, 1)) ?>
                        </div>
                        <div class="author-info">
                            <h6 class="author-name">
                                <?= securise($commentaire['prenom']) ?> <?= securise(substr($commentaire['nom'], 0, 1)) ?>.
                            </h6>
                            <small class="author-date">
                                <i class="fas fa-calendar me-1" aria-hidden="true"></i>
                                <?= date('d/m/Y', strtotime($commentaire['date_creation'])) ?>
                            </small>
                        </div>
                        <div class="testimonial-rating">
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <i class="fas fa-star" aria-hidden="true"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- Call to Action -->
    <?php if (!isLoggedIn()): ?>
    <section class="cta-section animate-on-scroll">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="cta-card">
                    <div class="cta-content">
                        <div class="cta-icon mb-4">
                            <i class="fas fa-mask" aria-hidden="true"></i>
                        </div>
                        
                        <h3 class="cta-title mb-3">
                            Prêt à vivre l'expérience ?
                        </h3>
                        
                        <p class="cta-description mb-4">
                            Rejoignez-nous pour une soirée d'enquête, de suspense et de mystère.
                            Une expérience unique vous attend !
                        </p>
                        
                        <div class="cta-actions">
                            <a href="/auth/inscription" class="btn btn-cta-primary">
                                <i class="fas fa-user-plus me-2" aria-hidden="true"></i>
                                S'inscrire maintenant
                            </a>
                            <a href="/concept" class="btn btn-cta-secondary">
                                <i class="fas fa-info-circle me-2" aria-hidden="true"></i>
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Statistiques -->
    <section class="stats-section animate-on-scroll">
        <div class="row">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Participants</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">25</span>
                    <span class="stat-label">Événements</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">4.8/5</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">3h</span>
                    <span class="stat-label">Durée moyenne</span>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 