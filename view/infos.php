<?php 
$page_title = 'Infos pratiques - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles pour la page infos pratiques avec la nouvelle palette */
    .info-header {
        padding: 3rem 0;
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .info-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .info-subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .info-section {
        margin-bottom: 3rem;
    }
    
    .info-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
        height: 100%;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }
    
    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    .info-card-body {
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
    
    .schedule-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: rgba(175, 116, 129, 0.05);
        border-radius: 12px;
        border-left: 4px solid var(--old-rose);
        transition: var(--transition-smooth);
    }
    
    .schedule-item:hover {
        background: rgba(175, 116, 129, 0.1);
        transform: translateX(5px);
    }
    
    .schedule-icon {
        background: var(--gradient-primary);
        color: var(--text-light);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        box-shadow: var(--shadow-md);
        flex-shrink: 0;
    }
    
    .schedule-content h5 {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.1rem;
    }
    
    .schedule-content p {
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
    }
    
    .time-card {
        background: var(--gradient-elegant);
        color: var(--text-light);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-lg);
        height: 100%;
    }
    
    .time-card i {
        color: var(--rust-light);
        margin-bottom: 1.5rem;
    }
    
    .time-card h5 {
        color: var(--text-light);
        margin-bottom: 1.5rem;
        font-weight: 700;
    }
    
    .time-card p {
        color: rgba(255, 252, 239, 0.9);
        margin-bottom: 0.75rem;
        font-size: 1.1rem;
    }
    
    .time-card strong {
        color: var(--old-rose-light);
    }
    
    .time-card hr {
        border-color: rgba(175, 116, 129, 0.3);
        margin: 1.5rem 0;
    }
    
    .time-card small {
        color: rgba(255, 252, 239, 0.8);
        font-style: italic;
    }
    
    .location-info {
        background: rgba(175, 116, 129, 0.05);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--old-rose);
    }
    
    .location-info h5 {
        color: var(--wine);
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .location-info h6 {
        color: var(--text-primary);
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }
    
    .location-info p {
        color: var(--text-secondary);
        margin-bottom: 0.5rem;
    }
    
    .location-info ul {
        margin-bottom: 1rem;
    }
    
    .location-info li {
        color: var(--text-secondary);
        margin-bottom: 0.25rem;
    }
    
    .checklist {
        list-style: none;
        padding: 0;
    }
    
    .checklist li {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.75rem;
        background: rgba(175, 116, 129, 0.05);
        border-radius: 8px;
        transition: var(--transition-smooth);
    }
    
    .checklist li:hover {
        background: rgba(175, 116, 129, 0.1);
        transform: translateX(3px);
    }
    
    .checklist li i {
        color: var(--old-rose);
        margin-right: 0.75rem;
        width: 20px;
    }
    
    .alert-info-custom {
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .alert-info-custom i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .alert-info-custom strong {
        color: var(--wine);
    }
    
    .contact-card {
        background: var(--gradient-elegant);
        color: var(--text-light);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-lg);
        margin-top: 2rem;
    }
    
    .contact-card h4 {
        color: var(--text-light);
        margin-bottom: 1.5rem;
        font-weight: 700;
    }
    
    .contact-card p {
        color: rgba(255, 252, 239, 0.9);
        margin-bottom: 1.5rem;
    }
    
    .contact-card .btn {
        margin: 0.25rem;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="info-header animate-on-scroll">
                <h1 class="info-title">
                    <i class="fas fa-info-circle text-accent"></i> Informations pratiques
                </h1>
                <p class="info-subtitle">Tout ce que vous devez savoir pour participer</p>
            </div>

            <!-- Informations générales -->
            <section class="info-section animate-on-scroll">
                <div class="info-card">
                    <div class="info-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-map-marker-alt"></i> Lieu et Accès
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="location-info">
                                    <h5><i class="fas fa-castle me-2"></i>Château de Vaux</h5>
                                    <p class="mb-3">
                                        <i class="fas fa-map-marker-alt text-accent me-2"></i>
                                        123 Route du Château<br>
                                        10000 Troyes, France
                                    </p>
                                    
                                    <h6><i class="fas fa-car me-2"></i>En voiture</h6>
                                    <ul class="mb-3">
                                        <li>Autoroute A5, sortie 20 "Troyes Centre"</li>
                                        <li>Suivre "Château de Vaux" sur 8 km</li>
                                        <li>Parking gratuit sur place (50 places)</li>
                                    </ul>
                                    
                                    <h6><i class="fas fa-bus me-2"></i>En transport en commun</h6>
                                    <ul class="mb-0">
                                        <li>Gare SNCF de Troyes (ligne Paris-Mulhouse)</li>
                                        <li>Bus ligne 12 direction "Vaux" (arrêt "Château")</li>
                                        <li>Navette gratuite depuis la gare à 18h30</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="time-card">
                                    <i class="fas fa-clock fa-3x"></i>
                                    <h5>Horaires</h5>
                                    <p><strong>Accueil :</strong> 19h00</p>
                                    <p><strong>Début :</strong> 19h30</p>
                                    <p><strong>Fin :</strong> 23h00</p>
                                    <hr>
                                    <small>
                                        Merci d'arriver à l'heure pour ne pas manquer le début de l'intrigue !
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Programme de la soirée -->
            <section class="info-section animate-on-scroll">
                <div class="info-card">
                    <div class="info-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-calendar-alt"></i> Programme de la soirée
                        </h2>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>19h00 - 19h30 : Accueil</h5>
                                        <p>Arrivée des participants, distribution des rôles et costumes, cocktail de bienvenue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>19h30 - 20h00 : Immersion</h5>
                                        <p>Présentation des personnages, mise en situation et début de l'intrigue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-skull"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>20h00 - 20h15 : Le Crime</h5>
                                        <p>Découverte du meurtre et début de l'enquête</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>20h15 - 22h00 : Dîner-enquête</h5>
                                        <p>Repas thématique avec investigation, interrogatoires et révélations</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>22h00 - 22h30 : Accusations</h5>
                                        <p>Chaque participant expose sa théorie et désigne le coupable</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="schedule-item">
                                    <div class="schedule-icon">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 schedule-content">
                                        <h5>22h30 - 23h00 : Dénouement</h5>
                                        <p>Révélation de la solution, remise des prix et pot de l'amitié</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ce qu'il faut apporter -->
            <section class="info-section animate-on-scroll">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="info-card">
                            <div class="info-card-body">
                                <h3 class="section-title">
                                    <i class="fas fa-suitcase"></i> À apporter
                                </h3>
                                <ul class="checklist">
                                    <li><i class="fas fa-check"></i> Costume d'époque (années 1920) si possible</li>
                                    <li><i class="fas fa-check"></i> Carnet et stylo pour vos notes</li>
                                    <li><i class="fas fa-check"></i> Bonne humeur et esprit d'équipe</li>
                                    <li><i class="fas fa-check"></i> Pièce d'identité</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="info-card">
                            <div class="info-card-body">
                                <h3 class="section-title">
                                    <i class="fas fa-gift"></i> Fourni sur place
                                </h3>
                                <ul class="checklist">
                                    <li><i class="fas fa-check"></i> Fiche personnage détaillée</li>
                                    <li><i class="fas fa-check"></i> Accessoires de costume</li>
                                    <li><i class="fas fa-check"></i> Repas complet et boissons</li>
                                    <li><i class="fas fa-check"></i> Indices et documents d'enquête</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Infos importantes -->
            <section class="info-section animate-on-scroll">
                <div class="info-card">
                    <div class="info-card-body">
                        <h2 class="section-title">
                            <i class="fas fa-exclamation-circle"></i> Informations importantes
                        </h2>
                        
                        <div class="alert-info-custom">
                            <i class="fas fa-users"></i>
                            <strong>Nombre de participants :</strong> 6 à 12 personnes maximum pour garantir une expérience optimale
                        </div>
                        
                        <div class="alert-info-custom">
                            <i class="fas fa-birthday-cake"></i>
                            <strong>Âge minimum :</strong> 16 ans (les mineurs doivent être accompagnés d'un adulte)
                        </div>
                        
                        <div class="alert-info-custom">
                            <i class="fas fa-wine-glass"></i>
                            <strong>Boissons alcoolisées :</strong> Servies avec modération, alternatives sans alcool disponibles
                        </div>
                        
                        <div class="alert-info-custom">
                            <i class="fas fa-utensils"></i>
                            <strong>Régimes spéciaux :</strong> Merci de nous signaler vos allergies ou régimes alimentaires lors de l'inscription
                        </div>
                        
                        <div class="alert-info-custom">
                            <i class="fas fa-camera"></i>
                            <strong>Photos :</strong> Prises de vue autorisées pour immortaliser cette soirée unique !
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <div class="contact-card animate-on-scroll">
                <h4>
                    <i class="fas fa-envelope me-2"></i>
                    Des questions ?
                </h4>
                <p>
                    Notre équipe est à votre disposition pour répondre à toutes vos questions 
                    et vous aider à préparer cette soirée inoubliable.
                </p>
                <div>
                    <a href="mailto:contact@murderparty.local" class="btn btn-modern-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>
                        Nous contacter
                    </a>
                    <?php if (!isLoggedIn()): ?>
                    <a href="/auth/inscription" class="btn btn-modern-outline-light btn-lg">
                        <i class="fas fa-user-plus me-2"></i>
                        S'inscrire
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 