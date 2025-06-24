<?php 
$page_title = 'Concept - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Reset pour la page concept */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: #f5e6e8;
    }

    /* Hero section avec image de fond */
    .concept-hero {
        background: url('/assets/img/imageHeroFond.png') center/cover;
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-top: 0;
    }
    
    .concept-hero::before {
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

    /* Container principal */
    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Section ornement décoratif en haut */
    .ornament-header {
        background: #f5e6e8;
        padding: 3rem 0 1rem 0;
        text-align: center;
    }

    .ornament-header img {
        height: 80px;
        width: auto;
    }

    /* Section Qu'est-ce qu'une Murder Party - Style exact de l'image */
    .what-is-section {
        background: #742939;
        padding: 4rem 0;
        color: white;
        position: relative;
    }

    .what-is-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: flex-start;
        gap: 4rem;
    }

    .what-is-content {
        flex: 2;
    }

    .what-is-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 2rem;
        text-transform: uppercase;
        color: white;
    }

    .what-is-text {
        font-size: 0.95rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
        text-align: justify;
    }

    .what-is-text p {
        margin-bottom: 1rem;
    }

    .what-is-icons {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
    }
    
    .icon-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }

    .icon-circle {
        background: rgba(255, 255, 255, 0.15);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .icon-label {
        font-size: 0.9rem;
        text-align: center;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
        text-transform: uppercase;
    }

    /* Section Comment ça marche */
    .how-it-works-section {
        background: #f5e6e8;
        padding: 4rem 0;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .step-card {
        background: #A94803;
        color: white;
        border-radius: 12px;
        padding: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .step-number {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .step-content h3 {
        font-size: 1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }
    
    .step-content p {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
        line-height: 1.5;
    }

    /* Section ornement central */
    .ornament-divider-section {
        background: #f5e6e8;
        padding: 3rem 0;
        text-align: center;
    }

    .ornament-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .ornament-line {
        flex: 1;
        height: 2px;
        background: linear-gradient(to right, transparent, #742939, transparent);
    }

    .ornament-center {
        flex-shrink: 0;
    }

    .ornament-center img {
        height: 80px;
        width: auto;
        opacity: 0.8;
    }

    /* Section LES DERNIERS FILS - Logo SVG */
    .badge-section {
        background: #f5e6e8;
        padding: 2rem 0;
        text-align: center;
    }

    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo-container img {
        height: 150px;
        width: auto;
        max-width: 300px;
    }

    /* Section Notre Murder Party */
    .our-story-section {
        background: #f5e6e8;
        padding: 3rem 0;
    }

    .story-layout {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 3rem;
        align-items: start;
    }

    .story-content {
        /* Pas de container - texte libre */
    }

    .story-subtitle {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    .story-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #5a5a5a;
        margin-bottom: 1rem;
        text-align: justify;
    }

    .story-image {
        height: 250px;
        border-radius: 8px;
        overflow: hidden;
    }

    .story-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Section Les personnages */
    .characters-section {
        background: #f5e6e8;
        padding: 4rem 0;
    }

    .characters-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .characters-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .characters-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        max-width: 900px;
        margin: 0 auto;
    }

    .character-card {
        transition: all 0.3s ease;
        text-align: center;
    }

    .character-card:hover {
        transform: translateY(-5px);
    }

    .character-card img {
        width: 100%;
        height: 180px;
        object-fit: contain;
        border-radius: 8px;
    }

    /* Section Mystère à résoudre */
    .mystery-section {
        background: #742939;
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .mystery-button {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        padding: 1.5rem 3rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        display: inline-block;
        margin-bottom: 2rem;
    }

    .mystery-button:hover {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        transform: translateY(-2px);
    }

    .mystery-text {
        max-width: 600px;
        margin: 0 auto;
        font-size: 1rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Section Pourquoi participer */
    .why-participate-section {
        background: #f5e6e8;
        padding: 4rem 0;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        max-width: 1000px;
        margin: 3rem auto 0;
    }

    .benefit-card {
        text-align: center;
        padding: 2rem;
    }

    .benefit-icon {
        background: #742939;
        color: white;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
    }

    .benefit-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .benefit-text {
        font-size: 0.9rem;
        color: #5a5a5a;
        line-height: 1.5;
        margin: 0;
    }
    
    /* Section finale avec ornement */
    .final-section {
        background: #742939;
        color: white;
        padding: 4rem 0;
        text-align: center;
        position: relative;
    }

    .final-ornament {
        position: absolute;
        bottom: -30px;
        right: 30px;
        opacity: 0.3;
        transform: rotate(90deg);
    }

    .final-ornament img {
        height: 100px;
        width: auto;
        filter: brightness(0) invert(1);
    }

    .final-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    .final-text {
        max-width: 600px;
        margin: 0 auto 2rem;
        font-size: 1rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
    }

    .final-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-primary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 1rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: transparent;
        color: white;
        padding: 1rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        border: 2px solid rgba(255, 255, 255, 0.5);
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .what-is-container {
            flex-direction: column;
            gap: 2rem;
        }

        .what-is-icons {
            flex-direction: row;
            justify-content: center;
            gap: 1rem;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }

        .steps-grid {
            grid-template-columns: 1fr;
        }

        .story-layout {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .characters-grid {
            grid-template-columns: 1fr;
        }

        .benefits-grid {
            grid-template-columns: 1fr;
        }

        .final-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<!-- Hero Section -->
<section class="concept-hero">
    <h1 class="hero-title">Concept</h1>
</section>

<!-- Ornement décoratif -->
<section class="ornament-header">
    <img src="/assets/img/ornement2.png" alt="Ornement décoratif" />
</section>

<!-- Section Qu'est-ce qu'une Murder Party -->
<section class="what-is-section">
    <div class="what-is-container">
        <div class="what-is-content">
            <h2 class="what-is-title">Qu'est-ce qu'une Murder Party ?</h2>
            <div class="what-is-text">
                <p>Une Murder Party est un jeu de rôle grandeur nature où les participants incarnent des personnages dans une histoire policière interactive. L'objectif ? Résoudre un mystérieux meurtre en collectant des indices, en interrogeant les suspects et en démasquant le coupable.</p>
                
                <p>Contrairement à un escape game classique, ici vous êtes les personnages de l'histoire. Chaque participant reçoit un rôle avec ses propres secrets, motivations et alibis.</p>
                
                <p>L'enquête se déroule pendant un véritable dîner où les révélations, les confrontations et les rebondissements s'enchaînent jusqu'au dénouement final.</p>
                
                <p>Chaque Murder Party propose un scénario unique avec des personnages complexes et une intrigue captivante qui vous plongera dans l'univers du polar.</p>
                
                <p>L'ambiance, les costumes et le décor contribuent à créer une expérience immersive où la frontière entre réalité et fiction s'estompe.</p>
            </div>
        </div>
        <div class="what-is-icons">
            <div class="icon-item">
                <div class="icon-circle">
                    <i class="fas fa-file-alt"></i>
                            </div>
                <div class="icon-label">Scénario</div>
                                </div>
            <div class="icon-item">
                <div class="icon-circle">
                    <i class="fas fa-search"></i>
                            </div>
                <div class="icon-label">Enquête</div>
                        </div>
                    </div>
                </div>
            </section>

<!-- Section Comment ça marche -->
<section class="how-it-works-section">
    <div class="main-container">
        <div class="section-header">
            <h2 class="section-title">Comment ça marche ?</h2>
        </div>
        
        <div class="steps-grid">
            <div class="step-card">
                                        <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Attribution des rôles</h3>
                    <p>Chaque participant reçoit son personnage avec une fiche détaillée incluant identité, background et secrets.</p>
                                    </div>
                                </div>
            
            <div class="step-card">
                                        <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Le crime</h3>
                    <p>Un meurtre est commis ! L'enquête commence et tous les participants deviennent des suspects potentiels.</p>
                                    </div>
                                </div>
            
            <div class="step-card">
                                        <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Investigation</h3>
                    <p>Fouille des lieux, interrogatoires, analyse d'indices... Tout se passe pendant le repas !</p>
                                    </div>
                                </div>
            
            <div class="step-card">
                                        <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Révélation</h3>
                                        <p>Chacun expose sa théorie. Le coupable est démasqué et l'histoire révélée !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
</section>

<!-- Ornement divider -->
<section class="ornament-divider-section">
    <div class="ornament-divider">
        <div class="ornament-line"></div>
        <div class="ornament-center">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement central" />
                    </div>
        <div class="ornament-line"></div>
                </div>
            </section>

<!-- Logo LES DERNIERS FILS -->
<section class="badge-section">
    <div class="logo-container">
        <img src="/assets/img/logo.svg" alt="Les derniers fils - Notre Murder Party" />
                        </div>
</section>

<!-- Section L'histoire -->
<section class="our-story-section">
    <div class="story-layout">
        <div class="story-content">
            <h3 class="story-subtitle">L'histoire</h3>
            <p class="story-text">
                Troyes, 1995. Une soirée d'adieux dans une usine emblématique qui ferme ses portes après des décennies d'activité. 
                Les anciens employés se retrouvent pour un dernier hommage, mais les retrouvailles révèlent des secrets enfouis.
            </p>
            <p class="story-text">
                Quand l'un des participants est retrouvé mort, l'ambiance festive se transforme en enquête policière. 
                Qui parmi les invités cache la vérité ? Quel secret justifie un meurtre ?
            </p>
            <p class="story-text">
                À vous de découvrir ce qui s'est vraiment passé dans cette usine aux mille mystères. 
                Chaque personnage a ses raisons, ses motivations et ses secrets. L'enquête promet d'être riche en rebondissements.
            </p>
                            </div>
        <div class="story-image">
            <img src="/assets/img/Image_scénario_Placeholder.png" alt="Image du scénario" />
                                    </div>
                                </div>
</section>

<!-- Section Les personnages -->
<section class="characters-section">
    <div class="main-container">
        <div class="characters-header">
            <h2 class="characters-title">Les personnages</h2>
                            </div>
        
                <div class="characters-grid">
            <div class="character-card">
                <img src="/assets/img/perso1.svg" alt="Personnage 1" />
            </div>
            <div class="character-card">
                <img src="/assets/img/perso2.svg" alt="Personnage 2" />
            </div>
            <div class="character-card">
                <img src="/assets/img/perso3.svg" alt="Personnage 3" />
            </div>
            <div class="character-card">
                <img src="/assets/img/perso4.svg" alt="Personnage 4" />
            </div>
            <div class="character-card">
                <img src="/assets/img/perso5.svg" alt="Personnage 5" />
            </div>
            <div class="character-card">
                <img src="/assets/img/perso6.svg" alt="Personnage 6" />
            </div>
        </div>
                </div>
            </section>

<!-- Section Mystère à résoudre -->
<section class="mystery-section">
    <div class="main-container">
        <a href="#" class="mystery-button">Mystère à résoudre</a>
        <p class="mystery-text">
            Qui a tué la victime ? Comment ? Pourquoi ? 
            Plongez dans une enquête palpitante où chaque détail compte et où rien n'est laissé au hasard. 
            Votre mission : démêler les fils de cette affaire complexe et découvrir la vérité cachée derrière ce drame.
        </p>
    </div>
</section>

<!-- Section Pourquoi participer -->
<section class="why-participate-section">
    <div class="main-container">
        <div class="section-header">
            <h2 class="section-title">Pourquoi participer ?</h2>
                                </div>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-theater-masks"></i>
                            </div>
                <h3 class="benefit-title">Immersion totale</h3>
                <p class="benefit-text">Incarnez votre personnage et vivez l'histoire de l'intérieur dans une expérience théâtrale unique.</p>
                                </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-users"></i>
                            </div>
                <h3 class="benefit-title">Expérience sociale</h3>
                <p class="benefit-text">Rencontrez de nouvelles personnes et créez des liens dans une ambiance conviviale et stimulante.</p>
                                </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-brain"></i>
                            </div>
                <h3 class="benefit-title">Défi intellectuel</h3>
                <p class="benefit-text">Testez vos capacités de déduction et de logique dans une enquête criminelle passionnante.</p>
                        </div>
                    </div>
                </div>
            </section>

<!-- Section finale -->
<section class="final-section">
    <div class="main-container">
        <h2 class="final-title">Prêt à résoudre le mystère ?</h2>
        <p class="final-text">
            Rejoignez-nous pour cette soirée inoubliable d'enquête et de suspense. 
            Découvrez l'univers fascinant de la Murder Party et vivez une expérience que vous n'oublierez jamais.
        </p>
        <div class="final-buttons">
            <a href="/auth/inscription" class="btn-primary">Participer maintenant</a>
            <a href="/infos" class="btn-secondary">Plus d'informations</a>
        </div>
    </div>
    <div class="final-ornament">
        <img src="/assets/img/ornementCoint.png" alt="Ornement final" />
</div>
</section>

<?php require_once('view/autres_pages/footer.php'); ?> 