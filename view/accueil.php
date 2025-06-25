<?php 
$page_title = 'Accueil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Hero section */
    .hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 0 5%;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/imageHeroFond.png');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: #fff;
        margin: 0;
    }

    .hero-content {
        max-width: 800px;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
        text-transform: uppercase;
    }

    .hero-subtitle {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 500;
        margin-bottom: 2rem;
        text-transform: uppercase;
    }

    .hero-description {
        font-size: 1.2rem;
        line-height: 1.6;
        margin-bottom: 3rem;
        max-width: 600px;
    }

    .hero-buttons {
        display: flex;
        gap: 1.5rem;
    }

    .btn-hero {
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 500;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-hero-primary {
        background: #742939;
        color: #fff;
        border: none;
    }

    .btn-hero-primary:hover {
        background: #8a3144;
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-hero-outline {
        background: transparent;
        color: #fff;
        border: 2px solid #fff;
    }

    .btn-hero-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 3rem;
        }

        .hero-subtitle {
            font-size: 1.5rem;
        }

        .hero-description {
            font-size: 1.1rem;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .btn-hero {
            width: 100%;
            text-align: center;
        }
    }

    /* Section introduction avec ornement */
    .intro-section {
        background: linear-gradient(to bottom, #f5e6e8, #e8d5d8, #f5e6e8);
        padding: 4rem 0;
        text-align: center;
        position: relative;
        width: 100%;
    }

    .intro-content {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        padding: 0 1rem;
    }

    .ornament-top {
        display: flex;
        justify-content: center;
        margin: 2rem 0;
    }

    .ornament-top img {
        height: 120px;
        width: auto;
        max-width: 100%;
        opacity: 0.8;
    }

    .intro-text {
        margin: 3rem 0;
    }

    .intro-location {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 600;
        color: #742939;
        margin-bottom: 1rem;
    }

    .intro-description {
        font-size: 1.1rem;
        color: #5a5a5a;
        margin-bottom: 0.5rem;
        font-style: italic;
    }

    .intro-subtitle {
        font-size: 1.1rem;
        color: #5a5a5a;
        margin-bottom: 0;
    }

    /* Vidéo centrale */
    .video-container {
        width: 100%;
        max-width: 800px;
        margin: 3rem auto;
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.3);
    }

    .video-container video {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 15px;
    }

    .intro-story {
        margin: 3rem 0;
        padding: 2rem 0;
    }

    .story-line {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 600;
        color: #742939;
        margin-bottom: 0.8rem;
        line-height: 1.4;
    }

    .story-line:last-child {
        margin-bottom: 0;
    }

    /* Effet de rayures subtiles en arrière-plan */
    .intro-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        pointer-events: none;
    }

    /* Conteneur principal avec la même largeur que le header */
    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Section Prochaine Murder Party */
    .event-info-section {
        background: linear-gradient(to bottom, #f5e6e8, #e8d5d8, #f5e6e8);
        padding: 4rem 0;
        position: relative;
    }

    .event-info-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }

    .event-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .event-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .event-subtitle {
        font-size: 1.1rem;
        color: #8B4513;
        font-style: italic;
        margin: 0;
    }

    .event-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .event-card {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(116, 41, 57, 0.1);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
    }

    .event-icon {
        background: #742939;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
    }

    .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .card-info {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .card-detail {
        font-size: 1rem;
        color: #8B4513;
        margin: 0;
        text-transform: uppercase;
        font-weight: 500;
    }

    .event-alert {
        background: #742939;
        border-radius: 15px;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        color: white;
    }

    .alert-icon {
        background: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .alert-content {
        flex-grow: 1;
    }

    .alert-content strong {
        font-size: 1.2rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .alert-content p {
        margin: 0;
        opacity: 0.9;
    }

    .btn-participate {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .btn-participate:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .event-info-section {
            padding: 3rem 0;
        }

        .event-title {
            font-size: 1.8rem;
        }

        .event-cards {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .event-card {
            padding: 1.5rem;
        }

        .event-alert {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .btn-participate {
            width: 100%;
            text-align: center;
                 }
     }

    /* Section Les personnages */
    .characters-section {
        background: linear-gradient(to bottom, #f5e6e8, #e8d5d8, #f5e6e8);
        padding: 4rem 0;
        position: relative;
    }

    .characters-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }

    .characters-header {
        position: relative;
        text-align: center;
        margin-bottom: 3rem;
        padding: 2rem 0;
    }

    .corner-ornament {
        position: absolute;
        width: 80px;
        height: 80px;
    }

    .corner-ornament.top-left {
        top: 0;
        left: 0;
        transform: scaleX(-1);
    }

    .corner-ornament.top-right {
        top: 0;
        right: 0;
        transform: rotate(0deg);
    }

    .corner-ornament img {
        width: 100%;
        height: 100%;
        opacity: 0.7;
    }

    .characters-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .characters-subtitle {
        font-size: 1.1rem;
        color: #8B4513;
        font-style: italic;
        margin: 0;
    }

    .characters-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 1rem;
        margin: 3rem auto;
        max-width: 900px;
    }

    .character-card {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .character-card:hover {
        transform: translateY(-5px);
    }

    .character-card img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .placeholder-text {
        color: rgba(116, 41, 57, 0.7);
        font-style: italic;
        font-weight: 500;
        text-align: center;
        font-size: 0.9rem;
    }

    /* Border-radius spécifiques */
    .top-left-rounded {
        border-radius: 120px 0px 0px 0px !important;
    }

    .top-left-rounded img {
        border-radius: 120px 0px 0px 0px !important;
    }

    .bottom-right-rounded {
        border-radius: 0px 0px 120px 0px !important;
    }

    .bottom-right-rounded img {
        border-radius: 0px 0px 120px 0px !important;
    }

    /* Positionnement en grille 4x2 */
    .grid-1 { grid-column: 1; grid-row: 1; }
    .grid-2 { grid-column: 2; grid-row: 1; }
    .grid-3 { grid-column: 3; grid-row: 1; }
    .grid-4 { grid-column: 4; grid-row: 1; }
    .grid-5 { grid-column: 1; grid-row: 2; }
    .grid-6 { grid-column: 2; grid-row: 2; }
    .grid-7 { grid-column: 3; grid-row: 2; }
    .grid-8 { grid-column: 4; grid-row: 2; }

    .concept-button-container {
        background: transparent;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-concept {
        background: #742939;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.3);
    }

    .btn-concept:hover {
        background: #8a3144;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(116, 41, 57, 0.4);
    }



    @media (max-width: 768px) {
        .characters-section {
            padding: 3rem 0;
        }

        .characters-title {
            font-size: 1.8rem;
        }

        .corner-ornament {
            width: 50px;
            height: 50px;
        }

        .characters-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(4, 1fr);
            margin: 2rem auto;
            max-width: 100%;
        }

        .grid-1 { grid-column: 1; grid-row: 1; }
        .grid-2 { grid-column: 2; grid-row: 1; }
        .grid-3 { grid-column: 1; grid-row: 2; }
        .grid-4 { grid-column: 2; grid-row: 2; }
        .grid-5 { grid-column: 1; grid-row: 3; }
        .grid-6 { grid-column: 2; grid-row: 3; }
        .grid-7 { grid-column: 1; grid-row: 4; }
        .grid-8 { grid-column: 2; grid-row: 4; }

        .placeholder-text {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 768px) {
        .intro-section {
            padding: 3rem 0;
        }

        .intro-content {
            padding: 0 1rem;
        }

        .ornament-top img {
            height: 80px;
        }

        .intro-location {
            font-size: 1.2rem;
        }

        .story-line {
            font-size: 1.2rem;
        }

        .intro-description, .intro-subtitle {
            font-size: 1rem;
        }

        .video-container {
            margin: 2rem auto;
            max-width: 95%;
        }

        .main-container {
            padding: 0 1rem;
        }
    }

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
    
    /* Section Informations importantes */
    .important-info-section {
        background: linear-gradient(to bottom, #f5e6e8, #e8d5d8, #f5e6e8);
        padding: 4rem 0;
        position: relative;
    }

    .important-info-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }

    .info-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .info-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .info-subtitle {
        font-size: 1.1rem;
        color: #8B4513;
        font-style: italic;
        margin: 0;
    }

    .info-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(116, 41, 57, 0.1);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
    }

    .info-card-icon {
        background: #742939;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
    }

    .info-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .info-card-text {
        font-size: 1rem;
        color: #5a5a5a;
        line-height: 1.6;
        margin: 0;
    }

    /* Section Statistiques - Nouveau style */
    .stats-section {
        background: #742939;
        padding: 3rem 0;
        position: relative;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0;
        max-width: 1000px;
        margin: 0 auto;
    }

    .stat-card {
        text-align: center;
        padding: 2rem 1rem;
        color: #ffffff !important;
        position: relative;
    }

    .stat-card:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 0;
        top: 20%;
        bottom: 20%;
        width: 1px;
        background: rgba(255, 255, 255, 0.2);
    }

    .stat-number-home {
        font-size: 2.5rem !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        display: block !important;
        margin-bottom: 0.5rem !important;
        line-height: 1 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
    }

    .stat-label-home {
        font-size: 0.9rem !important;
        color: #ffffff !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        letter-spacing: 0.5px !important;
        opacity: 0.9 !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
    }

    /* Section Témoignages - Nouveau style */
    .testimonials-section {
        background: linear-gradient(to bottom, #f5e6e8, #e8d5d8, #f5e6e8);
        padding: 4rem 0;
        position: relative;
    }

    .testimonials-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }

    .testimonials-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .testimonials-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }

    .testimonials-subtitle {
        font-size: 1.3rem;
        font-weight: 600;
        color: #8B4513;
        margin: 0;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .testimonial-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(116, 41, 57, 0.1);
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
    }

    .testimonial-content {
        width: 100%;
    }

    .testimonial-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 0.25rem;
    }

    .testimonial-role {
        font-size: 0.9rem;
        color: #8B4513;
        margin-bottom: 0.75rem;
        font-style: italic;
    }

    .testimonial-text {
        font-size: 0.95rem;
        color: #5a5a5a;
        line-height: 1.5;
        margin-bottom: 0.75rem;
    }

    .testimonial-rating {
        display: flex;
        gap: 2px;
        margin-bottom: 0.5rem;
    }

    .testimonial-rating i {
        color: #D4A574;
        font-size: 0.8rem;
    }

    .testimonial-date {
        font-size: 0.8rem;
        color: #999;
        font-style: italic;
        margin: 0;
    }

    /* Section Call to Action Final */
    .final-cta-section {
        background: #742939;
        padding: 4rem 0;
        position: relative;
    }

    .final-cta-card {
        text-align: center;
        color: white;
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-ornement {
        margin-bottom: 2rem;
    }

    .cta-ornement img {
        height: 80px;
        width: auto;
        opacity: 0.8;
        filter: brightness(0) invert(1);
    }

    .final-cta-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    .final-cta-text {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-final-cta {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-final-cta:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Section Partenaires */
    .partners-section {
        background: white;
        padding: 4rem 0;
        position: relative;
    }

    .partners-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .partners-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .partners-subtitle {
        font-size: 1.1rem;
        color: #8B4513;
        font-style: italic;
        margin: 0;
    }

    .partners-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-top: 3rem;
        align-items: center;
    }

    .partner-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(116, 41, 57, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 120px;
    }

    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
    }

    .partner-card img {
        max-width: 100%;
        max-height: 80px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(1);
        transition: filter 0.3s ease;
    }

    .partner-card:hover img {
        filter: grayscale(0);
    }

    /* Responsive pour les nouvelles sections */
    @media (max-width: 768px) {
        .important-info-section,
        .testimonials-section {
            padding: 3rem 0;
        }

        .info-title,
        .testimonials-title {
            font-size: 1.8rem;
        }

        .info-cards,
        .testimonials-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .info-card,
        .testimonial-card {
            padding: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .stat-card:nth-child(2)::after,
        .stat-card:nth-child(4)::after {
            display: none;
        }

        .stat-card:nth-child(1)::after,
        .stat-card:nth-child(3)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            bottom: 20%;
            width: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .testimonial-card {
            flex-direction: column;
            text-align: center;
        }

        .final-cta-section {
            padding: 3rem 0;
        }

        .final-cta-title {
            font-size: 2rem;
        }

        .final-cta-text {
            font-size: 1.1rem;
        }

        .btn-final-cta {
            width: 100%;
            max-width: 300px;
        }

        .partners-section {
            padding: 3rem 0;
        }

        .partners-title {
            font-size: 1.8rem;
        }

        .partners-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card::after {
            display: none !important;
        }

        .stat-number-home {
            font-size: 2rem !important;
            color: #ffffff !important;
        }
        
        .stat-label-home {
            color: #ffffff !important;
        }



        .final-cta-title {
            font-size: 1.7rem;
        }

        .partners-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .partner-card {
            padding: 1.5rem;
            min-height: 100px;
        }

        .partner-card img {
            max-height: 60px;
        }
    }
</style>

<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Les derniers fils</h1>
        <h2 class="hero-subtitle">Plongez dans le Mystère</h2>
        <p class="hero-description">
                        Une enquête palpitante vous attend dans cette soirée immersive unique. 
                        Découvrez qui est le coupable, analysez les indices et vivez une expérience 
                        inoubliable au cœur d'un véritable thriller.
                    </p>
        <div class="hero-buttons">
            <a href="/auth/inscription" class="btn-hero btn-hero-primary">Participer à l'événement</a>
            <a href="/concept" class="btn-hero btn-hero-outline">Découvrir le concept</a>
        </div>
    </div>
</section>

<!-- Section introduction avec ornement -->
<section class="intro-section">
    <div class="intro-content">
        <div class="ornament-top">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement décoratif" />
                    </div>
        
        <div class="intro-text">
            <p class="intro-location">Troyes, 1995.</p>
            <p class="intro-description">Une soirée d'adieux dans une usine emblématique.</p>
            <p class="intro-subtitle">Les retrouvailles révèlent des secrets. Rien ne se passera comme prévu.</p>
                </div>
        
                <!-- Vidéo de présentation -->
        <div class="video-container">
            <video controls preload="metadata" poster="/assets/img/imageHeroFond.png">
                <source src="/assets/video/video.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la lecture de vidéos HTML5.
            </video>
        </div>
            
        <div class="intro-story">
            <p class="story-line">Une soirée d'adieux qui tourne au drame.</p>
            <p class="story-line">Une usine pleine de secrets.</p>
            <p class="story-line">À vous de découvrir ce qui s'est vraiment passé.</p>
                        </div>
                        </div>
</section>

<!-- Section Prochaine Murder Party -->
<section class="event-info-section">
    <div class="main-container">
        <div class="event-header">
            <h2 class="event-title">Prochaine Murder Party</h2>
            <p class="event-subtitle">Toutes les informations essentielles pour votre participation</p>
                    </div>
                    
        <div class="event-cards">
            <div class="event-card">
                <div class="event-icon">
                    <i class="fas fa-clock"></i>
                        </div>
                <h3 class="card-title">Quand ?</h3>
                <p class="card-info">Samedi 29 juin 2024</p>
                <p class="card-detail">de 19h00 à 23h00</p>
                        </div>
            
            <div class="event-card">
                <div class="event-icon">
                    <i class="fas fa-map-marker-alt"></i>
                        </div>
                <h3 class="card-title">Où ?</h3>
                <p class="card-info">Château de Vaux</p>
                <p class="card-detail">10000 Troyes</p>
                    </div>
            
            <div class="event-card">
                <div class="event-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="card-title">Participants</h3>
                <p class="card-info">7 à 30 joueurs</p>
                <p class="card-detail">À partir de 16 ans</p>
            </div>
            
            <div class="event-card">
                <div class="event-icon">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <h3 class="card-title">Tarif</h3>
                <p class="card-info">à partir de 19,99€ par personne</p>
            </div>
        </div>
        
        <div class="event-alert">
            <div class="alert-icon">
                <i class="fas fa-exclamation-triangle"></i>
                                    </div>
            <div class="alert-content">
                <strong>Places limitées !</strong>
                <p>Inscrivez-vous rapidement pour ne pas manquer cette expérience unique.</p>
                                    </div>
            <div class="alert-action">
                <a href="/auth/inscription" class="btn-participate">Participer à l'événement</a>
                                </div>
                            </div>
    </div>
</section>

<!-- Section Les personnages -->
<section class="characters-section">
    <div class="main-container">
        <div class="characters-header">
            <div class="corner-ornament top-left">
                <img src="/assets/img/ornementCoint.png" alt="Ornement coin" />
                                    </div>
            <div class="corner-ornament top-right">
                <img src="/assets/img/ornementCoint.png" alt="Ornement coin" />
                                    </div>
            
            <h2 class="characters-title">Les personnages</h2>
            <p class="characters-subtitle">Ils seront présents lors de la dernière réunion</p>
                                </div>
        
                <div class="characters-grid">
            <!-- Première ligne -->
            <div class="character-card grid-1 top-left-rounded">
                <img src="/assets/img/persoaccueil1.png" alt="Personnage 1" />
            </div>
            
            <div class="character-card grid-2">
                <img src="/assets/img/persoaccueil2.png" alt="Personnage 2" />
            </div>
            
            <div class="character-card grid-3">
                <img src="/assets/img/persoaccueil3.png" alt="Personnage 3" />
            </div>
            
            <div class="concept-button-container grid-4">
                <a href="/concept" class="btn-concept">Concept</a>
            </div>
            
            <!-- Deuxième ligne -->
            <div class="character-card grid-5">
                <img src="/assets/img/persoaccueil4.png" alt="Personnage 4" />
            </div>
            
            <div class="character-card grid-6">
                <img src="/assets/img/persoaccueil5.png" alt="Personnage 5" />
            </div>
            
            <div class="character-card grid-7">
                <img src="/assets/img/persoaccueil6.png" alt="Personnage 6" />
            </div>
            
            <div class="character-card grid-8 bottom-right-rounded">
                <img src="/assets/img/persoaccueil7.png" alt="Personnage 7" />
            </div>
        </div>
                        </div>
</section>

<!-- Section Informations importantes -->
<section class="important-info-section">
    <div class="main-container">
        <div class="info-header">
            <h2 class="info-title">Informations importantes</h2>
            <p class="info-subtitle">Tout ce que vous devez savoir pour bien vous préparer</p>
                                </div>
        
        <div class="info-cards">
            <div class="info-card">
                <div class="info-card-icon">
                    <i class="fas fa-mask"></i>
                            </div>
                <h3 class="info-card-title">Costumes</h3>
                <p class="info-card-text">Chaque participant doit porter un déguisement en accord avec le thème de l'événement. Laissez-vous guider par votre créativité !</p>
                        </div>
            
            <div class="info-card">
                <div class="info-card-icon">
                    <i class="fas fa-utensils"></i>
                    </div>
                <h3 class="info-card-title">Repas</h3>
                <p class="info-card-text">Profitez du buffet et des boissons comprises dans le tarif. Le dîner sera servi pendant l'enquête pour une immersion totale.</p>
                </div>
            
            <div class="info-card">
                <div class="info-card-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3 class="info-card-title">Transport</h3>
                <p class="info-card-text">Accès en voiture recommandé. Parking gratuit disponible sur place. Covoiturage possible via notre groupe Facebook.</p>
            </div>
            </div>
        </div>
    </section>

<!-- Section Statistiques -->
<section class="stats-section">
    <div class="main-container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number-home">150+</div>
                <div class="stat-label-home">Participants</div>
                </div>
            
            <div class="stat-card">
                <div class="stat-number-home">25</div>
                <div class="stat-label-home">Événements</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number-home">4,8/5</div>
                <div class="stat-label-home">Satisfaction</div>
        </div>
        
            <div class="stat-card">
                <div class="stat-number-home">3H</div>
                <div class="stat-label-home">Durée moyenne</div>
                        </div>
                    </div>
    </div>
</section>

<!-- Section Témoignages -->
<section class="testimonials-section">
    <div class="main-container">
        <div class="testimonials-header">
            <h2 class="testimonials-title">Témoignages</h2>
            <h3 class="testimonials-subtitle">Ce que disent nos participants</h3>
                        </div>
        
        <div class="testimonials-grid">
            <?php if (!empty($commentaires_approuves)): ?>
                <?php foreach ($commentaires_approuves as $commentaire): ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <h4 class="testimonial-name"><?= htmlspecialchars($commentaire['prenom'] . ' ' . substr($commentaire['nom'], 0, 1) . '.') ?></h4>
                            <p class="testimonial-role">Participant</p>
                            <p class="testimonial-text"><?= htmlspecialchars($commentaire['contenu']) ?></p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-date">Le <?= date('d/m/Y', strtotime($commentaire['date_creation'])) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <h4 class="testimonial-name">Aucun témoignage</h4>
                        <p class="testimonial-role">-</p>
                        <p class="testimonial-text">Soyez le premier à laisser un commentaire sur votre expérience !</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

<!-- Section Call to Action Final -->
<section class="final-cta-section">
    <div class="main-container">
        <div class="final-cta-card">
            <div class="cta-ornement">
                <img src="/assets/img/ornementHeader.png" alt="Ornement" />
                </div>
            
            <h2 class="final-cta-title">Prêt à vivre l'expérience ?</h2>
            <p class="final-cta-text">Rejoignez-nous pour une soirée d'enquête, de suspense et de mystère. Chaque détail compte, chaque indice peut être la différence.</p>
            
            <a href="/auth/inscription" class="btn-final-cta">Réserver Maintenant</a>
            </div>
                </div>
</section>

<!-- Section Partenaires -->
<section class="partners-section">
    <div class="main-container">
        <div class="partners-header">
            <h2 class="partners-title">Nos Partenaires</h2>
            <p class="partners-subtitle">Ils nous soutiennent dans cette aventure</p>
            </div>
        
        <div class="partners-grid">
            <div class="partner-card">
                <img src="/assets/img/partenaire1.png" alt="Petit Bateau" />
                </div>
            
            <div class="partner-card">
                <img src="/assets/img/partenaire2.png" alt="Feuillette" />
            </div>
            
            <div class="partner-card">
                <img src="/assets/img/partenaire3.png" alt="Village de Marques" />
                </div>
            
            <div class="partner-card">
                <img src="/assets/img/partenaire4.png" alt="Troyes" />
            </div>
        </div>
</div>
</section>

<?php require_once('view/autres_pages/footer.php'); ?> 