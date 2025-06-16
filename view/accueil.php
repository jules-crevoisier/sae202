<?php 
$page_title = 'Accueil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

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
                    <div class="cta-content text-center">
                        <div class="cta-icon mb-4">
                            <i class="fas fa-mask" aria-hidden="true"></i>
                        </div>
                        
                        <h3 class="cta-title mb-3">
                            Prêt à vivre l'expérience ?
                        </h3>
                        
                        <p class="cta-description mb-4">
                            Rejoignez-nous pour une soirée d'enquête, de suspense et de mystère.
                            Chaque détail compte, chaque indice peut faire la différence.
                        </p>
                        
                        <a href="/auth/inscription" class="btn btn-modern-primary btn-lg">
                            <i class="fas fa-user-plus me-2" aria-hidden="true"></i>
                            S'inscrire maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Informations pratiques -->
    <section class="practical-info-section animate-on-scroll">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 class="section-title">
                        <i class="fas fa-info-circle text-accent me-3" aria-hidden="true"></i>
                        Informations importantes
                    </h2>
                    <p class="section-subtitle">
                        Tout ce que vous devez savoir pour bien vous préparer
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-mask" aria-hidden="true"></i>
                    </div>
                    <div class="info-card-content">
                        <h5>Costumes</h5>
                        <p>
                            Venez déguisés selon votre personnage. Les costumes d'époque 
                            sont encouragés pour une immersion totale !
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-utensils" aria-hidden="true"></i>
                    </div>
                    <div class="info-card-content">
                        <h5>Repas</h5>
                        <p>
                            Un dîner thématique sera servi pendant l'enquête. 
                            Allergies à signaler lors de l'inscription.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-car" aria-hidden="true"></i>
                    </div>
                    <div class="info-card-content">
                        <h5>Accès</h5>
                        <p>
                            Parking gratuit disponible. Transport en commun 
                            possible jusqu'à la gare de Troyes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Hero Section */
    .hero-section {
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .min-vh-75 {
        min-height: 75vh;
    }
    
    .hero-badge {
        display: inline-flex;
        align-items: center;
        background: var(--gradient-accent);
        color: var(--text-primary);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: var(--shadow-md);
        animation: pulse-soft 2s infinite;
    }
    
    @keyframes pulse-soft {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 2rem;
    }
    
    .hero-description {
        font-size: 1.25rem;
        color: var(--text-secondary);
        line-height: 1.6;
    }
    
    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 500px;
    }
    
    .mystery-card {
        background: var(--gradient-primary);
        color: var(--text-light);
        padding: 3rem;
        border-radius: 24px;
        box-shadow: var(--shadow-xl);
        text-align: center;
        position: relative;
        z-index: 2;
        transform: rotate(-5deg);
        transition: var(--transition-smooth);
    }
    
    .mystery-card:hover {
        transform: rotate(0deg) scale(1.05);
    }
    
    .mystery-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        background: var(--gradient-accent);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .mystery-content h3 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: var(--text-light);
    }
    
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }
    
    .floating-element {
        position: absolute;
        width: 60px;
        height: 60px;
        background: var(--gradient-accent);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-primary);
        font-size: 1.5rem;
        box-shadow: var(--shadow-lg);
        animation: float 6s ease-in-out infinite;
    }
    
    .element-1 {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .element-2 {
        top: 20%;
        right: 15%;
        animation-delay: 2s;
    }
    
    .element-3 {
        bottom: 15%;
        left: 20%;
        animation-delay: 4s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    /* Sections communes */
    .section-header {
        margin-bottom: 4rem;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Event Info Section */
    .event-info-section {
        padding: 5rem 0;
    }
    
    .event-card {
        position: relative;
        overflow: hidden;
    }
    
    .event-card::before {
        background: var(--gradient-mystery) !important;
    }
    
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.5rem;
        border-radius: 16px;
        background: var(--bg-light-alt);
        transition: var(--transition-smooth);
        height: 100%;
    }
    
    .info-item:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }
    
    .info-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-accent);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-primary);
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    
    .info-content h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .info-content p {
        color: var(--text-secondary);
        margin: 0;
    }
    
    /* Testimonials Section */
    .testimonials-section {
        padding: 5rem 0;
        background: var(--bg-light-alt);
    }
    
    .testimonial-card {
        background: var(--bg-light);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .testimonial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-accent);
    }
    
    .testimonial-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .quote-icon {
        color: var(--accent-gold);
        font-size: 2rem;
        margin-bottom: 1rem;
        opacity: 0.7;
    }
    
    .testimonial-text {
        font-style: italic;
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 2rem;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .author-avatar {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .author-info {
        flex-grow: 1;
    }
    
    .author-name {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    
    .author-date {
        color: var(--text-muted);
    }
    
    .testimonial-rating {
        color: var(--accent-gold);
        font-size: 0.9rem;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 5rem 0;
    }
    
    .cta-card {
        background: var(--gradient-mystery);
        color: var(--text-light);
        border-radius: 24px;
        padding: 4rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 8s ease-in-out infinite;
    }
    
    .cta-icon {
        font-size: 4rem;
        background: var(--gradient-accent);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-light);
    }
    
    .cta-description {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 500px;
        margin: 0 auto;
    }
    
    /* Practical Info Section */
    .practical-info-section {
        padding: 5rem 0;
    }
    
    .info-card {
        background: var(--bg-light);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-accent);
    }
    
    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .info-card-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-size: 2rem;
        margin: 0 auto 2rem;
        box-shadow: var(--shadow-md);
    }
    
    .info-card-content h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }
    
    .info-card-content p {
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
    }
    
    /* Responsive Design */
    @media (max-width: 991.98px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .hero-actions {
            justify-content: center;
        }
        
        .mystery-card {
            transform: rotate(0deg);
        }
    }
    
    @media (max-width: 767.98px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-description {
            font-size: 1.1rem;
        }
        
        .hero-visual {
            height: 300px;
            margin-top: 2rem;
        }
        
        .mystery-card {
            padding: 2rem;
        }
        
        .mystery-icon {
            font-size: 3rem;
        }
        
        .floating-element {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
        
        .section-title {
            font-size: 1.75rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .info-card-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>

<?php require_once('view/autres_pages/footer.php'); ?> 