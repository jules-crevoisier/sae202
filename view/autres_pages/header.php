<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Murder Party - Événement Mystère' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Couleurs principales - Accessibilité WCAG AA */
            --primary-dark: #1a0b2e;      /* Violet très foncé - contraste élevé */
            --primary-medium: #2d1b4e;    /* Violet moyen */
            --primary-light: #4a3268;     /* Violet clair */
            
            --accent-gold: #d4af37;       /* Or classique - bon contraste */
            --accent-gold-light: #f4d03f; /* Or clair */
            --accent-gold-dark: #b7950b;  /* Or foncé */
            
            --crimson-dark: #8b0000;      /* Rouge foncé - thème mystère */
            --crimson-medium: #a52a2a;    /* Rouge moyen */
            --crimson-light: #cd5c5c;     /* Rouge clair */
            
            /* Couleurs neutres accessibles */
            --text-primary: #1a1a1a;      /* Noir pour texte principal */
            --text-secondary: #4a4a4a;    /* Gris foncé pour texte secondaire */
            --text-light: #ffffff;        /* Blanc pour texte sur fond foncé */
            --text-muted: #6c757d;        /* Gris pour texte discret */
            
            --bg-light: #ffffff;          /* Blanc pur */
            --bg-light-alt: #f8f9fa;      /* Gris très clair */
            --bg-dark: #1a1a1a;           /* Noir pour contraste */
            
            /* Gradients modernes */
            --gradient-primary: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-medium) 50%, var(--primary-light) 100%);
            --gradient-accent: linear-gradient(135deg, var(--accent-gold-dark) 0%, var(--accent-gold) 50%, var(--accent-gold-light) 100%);
            --gradient-crimson: linear-gradient(135deg, var(--crimson-dark) 0%, var(--crimson-medium) 50%, var(--crimson-light) 100%);
            --gradient-mystery: linear-gradient(135deg, var(--primary-dark) 0%, var(--crimson-dark) 100%);
            
            /* Ombres modernes */
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.15);
            --shadow-lg: 0 8px 25px rgba(0,0,0,0.2);
            --shadow-xl: 0 12px 40px rgba(0,0,0,0.25);
            
            /* Transitions fluides */
            --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            
            /* Hauteur du header */
            --navbar-height: 70px;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, var(--bg-light-alt) 100%);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
            font-weight: 400;
            padding-top: var(--navbar-height);
        }
        
        /* Typographie moderne */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 600;
            line-height: 1.3;
            color: var(--text-primary);
        }
        
        .display-1, .display-2, .display-3, .display-4 {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 800;
        }
        
        /* Navigation moderne et accessible */
        .navbar-modern {
            background: rgba(26, 11, 46, 0.95) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: var(--transition-smooth);
            padding: 0.75rem 0;
            height: var(--navbar-height);
        }
        
        .navbar-modern.scrolled {
            background: rgba(26, 11, 46, 0.98) !important;
            box-shadow: var(--shadow-lg);
        }
        
        .navbar-brand-modern {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--accent-gold) !important;
            text-decoration: none;
            transition: var(--transition-smooth);
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand-modern:hover {
            color: var(--accent-gold-light) !important;
            transform: translateY(-1px);
            text-shadow: 0 3px 6px rgba(0,0,0,0.4);
        }
        
        .navbar-brand-modern i {
            font-size: 1.25rem;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: pulse-mystery 3s ease-in-out infinite;
        }
        
        @keyframes pulse-mystery {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.05) rotate(-3deg); }
            50% { transform: scale(1.02) rotate(0deg); }
            75% { transform: scale(1.05) rotate(3deg); }
        }
        
        .navbar-nav-modern .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            margin: 0 0.125rem;
            font-size: 0.9rem;
        }
        
        .navbar-nav-modern .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .navbar-nav-modern .nav-link:hover::before {
            left: 100%;
        }
        
        .navbar-nav-modern .nav-link:hover {
            color: var(--accent-gold) !important;
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(212, 175, 55, 0.2);
        }
        
        .navbar-nav-modern .nav-link:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        .navbar-nav-modern .nav-link i {
            margin-right: 0.375rem;
            font-size: 0.8rem;
        }
        
        /* Dropdown moderne */
        .dropdown-menu-modern {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            padding: 0.5rem;
            margin-top: 0.25rem;
            min-width: 200px;
        }
        
        .dropdown-item-modern {
            color: var(--text-primary);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            transition: var(--transition-smooth);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .dropdown-item-modern:hover {
            background: var(--gradient-accent);
            color: var(--text-primary);
            transform: translateX(2px);
        }
        
        .dropdown-item-modern:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        .dropdown-divider {
            border-color: rgba(212, 175, 55, 0.2);
            margin: 0.25rem 0;
        }
        
        /* Navbar toggler moderne */
        .navbar-toggler-modern {
            border: 2px solid var(--accent-gold);
            border-radius: 8px;
            padding: 0.375rem;
            transition: var(--transition-smooth);
        }
        
        .navbar-toggler-modern:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: scale(1.05);
        }
        
        .navbar-toggler-modern:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
            box-shadow: none;
        }
        
        .navbar-toggler-icon-modern {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23d4af37' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.25rem;
            height: 1.25rem;
        }
        
        /* Navbar text pour utilisateur connecté - Gestion des noms longs */
        .navbar-text-modern {
            color: var(--accent-gold) !important;
            font-weight: 600;
            padding: 0.5rem 0.75rem;
            background: transparent;
            border-radius: 8px;
            border: none;
            font-size: 0.85rem;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .navbar-text-modern i {
            margin-right: 0.375rem;
            color: var(--accent-gold-light);
            flex-shrink: 0;
        }
        
        .user-name-container {
            display: flex;
            align-items: center;
            max-width: 100%;
            overflow: hidden;
        }
        
        .user-name-text {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        /* Amélioration de la partie droite du header */
        .navbar-nav-right {
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-nav-right .nav-item {
            margin: 0;
        }
        
        .navbar-nav-right .nav-link {
            padding: 0.5rem 0.875rem !important;
            margin: 0;
            white-space: nowrap;
            font-size: 0.85rem;
        }
        
        /* Style spécial pour l'élément utilisateur */
        .nav-item-user .navbar-text-modern {
            margin-right: 0.25rem;
            max-width: 180px;
        }
        
        /* Lien mentions légales - style plus discret */
        .nav-link-mentions {
            font-size: 0.8rem !important;
            opacity: 0.85;
            padding: 0.5rem 0.75rem !important;
        }
        
        .nav-link-mentions:hover {
            opacity: 1;
        }
        
        /* Lien admin spécial */
        .nav-link-admin {
            background: var(--gradient-crimson) !important;
            color: var(--text-light) !important;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(139, 0, 0, 0.3);
        }
        
        .nav-link-admin:hover {
            background: var(--gradient-crimson) !important;
            color: var(--text-light) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 0, 0, 0.4);
        }
        
        /* Boutons modernes */
        .btn-modern-primary {
            background: var(--gradient-primary);
            border: none;
            color: var(--text-light);
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 16px;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }
        
        .btn-modern-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-modern-primary:hover::before {
            left: 100%;
        }
        
        .btn-modern-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            color: var(--text-light);
        }
        
        .btn-modern-primary:focus {
            outline: 3px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        .btn-modern-outline {
            background: transparent;
            border: 2px solid var(--accent-gold);
            color: var(--accent-gold);
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 16px;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }
        
        .btn-modern-outline::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .btn-modern-outline:hover::before {
            left: 0;
        }
        
        .btn-modern-outline:hover {
            color: var(--text-primary);
            border-color: var(--accent-gold);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-modern-outline:focus {
            outline: 3px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        /* Cards modernes */
        .card-modern {
            background: var(--bg-light);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            transition: var(--transition-smooth);
            overflow: hidden;
            position: relative;
        }
        
        .card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
        }
        
        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .card-modern .card-body {
            padding: 2rem;
        }
        
        /* Couleurs d'accent */
        .text-accent {
            color: var(--accent-gold) !important;
        }
        
        .text-mystery {
            background: var(--gradient-mystery);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        
        /* Alertes modernes */
        .alert-modern {
            border: none;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border-left: 4px solid var(--accent-gold);
        }
        
        /* Responsive design */
        @media (max-width: 991.98px) {
            .navbar-nav-modern {
                text-align: center;
                margin-top: 0.5rem;
            }
            
            .navbar-nav-modern .nav-link {
                margin: 0.125rem 0;
            }
            
            .navbar-brand-modern {
                font-size: 1.25rem;
            }
            
            .navbar-text-modern {
                max-width: 150px;
                font-size: 0.8rem;
            }
            
            /* Amélioration responsive pour la partie droite */
            .navbar-nav-right {
                gap: 0.25rem;
                margin-top: 0.5rem;
            }
            
            .navbar-nav-right .nav-link {
                font-size: 0.8rem;
                padding: 0.5rem 0.75rem !important;
            }
            
            .nav-item-user .navbar-text-modern {
                max-width: 140px;
                margin-bottom: 0.25rem;
            }
        }
        
        @media (max-width: 767.98px) {
            :root {
                --navbar-height: 60px;
            }
            
            body {
                padding-top: var(--navbar-height);
            }
            
            .navbar-modern {
                height: var(--navbar-height);
                padding: 0.5rem 0;
            }
            
            /* Fond pour le menu dépliant mobile */
            .navbar-collapse {
                background: rgba(26, 11, 46, 0.98);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border-radius: 0 0 16px 16px;
                margin-top: 0.5rem;
                padding: 1rem;
                box-shadow: var(--shadow-lg);
                border: 1px solid rgba(212, 175, 55, 0.2);
                border-top: none;
            }
            
            .container {
                padding: 0 1rem;
            }
            
            .navbar-brand-modern {
                font-size: 1.1rem;
            }
            
            .btn-modern-primary,
            .btn-modern-outline {
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .navbar-text-modern {
                max-width: 120px;
                font-size: 0.75rem;
                padding: 0.375rem 0.5rem;
            }
            
            .dropdown-menu-modern {
                min-width: 180px;
            }
            
            /* Amélioration responsive mobile pour la partie droite */
            .navbar-nav-right {
                gap: 0.25rem;
                flex-direction: column;
                align-items: center;
            }
            
            .navbar-nav-right .nav-link {
                font-size: 0.75rem;
                padding: 0.375rem 0.625rem !important;
                margin: 0.125rem 0;
            }
            
            .nav-item-user .navbar-text-modern {
                max-width: 100px;
                margin-bottom: 0.5rem;
                text-align: center;
            }
            
            .nav-link-mentions {
                font-size: 0.7rem !important;
            }
        }
        
        /* Animations d'entrée */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Accessibilité - Focus visible */
        *:focus {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }
        
        /* Réduction des animations pour les utilisateurs qui le préfèrent */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
        
        /* Contraste élevé pour l'accessibilité */
        @media (prefers-contrast: high) {
            :root {
                --primary-dark: #000000;
                --text-primary: #000000;
                --bg-light: #ffffff;
                --accent-gold: #b8860b;
            }
        }
    </style>
</head>
<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-modern" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand-modern" href="/">
                <i class="fas fa-mask" aria-hidden="true"></i>
                <span>Murder Party</span>
            </a>
            
            <button class="navbar-toggler navbar-toggler-modern" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
                <span class="navbar-toggler-icon navbar-toggler-icon-modern"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto navbar-nav-modern">
                    <li class="nav-item">
                        <a class="nav-link" href="/" aria-label="Accueil">
                            <i class="fas fa-home" aria-hidden="true"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/concept" aria-label="Concept">
                            <i class="fas fa-lightbulb" aria-hidden="true"></i>Concept
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/infos" aria-label="Informations pratiques">
                            <i class="fas fa-info-circle" aria-hidden="true"></i>Infos pratiques
                        </a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Mon espace">
                                <i class="fas fa-user" aria-hidden="true"></i>Mon espace
                            </a>
                            <ul class="dropdown-menu dropdown-menu-modern" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item dropdown-item-modern" href="/profil">
                                    <i class="fas fa-user-edit" aria-hidden="true"></i>Mon profil
                                </a></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/messagerie">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>Messagerie
                                </a></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/commentaire">
                                    <i class="fas fa-comment" aria-hidden="true"></i>Commentaires
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/auth/deconnexion">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>Déconnexion
                                </a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                
                <ul class="navbar-nav navbar-nav-modern navbar-nav-right">
                    <?php if (!isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/connexion" aria-label="Se connecter">
                                <i class="fas fa-sign-in-alt" aria-hidden="true"></i>Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/inscription" aria-label="S'inscrire">
                                <i class="fas fa-user-plus" aria-hidden="true"></i>Inscription
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item nav-item-user">
                            <span class="navbar-text navbar-text-modern" title="<?= securise($_SESSION['user_prenom'] ?? '') ?> <?= securise($_SESSION['user_nom'] ?? '') ?>">
                                <div class="user-name-container">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <span class="user-name-text">
                                        <?= securise($_SESSION['user_prenom'] ?? '') ?> <?= securise($_SESSION['user_nom'] ?? '') ?>
                                    </span>
                                </div>
                            </span>
                        </li>
                        <?php if (isAdmin()): ?>
                            <li class="nav-item">
                                <a class="nav-link nav-link-admin" href="/gestion" aria-label="Administration">
                                    <i class="fas fa-cog" aria-hidden="true"></i>Administration
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-mentions" href="/mentions" aria-label="Mentions légales">
                            <i class="fas fa-gavel" aria-hidden="true"></i>Mentions légales
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <script>
        // Animation de la navbar au scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html> 