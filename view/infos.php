<?php 
$page_title = 'Infos pratiques - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Page Infos Pratiques - Reproduction exacte du design de l'image */
    
    /* Hero Section - même style que concept.php */
    .hero-infos {
        background: url('/assets/img/imageHeroFond.png') center/cover;
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-top: 0;
    }
    
    .hero-infos::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    /* Section principale avec carte en background */
    .main-section {
        position: relative;
        padding: 4rem 0;
        min-height: 600px;
        overflow: hidden;
    }

    .map-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .map-background iframe {
        width: 100%;
        height: 100%;
        border: 0;
        filter: brightness(0.7) contrast(1.1);
        pointer-events: auto;
    }

    .container-custom {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }

    .main-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
        margin-bottom: 4rem;
        max-width: 600px;
    }

    /* Section Lieu et accès (overlay sur la carte) */
    .location-section {
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #8B4513;
        margin-bottom: 2rem;
        text-transform: uppercase;
    }

    .location-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .location-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding: 1rem 0;
        border-bottom: 1px solid #E8E8E8;
    }

    .location-item:last-child {
        border-bottom: none;
    }

    .location-icon {
        background: #8B4513;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
        font-size: 0.9rem;
    }
    
    .location-content h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }
    
    .location-content p {
        font-size: 0.9rem;
        color: #666;
        margin: 0;
        line-height: 1.4;
    }



    /* Section Programme */
    .program-section {
        background: white;
        padding: 3rem 0;
        margin: 2rem 0;
    }

    .program-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #8B4513;
        text-align: center;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }



    /* Timeline verticale */
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #8B4513;
        transform: translateX(-50%);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }

    .timeline-item:nth-child(odd) {
        flex-direction: row;
    }

    .timeline-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    .timeline-content {
        background: white;
        border: 2px solid #8B4513;
        border-radius: 8px;
        padding: 1.5rem;
        width: 45%;
        position: relative;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .timeline-item:nth-child(odd) .timeline-content::before {
        content: '';
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 10px solid #8B4513;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .timeline-item:nth-child(even) .timeline-content::before {
        content: '';
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-right: 10px solid #8B4513;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .timeline-icon {
        background: #8B4513;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .timeline-time {
        font-weight: 700;
        color: #8B4513;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    
    .timeline-title {
        font-weight: 600;
        color: #333;
        font-size: 1rem;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }

    .timeline-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
        margin: 0;
    }

    /* Section FAQ */
    .faq-section {
        background: #742939;
        color: white;
        padding: 4rem 0;
    }

    .faq-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        text-align: center;
        margin-bottom: 3rem;
        text-transform: uppercase;
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .faq-accordion {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .faq-header {
        background: rgba(255, 255, 255, 0.1);
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background 0.3s ease;
    }

    .faq-header:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .faq-question {
        font-size: 1.1rem;
        font-weight: 600;
        color: white;
        margin: 0;
    }

    .faq-toggle {
        color: white;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .faq-accordion.active .faq-toggle {
        transform: rotate(180deg);
    }

    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-accordion.active .faq-content {
        max-height: 200px;
    }

    .faq-answer {
        padding: 1.5rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Section CTA avec ornements */
    .cta-section {
        background: #FFF8F0;
        padding: 4rem 0;
        position: relative;
    }

    .cta-ornaments {
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        pointer-events: none;
    }

    .cta-ornament {
        position: absolute;
        opacity: 0.3;
    }

    .cta-ornament img {
        height: 80px;
        width: auto;
    }

    .cta-ornament.top-left {
        top: 0;
        left: 0;
        transform: rotate(-90deg);
    }

    .cta-ornament.top-right {
        top: 0;
        right: 0;
        transform: rotate(0deg);
    }

    .cta-ornament.bottom-left {
        bottom: 0;
        left: 0;
        transform: rotate(180deg);
    }

    .cta-ornament.bottom-right {
        bottom: 0;
        right: 0;
        transform: rotate(90deg);
    }

    .cta-content {
        background: #742939;
        border-radius: 15px;
        padding: 3rem;
        text-align: center;
        color: white;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .cta-logo {
        margin-bottom: 2rem;
    }

    .cta-logo img {
        height: 50px;
        width: auto;
        filter: brightness(0) invert(1);
    }

    .cta-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .cta-text {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-cta {
        padding: 1rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-cta-primary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-cta-primary:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    .btn-cta-secondary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .btn-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive */
         @media (max-width: 768px) {
         .hero-title {
             font-size: 2.5rem;
         }

        .main-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .map-container {
            height: 300px;
        }

        .timeline::before {
            left: 30px;
        }

        .timeline-item {
            flex-direction: row !important;
            padding-left: 70px;
        }

        .timeline-content {
            width: 100%;
        }

        .timeline-icon {
            left: 30px;
            transform: translateX(-50%);
        }

        .timeline-item .timeline-content::before {
            left: -10px !important;
            right: auto !important;
            border-left: none !important;
            border-right: 10px solid #8B4513 !important;
        }

        .cta-content {
            padding: 2rem;
            margin: 0 1rem;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-cta {
            width: 100%;
            max-width: 280px;
            text-align: center;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-infos">
    <h1 class="hero-title">Informations pratiques</h1>
</section>

<!-- Section principale avec carte en background -->
<section class="main-section">
    <!-- Carte Google Maps en arrière-plan -->
    <div class="map-background">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10621.919343871708!2d4.1065923!3d48.2743839!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ee990455555555%3A0x6965dcc61e374165!2sMarques%20Avenue%20Troyes!5e0!3m2!1sfr!2sfr!4v1750332558907!5m2!1sfr!2sfr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

    <div class="container-custom">
        <div class="main-grid">
            <!-- Colonne gauche - Lieu et accès (overlay) -->
            <div class="location-section">
                <h2 class="section-title">Lieu et accès</h2>
                <p style="color: #8B4513; font-style: italic; margin-bottom: 2rem;">Les derniers fils</p>
                
                <ul class="location-list">
                    <li class="location-item">
                        <div class="location-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="location-content">
                            <h4>Château de Vaux-sur-Seine (Adresse)</h4>
                            <p>123 Route du Château, 10000 Troyes</p>
                        </div>
                    </li>
                    
                    <li class="location-item">
                        <div class="location-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="location-content">
                            <h4>03 25 XX XX XX</h4>
                                </div>
                    </li>
                    
                    <li class="location-item">
                        <div class="location-icon">
                            <i class="fas fa-car"></i>
                            </div>
                        <div class="location-content">
                            <h4>En voiture</h4>
                            <p>Autoroute A5, sortie 20 "Troyes Centre"<br>
                            Suivre "Château de Vaux" sur 8 km<br>
                            Parking gratuit sur place (50 places)</p>
                                </div>
                    </li>
                    
                    <li class="location-item">
                        <div class="location-icon">
                            <i class="fas fa-train"></i>
                            </div>
                        <div class="location-content">
                            <h4>En transport en commun</h4>
                            <p>Gare SNCF de Troyes (ligne Paris-Mulhouse)<br>
                            Bus ligne 12 direction "Vaux" (arrêt "Château")<br>
                            Navette gratuite depuis la gare à 18h30</p>
                        </div>
                    </li>
                </ul>
            </div>
            

                    </div>
                </div>
            </section>

<!-- Section Programme -->
<section class="program-section">
    <div class="container-custom">
                 <h2 class="program-title">Programme de la soirée</h2>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">19h00 - 19h30</div>
                    <div class="timeline-title">Accueil</div>
                    <p class="timeline-description">Arrivée des participants, distribution des rôles et costumes, cocktail de bienvenue</p>
                                    </div>
                                </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">19h30 - 20h00</div>
                    <div class="timeline-title">Immersion</div>
                    <p class="timeline-description">Présentation des personnages, mise en situation et début de l'intrigue</p>
                                    </div>
                                </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-skull"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">20h00 - 20h15</div>
                    <div class="timeline-title">Le Crime</div>
                    <p class="timeline-description">Découverte du meurtre et début de l'enquête</p>
                                    </div>
                                </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">20h15 - 22h00</div>
                    <div class="timeline-title">Dîner-enquête</div>
                    <p class="timeline-description">Repas thématique avec investigation, interrogatoires et révélations</p>
                                    </div>
                                </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">22h00 - 22h30</div>
                    <div class="timeline-title">Accusations</div>
                    <p class="timeline-description">Chaque participant expose sa théorie et désigne le coupable</p>
                                    </div>
                                </div>
            
            <div class="timeline-item">
                <div class="timeline-icon">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                <div class="timeline-content">
                    <div class="timeline-time">22h30 - 23h00</div>
                    <div class="timeline-title">Dénouement</div>
                    <p class="timeline-description">Révélation de la solution, remise des prix et pot de l'amitié</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<!-- Section FAQ -->
<section class="faq-section">
    <div class="faq-container">
        <h2 class="faq-title">FAQ</h2>
        
        <div class="faq-accordion" onclick="toggleFAQ(this)">
            <div class="faq-header">
                <h3 class="faq-question">Informations importantes</h3>
                <span class="faq-toggle">▼</span>
            </div>
            <div class="faq-content">
                <div class="faq-answer">
                    <p><strong>Nombre de participants :</strong> 6 à 12 personnes maximum pour garantir une expérience optimale</p>
                    <p><strong>Âge minimum :</strong> 16 ans (les mineurs doivent être accompagnés d'un adulte)</p>
                    <p><strong>Boissons alcoolisées :</strong> Servies avec modération, alternatives sans alcool disponibles</p>
                            </div>
                        </div>
                    </div>
        
        <div class="faq-accordion" onclick="toggleFAQ(this)">
            <div class="faq-header">
                <h3 class="faq-question">À apporter</h3>
                <span class="faq-toggle">▼</span>
                            </div>
            <div class="faq-content">
                <div class="faq-answer">
                    <p>✓ Costume d'époque (années 1920) si possible</p>
                    <p>✓ Carnet et stylo pour vos notes</p>
                    <p>✓ Bonne humeur et esprit d'équipe</p>
                    <p>✓ Pièce d'identité</p>
                </div>
                        </div>
                        </div>
                        
        <div class="faq-accordion" onclick="toggleFAQ(this)">
            <div class="faq-header">
                <h3 class="faq-question">Fourni sur place</h3>
                <span class="faq-toggle">▼</span>
                        </div>
            <div class="faq-content">
                <div class="faq-answer">
                    <p>✓ Fiche personnage détaillée</p>
                    <p>✓ Accessoires de costume</p>
                    <p>✓ Repas complet et boissons</p>
                    <p>✓ Indices et documents d'enquête</p>
                        </div>
                        </div>
                    </div>
                </div>
            </section>

<!-- Section CTA avec ornements -->
<section class="cta-section">
    <div class="cta-ornaments">
        <div class="cta-ornament top-left">
            <img src="/assets/img/ornementCoint.png" alt="Ornement" />
        </div>
        <div class="cta-ornament top-right">
            <img src="/assets/img/ornementCoint.png" alt="Ornement" />
        </div>
        <div class="cta-ornament bottom-left">
            <img src="/assets/img/ornementCoint.png" alt="Ornement" />
        </div>
        <div class="cta-ornament bottom-right">
            <img src="/assets/img/ornementCoint.png" alt="Ornement" />
        </div>
    </div>
    
    <div class="container-custom">
        <div class="cta-content">
            <div class="cta-logo">
                <img src="/assets/img/logo.svg" alt="Logo" />
            </div>
            
            <h2 class="cta-title">Des questions ?</h2>
            <p class="cta-text">
                Notre équipe est à votre disposition pour répondre à 
                toutes vos questions et vous aider à préparer cette 
                soirée inoubliable.
            </p>
            
            <div class="cta-buttons">
                <a href="mailto:contact@murderparty.local" class="btn-cta btn-cta-primary">Envoyer Maintenant</a>
                <a href="/auth/inscription" class="btn-cta btn-cta-secondary">Nous contacter</a>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFAQ(element) {
    element.classList.toggle('active');
}
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 