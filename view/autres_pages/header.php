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
            /* Nouvelle palette de couleurs Murder Party */
            --wine: #7a293aff;           /* Couleur principale - Wine */
            --caput-mortuum: #4f272fff;  /* Couleur sombre - Caput Mortuum */
            --old-rose: #af7481ff;       /* Couleur secondaire - Old Rose */
            --ivory: #fffcefff;          /* Arrière-plan principal - Ivory */
            --rust: #a94803ff;           /* Couleur d'accent - Rust */
            
            /* Variations de la palette principale */
            --wine-light: #9a3d4e;       /* Wine éclairci */
            --wine-dark: #5a1f2a;        /* Wine assombri */
            --caput-mortuum-light: #6f3c4f; /* Caput Mortuum éclairci */
            --old-rose-light: #c9949f;   /* Old Rose éclairci */
            --old-rose-dark: #8f5c68;    /* Old Rose assombri */
            --rust-light: #c85a04;       /* Rust éclairci */
            --rust-dark: #8b3a02;        /* Rust assombri */
            --ivory-dark: #f5f0e1;       /* Ivory légèrement assombri */
            
            /* Couleurs de texte optimisées pour l'accessibilité */
            --text-primary: var(--caput-mortuum);     /* Texte principal */
            --text-secondary: var(--wine);            /* Texte secondaire */
            --text-light: var(--ivory);               /* Texte sur fond foncé */
            --text-muted: #6b5b5d;                    /* Texte discret */
            --text-accent: var(--rust);               /* Texte d'accent */
            
            /* Arrière-plans */
            --bg-primary: var(--ivory);               /* Arrière-plan principal */
            --bg-secondary: var(--ivory-dark);        /* Arrière-plan secondaire */
            --bg-dark: var(--caput-mortuum);          /* Arrière-plan sombre */
            --bg-accent: var(--old-rose-light);       /* Arrière-plan d'accent */
            
            /* Gradients modernes avec la nouvelle palette */
            --gradient-primary: linear-gradient(135deg, var(--wine) 0%, var(--caput-mortuum) 50%, var(--wine-dark) 100%);
            --gradient-secondary: linear-gradient(135deg, var(--old-rose) 0%, var(--old-rose-light) 50%, var(--old-rose-dark) 100%);
            --gradient-accent: linear-gradient(135deg, var(--rust) 0%, var(--rust-light) 50%, var(--rust-dark) 100%);
            --gradient-mystery: linear-gradient(135deg, var(--caput-mortuum) 0%, var(--wine) 100%);
            --gradient-elegant: linear-gradient(135deg, var(--wine-dark) 0%, var(--caput-mortuum) 30%, var(--old-rose-dark) 100%);
            
            /* Ombres modernes avec les tons de la palette */
            --shadow-sm: 0 2px 4px rgba(79, 39, 47, 0.1);
            --shadow-md: 0 4px 12px rgba(79, 39, 47, 0.15);
            --shadow-lg: 0 8px 25px rgba(79, 39, 47, 0.2);
            --shadow-xl: 0 12px 40px rgba(79, 39, 47, 0.25);
            --shadow-wine: 0 4px 16px rgba(122, 41, 58, 0.3);
            --shadow-rust: 0 4px 16px rgba(169, 72, 3, 0.3);
            
            /* Transitions fluides */
            --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            
            /* Hauteur du header */
            --navbar-height: 75px;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
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
        
        /* Navigation moderne avec la nouvelle palette */
        .navbar-modern {
            background: rgba(79, 39, 47, 0.95) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(175, 116, 129, 0.3);
            box-shadow: var(--shadow-md);
            transition: var(--transition-smooth);
            padding: 0.75rem 0;
            height: var(--navbar-height);
        }
        
        .navbar-modern.scrolled {
            background: rgba(79, 39, 47, 0.98) !important;
            box-shadow: var(--shadow-lg);
        }
        
        /* Fond pour la version mobile */
        .navbar-collapse {
            background: rgba(79, 39, 47, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 12px;
            margin-top: 0.5rem;
            padding: 1rem;
            box-shadow: var(--shadow-lg);
        }
        
        @media (min-width: 992px) {
            .navbar-collapse {
                background: transparent;
                backdrop-filter: none;
                -webkit-backdrop-filter: none;
                border-radius: 0;
                margin-top: 0;
                padding: 0;
                box-shadow: none;
            }
        }
        
        .navbar-brand-modern {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--rust-light) !important;
            text-decoration: none;
            transition: var(--transition-smooth);
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .navbar-brand-modern:hover {
            color: var(--rust) !important;
            transform: translateY(-1px);
            text-shadow: 0 3px 6px rgba(0,0,0,0.4);
        }
        
        .navbar-brand-modern i {
            font-size: 1.4rem;
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
            color: rgba(255, 252, 239, 0.9) !important;
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
            background: linear-gradient(90deg, transparent, rgba(175, 116, 129, 0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .navbar-nav-modern .nav-link:hover::before {
            left: 100%;
        }
        
        .navbar-nav-modern .nav-link:hover {
            color: var(--old-rose-light) !important;
            background: rgba(175, 116, 129, 0.15);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(175, 116, 129, 0.2);
        }
        
        .navbar-nav-modern .nav-link:focus {
            outline: 2px solid var(--old-rose);
            outline-offset: 2px;
        }
        
        .navbar-nav-modern .nav-link i {
            margin-right: 0.375rem;
            font-size: 0.8rem;
        }
        
        /* Dropdown moderne avec la nouvelle palette */
        .dropdown-menu-modern {
            background: rgba(255, 252, 239, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(175, 116, 129, 0.2);
            border-radius: 12px;
            box-shadow: var(--shadow-xl);
            padding: 0.5rem;
            margin-top: 0.25rem;
            min-width: 200px;
            display: none; /* Masqué par défaut */
        }
        
        .dropdown-menu-modern.show {
            display: block; /* Affiché quand la classe show est présente */
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
            background: var(--gradient-secondary);
            color: var(--text-light);
            transform: translateX(2px);
        }
        
        .dropdown-item-modern:focus {
            outline: 2px solid var(--old-rose);
            outline-offset: 2px;
        }
        
        .dropdown-divider {
            border-color: rgba(175, 116, 129, 0.2);
            margin: 0.25rem 0;
        }
        
        /* S'assurer que le dropdown fonctionne */
        .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
        
        .dropdown-toggle:empty::after {
            margin-left: 0;
        }
        
        /* Navbar toggler moderne */
        .navbar-toggler-modern {
            border: 2px solid var(--old-rose);
            border-radius: 8px;
            padding: 0.375rem;
            transition: var(--transition-smooth);
        }
        
        .navbar-toggler-modern:hover {
            background: rgba(175, 116, 129, 0.1);
            transform: scale(1.05);
        }
        
        .navbar-toggler-modern:focus {
            outline: 2px solid var(--old-rose);
            outline-offset: 2px;
            box-shadow: none;
        }
        
        .navbar-toggler-icon-modern {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23af7481' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.25rem;
            height: 1.25rem;
        }
        
        /* Navbar text pour utilisateur connecté */
        .navbar-text-modern {
            color: var(--rust-light) !important;
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
            color: var(--rust);
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
        
        /* Lien admin spécial avec la couleur wine */
        .nav-link-admin {
            background: var(--gradient-primary) !important;
            color: var(--text-light) !important;
            font-weight: 600;
            box-shadow: var(--shadow-wine);
        }
        
        .nav-link-admin:hover {
            background: var(--gradient-primary) !important;
            color: var(--text-light) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        /* Boutons modernes avec la nouvelle palette */
        .btn-modern-primary {
            background: var(--gradient-primary);
            border: none;
            color: var(--text-light);
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 16px;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-wine);
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
            outline: 3px solid var(--old-rose);
            outline-offset: 2px;
        }
        
        .btn-modern-outline {
            background: transparent;
            border: 2px solid var(--rust);
            color: var(--rust);
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
            color: var(--text-light);
            border-color: var(--rust);
            transform: translateY(-2px);
            box-shadow: var(--shadow-rust);
        }
        
        .btn-modern-outline:focus {
            outline: 3px solid var(--rust-light);
            outline-offset: 2px;
        }
        
        /* Bouton secondaire avec old-rose */
        .btn-modern-secondary {
            background: var(--gradient-secondary);
            border: none;
            color: var(--text-light);
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 16px;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-md);
        }
        
        .btn-modern-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: var(--text-light);
        }
        
        /* Bouton accent avec rust */
        .btn-modern-accent {
            background: var(--gradient-accent);
            border: none;
            color: var(--text-light);
            font-weight: 600;
            padding: 0.875rem 2rem;
            border-radius: 16px;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-rust);
        }
        
        .btn-modern-accent:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: var(--text-light);
        }
        
        /* Cards modernes avec la nouvelle palette */
        .card-modern {
            background: var(--bg-primary);
            border: 1px solid rgba(175, 116, 129, 0.1);
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            transition: var(--transition-smooth);
            overflow: hidden;
        }
        
        .card-modern:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        
        .card-modern .card-header {
            background: var(--gradient-secondary);
            color: var(--text-light);
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
        }
        
        .card-modern .card-body {
            padding: 1.5rem;
        }
        
        /* Sections et titres */
        .section-title {
            color: var(--text-primary);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .text-accent {
            color: var(--rust) !important;
        }
        
        .text-mystery {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        
        /* Alertes modernes */
        .alert-modern {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            box-shadow: var(--shadow-sm);
        }
        
        .alert-modern.alert-warning {
            background: linear-gradient(135deg, var(--rust-light), var(--rust));
            color: var(--text-light);
        }
        
        .alert-modern.alert-info {
            background: linear-gradient(135deg, var(--old-rose-light), var(--old-rose));
            color: var(--text-light);
        }
        
        .alert-modern.alert-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: var(--text-light);
        }
        
        .alert-modern.alert-danger {
            background: var(--gradient-primary);
            color: var(--text-light);
        }
        
        /* Hero section */
        .hero-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }
        
        .hero-description {
            font-size: 1.2rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }
        
        .hero-badge {
            background: var(--gradient-accent);
            color: var(--text-light);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        /* Animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Éléments flottants */
        .floating-elements {
            position: relative;
        }
        
        .floating-element {
            position: absolute;
            background: var(--gradient-secondary);
            color: var(--text-light);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: var(--shadow-lg);
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element.element-1 {
            top: 20%;
            right: 10%;
            animation-delay: 0s;
        }
        
        .floating-element.element-2 {
            top: 60%;
            right: 20%;
            animation-delay: 2s;
        }
        
        .floating-element.element-3 {
            top: 40%;
            right: 5%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-10px) rotate(5deg); }
            50% { transform: translateY(-5px) rotate(0deg); }
            75% { transform: translateY(-15px) rotate(-5deg); }
        }
        
        /* Mystery card */
        .mystery-card {
            background: var(--gradient-elegant);
            color: var(--text-light);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .mystery-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s ease-in-out infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
            100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        }
        
        .mystery-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .navbar-brand-modern {
                font-size: 1.3rem;
            }
            
            .btn-modern-primary,
            .btn-modern-outline,
            .btn-modern-secondary,
            .btn-modern-accent {
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .floating-element {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .mystery-card {
                padding: 1.5rem;
            }
            
            .navbar-text-modern {
                max-width: 120px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation moderne -->
    <nav class="navbar navbar-expand-lg navbar-modern fixed-top">
        <div class="container">
            <a class="navbar-brand-modern" href="/">
                <i class="fas fa-mask" aria-hidden="true"></i>
                Murder Party
            </a>
            
            <button class="navbar-toggler navbar-toggler-modern" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-toggler-icon-modern"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-nav-modern me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/concept">
                            <i class="fas fa-lightbulb" aria-hidden="true"></i>
                            Le Concept
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/infos">
                            <i class="fas fa-info-circle" aria-hidden="true"></i>
                            Informations
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav navbar-nav-modern navbar-nav-right">
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item nav-item-user">
                            <span class="navbar-text-modern">
                                <div class="user-name-container">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <span class="user-name-text"><?= htmlspecialchars(($_SESSION['user']['prenom'] ?? '') . ' ' . ($_SESSION['user']['nom'] ?? '')) ?></span>
                                </div>
                            </span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mon compte
                            </a>
                            <ul class="dropdown-menu dropdown-menu-modern" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item dropdown-item-modern" href="/messagerie">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    Messagerie
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/profil">
                                    <i class="fas fa-user-edit" aria-hidden="true"></i>
                                    Mon profil
                                </a></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/commentaire">
                                    <i class="fas fa-comments" aria-hidden="true"></i>
                                    Mes commentaires
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item dropdown-item-modern" href="/auth/deconnexion">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                    Déconnexion
                                </a></li>
                            </ul>
                        </li>
                        <?php if (isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-admin" href="/admin">
                                <i class="fas fa-cogs" aria-hidden="true"></i>
                                Administration
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/connexion">
                                <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                Connexion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/inscription">
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                                Inscription
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link nav-link-mentions" href="/mentions">
                            <i class="fas fa-file-contract" aria-hidden="true"></i>
                            Mentions légales
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script pour les animations et effets -->
    <script>
        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);
        
        // Observer tous les éléments avec la classe animate-on-scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            animatedElements.forEach(el => observer.observe(el));
            
            // Effet de navbar au scroll
            const navbar = document.querySelector('.navbar-modern');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            
            // Gestion du dropdown "Mon compte"
            const dropdownToggle = document.querySelector('#navbarDropdown');
            const dropdownMenu = document.querySelector('.dropdown-menu-modern');
            
            if (dropdownToggle && dropdownMenu) {
                // Clic sur le toggle
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Toggle la classe show
                    dropdownMenu.classList.toggle('show');
                    dropdownToggle.setAttribute('aria-expanded', dropdownMenu.classList.contains('show'));
                });
                
                // Fermer le dropdown si on clique ailleurs
                document.addEventListener('click', function(e) {
                    if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.remove('show');
                        dropdownToggle.setAttribute('aria-expanded', 'false');
                    }
                });
                
                // Fermer le dropdown avec la touche Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && dropdownMenu.classList.contains('show')) {
                        dropdownMenu.classList.remove('show');
                        dropdownToggle.setAttribute('aria-expanded', 'false');
                        dropdownToggle.focus();
                    }
                });
            }
        });
    </script>
</body>
</html> 