<?php 
$page_title = 'Concept - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles pour la page concept avec la nouvelle palette */
    .concept-header {
        padding: 3rem 0;
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .concept-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .concept-subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .concept-section {
        margin-bottom: 3rem;
    }
    
    .concept-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
    }
    
    .concept-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }
    
    .concept-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    .concept-card-body {
        padding: 2.5rem;
    }
    
    .section-title {
        color: var(--wine);
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title i {
        color: var(--rust);
        margin-right: 1rem;
        font-size: 1.5rem;
    }
    
    .step-number {
        background: var(--gradient-primary);
        color: var(--text-light);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.2rem;
        box-shadow: var(--shadow-md);
    }
    
    .step-content h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
    }
    
    .step-content p {
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
    }
    
    .feature-icon {
        color: var(--old-rose);
        margin-bottom: 1.5rem;
    }
    
    .feature-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .feature-description {
        color: var(--text-secondary);
        line-height: 1.6;
    }
    
    .character-list {
        list-style: none;
        padding: 0;
    }
    
    .character-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        padding: 0.5rem;
        background: rgba(175, 116, 129, 0.05);
        border-radius: 8px;
        transition: var(--transition-smooth);
    }
    
    .character-list li:hover {
        background: rgba(175, 116, 129, 0.1);
        transform: translateX(5px);
    }
    
    .character-list i {
        color: var(--old-rose);
        margin-right: 0.75rem;
        width: 20px;
    }
    
    .alert-concept {
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }
    
    .alert-concept i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .alert-concept strong {
        color: var(--wine);
    }
    
    .mystery-box {
        background: var(--gradient-elegant);
        color: var(--text-light);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }
    
    .mystery-box::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        animation: shine 4s ease-in-out infinite;
    }
    
    .mystery-box h5 {
        color: var(--text-light);
        margin-bottom: 1rem;
    }
    
    .mystery-box p {
        color: rgba(255, 252, 239, 0.9);
        margin-bottom: 1rem;
    }
    
    .mystery-box .alert {
        background: rgba(169, 72, 3, 0.2);
        border: 1px solid rgba(169, 72, 3, 0.3);
        color: var(--text-light);
        margin: 0;
    }
    
    .cta-section {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-accent) 100%);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        margin-top: 3rem;
    }
    
    .cta-section h3 {
        color: var(--wine);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    
    .cta-section p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="concept-header animate-on-scroll">
                <h1 class="concept-title">
                    <i class="fas fa-lightbulb text-accent"></i> Le Concept
                </h1>
                <p class="concept-subtitle">Découvrez le principe de notre Murder Party immersive</p>
            </div>

            <!-- Qu'est-ce qu'une Murder Party -->
            <section class="concept-section animate-on-scroll">
                <div class="concept-card">
                    <div class="concept-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-question-circle"></i> Qu'est-ce qu'une Murder Party ?
                        </h2>
                        <div class="row">
                            <div class="col-md-8">
                                <p class="mb-3">
                                    Une Murder Party est un jeu de rôle grandeur nature où les participants incarnent des personnages 
                                    dans une histoire policière interactive. L'objectif ? Résoudre un mystérieux meurtre en collectant 
                                    des indices, en interrogeant les suspects et en démasquant le coupable.
                                </p>
                                <p class="mb-3">
                                    Contrairement à un escape game classique, ici <strong>vous êtes les personnages de l'histoire</strong>. 
                                    Chaque participant reçoit un rôle avec ses propres secrets, motivations et alibis.
                                </p>
                                <p class="mb-0">
                                    L'enquête se déroule pendant un véritable dîner où les révélations, les confrontations 
                                    et les rebondissements s'enchaînent jusqu'au dénouement final.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-search fa-5x feature-icon"></i>
                                    <h5 class="feature-title">Investigation</h5>
                                    <p class="feature-description">Collectez les indices et résolvez l'énigme</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Comment ça marche -->
            <section class="concept-section animate-on-scroll">
                <div class="concept-card">
                    <div class="concept-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-cogs"></i> Comment ça marche ?
                        </h2>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="step-number">1</div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 step-content">
                                        <h5>Attribution des rôles</h5>
                                        <p>Chaque participant reçoit son personnage avec une fiche détaillée : identité, background, secrets...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="step-number">2</div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 step-content">
                                        <h5>Le crime</h5>
                                        <p>Un meurtre est commis ! L'enquête commence et tous les participants deviennent suspects.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="step-number">3</div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 step-content">
                                        <h5>Investigation</h5>
                                        <p>Fouille des lieux, interrogatoires, révélations... Tout se passe pendant le repas !</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="step-number">4</div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 step-content">
                                        <h5>Révélation</h5>
                                        <p>Chacun expose sa théorie. Le coupable est démasqué et l'histoire révélée !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Notre scénario -->
            <section class="concept-section animate-on-scroll">
                <div class="concept-card">
                    <div class="concept-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-scroll"></i> Notre Scénario : "Le Mystère du Château de Vaux"
                        </h2>
                        <div class="alert-concept">
                            <i class="fas fa-calendar-alt"></i>
                            <strong>Époque :</strong> Années 1920 - L'âge d'or des grands domaines
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="text-accent">L'histoire</h4>
                                <p class="mb-3">
                                    Nous sommes en 1925. Le Comte de Vaux organise une grande réception dans son château 
                                    pour célébrer ses 60 ans. Les invités sont tous des proches : famille, amis et employés 
                                    de confiance.
                                </p>
                                <p class="mb-3">
                                    Mais la soirée tourne au cauchemar lorsque le Comte est retrouvé mort dans sa bibliothèque, 
                                    empoisonné ! Les portes du château sont verrouillées, personne ne peut sortir...
                                </p>
                                <p class="mb-4">
                                    <strong>Le meurtrier se trouve forcément parmi les invités !</strong>
                                </p>
                                
                                <h5 class="text-accent">Les personnages</h5>
                                <ul class="character-list">
                                    <li><i class="fas fa-female"></i> <strong>Lady Catherine</strong> - L'épouse délaissée</li>
                                    <li><i class="fas fa-male"></i> <strong>Charles de Vaux</strong> - Le fils prodigue</li>
                                    <li><i class="fas fa-female"></i> <strong>Mlle Dubois</strong> - La gouvernante dévouée</li>
                                    <li><i class="fas fa-male"></i> <strong>Dr. Martin</strong> - Le médecin de famille</li>
                                    <li><i class="fas fa-male"></i> <strong>Maître Rousseau</strong> - Le notaire</li>
                                    <li><i class="fas fa-female"></i> <strong>Mme Bertin</strong> - La cuisinière</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="mystery-box">
                                    <i class="fas fa-skull fa-4x mb-3"></i>
                                    <h5>Mystère & Suspense</h5>
                                    <p>Qui a tué le Comte de Vaux ? Pourquoi ? Comment ?</p>
                                    <div class="alert">
                                        <small><i class="fas fa-exclamation-triangle"></i> Chaque personnage a ses secrets...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pourquoi participer -->
            <section class="concept-section animate-on-scroll">
                <div class="concept-card">
                    <div class="concept-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-star"></i> Pourquoi participer ?
                        </h2>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-theater-masks fa-3x feature-icon"></i>
                                    <h5 class="feature-title">Immersion totale</h5>
                                    <p class="feature-description">Incarnez votre personnage et vivez l'histoire de l'intérieur</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-users fa-3x feature-icon"></i>
                                    <h5 class="feature-title">Expérience sociale</h5>
                                    <p class="feature-description">Rencontrez de nouvelles personnes et créez des liens</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-brain fa-3x feature-icon"></i>
                                    <h5 class="feature-title">Défi intellectuel</h5>
                                    <p class="feature-description">Testez vos capacités de déduction et de logique</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action -->
            <?php if (!isLoggedIn()): ?>
            <section class="cta-section animate-on-scroll">
                <h3>
                    <i class="fas fa-mask me-2"></i>
                    Prêt à vivre l'expérience ?
                </h3>
                <p>
                    Inscrivez-vous dès maintenant pour participer à notre prochaine Murder Party 
                    et découvrir qui se cache derrière le mystère du Château de Vaux.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="/auth/inscription" class="btn btn-modern-primary btn-lg">
                        <i class="fas fa-user-plus me-2"></i>
                        S'inscrire maintenant
                    </a>
                    <a href="/infos" class="btn btn-modern-outline btn-lg">
                        <i class="fas fa-info-circle me-2"></i>
                        Plus d'informations
                    </a>
                </div>
            </section>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 