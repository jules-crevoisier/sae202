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
            --header-bg: #742939;
            --header-radius: 26px;
            --header-padding: 12px 45px;
            --header-gap: 236px;
            --header-link-color: #fffcefff;
            --header-link-weight: 700;
        }
        
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .header-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            display: flex;
            justify-content: center;
            padding: 1rem;
        }
        
        .main-header {
            background: var(--header-bg);
            border-radius: var(--header-radius);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--header-padding);
            width: 100%;
            max-width: 1400px;
        }
        
        .header-logo {
            display: flex;
            align-items: center;
        }
        
        .header-logo img {
            height: 42px;
            width: auto;
        }
        
        .header-menu {
            display: flex;
            align-items: center;
            gap: 3.5rem;
            margin: 0 auto;
        }
        
        .header-menu a {
            color: var(--header-link-color);
            font-weight: var(--header-link-weight);
            font-size: 1.13rem;
            text-decoration: none;
            white-space: nowrap;
        }
        
        .header-menu a.active {
            text-decoration: underline;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .header-actions a {
            color: var(--header-link-color);
            font-weight: var(--header-link-weight);
            font-size: 1.13rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }
        
        .header-actions a i {
            font-size: 1.15em;
        }
        
        /* Menu hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            background: none;
            border: none;
            z-index: 1001;
        }
        
        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--header-link-color);
            margin: 2px 0;
            transition: 0.3s;
            border-radius: 3px;
        }
        
        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
        
        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: var(--header-bg);
            z-index: 999;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .mobile-menu.active {
            opacity: 1;
            visibility: visible;
        }
        
        .mobile-menu a {
            color: var(--header-link-color);
            font-weight: var(--header-link-weight);
            font-size: 1.5rem;
            text-decoration: none;
            padding: 1rem 2rem;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        
        .mobile-menu a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .mobile-menu a.active {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .mobile-menu-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .mobile-menu-actions a {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
        }
        
        .mobile-menu-actions a:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        /* Menu déroulant utilisateur */
        .user-dropdown {
            position: relative;
        }
        
        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--header-link-color);
            font-weight: var(--header-link-weight);
            font-size: 1.13rem;
            text-decoration: none;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: background 0.3s ease;
        }
        
        .user-dropdown-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--header-link-color);
        }
        
        .user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            min-width: 220px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .user-dropdown.show .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .user-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 20px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid white;
        }
        
        .user-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            color: #333;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: background 0.2s ease;
        }
        
        .user-dropdown-menu a:hover {
            background: #f8f9fa;
            color: var(--header-bg);
        }
        
        .user-dropdown-menu a i {
            width: 16px;
            text-align: center;
            color: var(--header-bg);
        }
        
        .user-dropdown-menu .dropdown-divider {
            height: 1px;
            background: #e9ecef;
            margin: 0.5rem 0;
        }
        
        .user-dropdown-menu .user-info {
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 0.5rem;
        }
        
        .user-info-name {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }
        
        .user-info-email {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }
        
        .admin-badge {
            background: linear-gradient(45deg, #dc3545, #fd7e14);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            font-weight: 600;
            margin-left: 0.5rem;
        }
        
        @media (max-width: 1200px) {
            .main-header {
                padding: 12px 25px;
            }
            .header-menu {
                gap: 2rem;
            }
        }
        
        @media (max-width: 991px) {
            .main-header {
                padding: 12px 20px;
            }
            .header-menu {
                gap: 1.5rem;
            }
            .header-actions {
                gap: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            .header-container {
                padding: 0.5rem;
            }
            
            .main-header {
                border-radius: var(--header-radius);
                padding: 12px 20px;
                position: relative;
            }
            
            .header-menu,
            .header-actions {
                display: none;
            }
            
            .hamburger {
                display: flex;
            }
            
            .mobile-menu {
                display: flex;
            }
            
            .header-logo img {
                height: 36px;
            }
        }
        
        @media (max-width: 576px) {
            .main-header {
                padding: 10px 15px;
            }
            
            .header-logo img {
                height: 32px;
            }
            
            .mobile-menu a {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="header-container">
        <header class="main-header">
            <div class="header-logo">
                <img src="/assets/img/ornementHeader.png" alt="Logo Ornement" />
            </div>
            <nav class="header-menu">
                <a href="/" class="<?= ($_SERVER['REQUEST_URI'] == '/' ? 'active' : '') ?>">Accueil</a>
                <a href="/concept" class="<?= (strpos($_SERVER['REQUEST_URI'], '/concept') === 0 ? 'active' : '') ?>">Concept</a>
                <a href="/infos" class="<?= (strpos($_SERVER['REQUEST_URI'], '/infos') === 0 ? 'active' : '') ?>">Infos pratiques</a>
            </nav>
            <div class="header-actions">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Menu utilisateur connecté -->
                    <div class="user-dropdown" id="userDropdown">
                        <a href="#" class="user-dropdown-toggle" id="userDropdownToggle">
                            <i class="fas fa-user-circle"></i>
                            <?= htmlspecialchars($_SESSION['prenom'] ?? 'Utilisateur') ?>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <span class="admin-badge">ADMIN</span>
                            <?php endif; ?>
                            <i class="fas fa-chevron-down ms-1"></i>
                        </a>
                        <div class="user-dropdown-menu">
                            <div class="user-info">
                                <div class="user-info-name">
                                    <?= htmlspecialchars(($_SESSION['prenom'] ?? '') . ' ' . ($_SESSION['nom'] ?? '')) ?>
                                </div>
                                <div class="user-info-email">
                                    <?= htmlspecialchars($_SESSION['email'] ?? '') ?>
                                </div>
                            </div>
                            <a href="/profil">
                                <i class="fas fa-user"></i>
                                Mon profil
                            </a>
                            <a href="/messagerie">
                                <i class="fas fa-envelope"></i>
                                    Messagerie
                            </a>
                            <a href="/commentaire">
                                <i class="fas fa-comments"></i>
                                Mes commentaires
                            </a>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <div class="dropdown-divider"></div>
                                <a href="/admin/dashboard">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Administration
                                </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <a href="/auth/deconnexion">
                                <i class="fas fa-sign-out-alt"></i>
                                Déconnexion
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Liens connexion/inscription pour utilisateurs non connectés -->
                    <a href="/auth/connexion"><i class="fas fa-sign-in-alt"></i>Connexion</a>
                    <a href="/auth/inscription"><i class="fas fa-user-plus"></i>Inscription</a>
                    <?php endif; ?>
            </div>
            
            <!-- Bouton hamburger pour mobile -->
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </header>
    </div>
    
    <!-- Menu mobile -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="/" class="<?= ($_SERVER['REQUEST_URI'] == '/' ? 'active' : '') ?>">Accueil</a>
        <a href="/concept" class="<?= (strpos($_SERVER['REQUEST_URI'], '/concept') === 0 ? 'active' : '') ?>">Concept</a>
        <a href="/infos" class="<?= (strpos($_SERVER['REQUEST_URI'], '/infos') === 0 ? 'active' : '') ?>">Infos pratiques</a>
        
        <div class="mobile-menu-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Menu utilisateur connecté mobile -->
                <div style="text-align: center; margin-bottom: 1rem; color: var(--header-link-color);">
                    <div style="font-weight: 600; font-size: 1.1rem;">
                        <?= htmlspecialchars(($_SESSION['prenom'] ?? '') . ' ' . ($_SESSION['nom'] ?? '')) ?>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                            <span class="admin-badge">ADMIN</span>
                        <?php endif; ?>
                    </div>
                    <div style="font-size: 0.9rem; opacity: 0.8;">
                        <?= htmlspecialchars($_SESSION['email'] ?? '') ?>
                    </div>
                </div>
                <a href="/profil"><i class="fas fa-user"></i>Mon profil</a>
                <a href="/messagerie"><i class="fas fa-envelope"></i>Messagerie</a>
                <a href="/commentaire"><i class="fas fa-comments"></i>Mes commentaires</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i>Administration</a>
                <?php endif; ?>
                <a href="/auth/deconnexion"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
            <?php else: ?>
                <!-- Liens connexion/inscription pour utilisateurs non connectés -->
                <a href="/auth/connexion"><i class="fas fa-sign-in-alt"></i>Connexion</a>
                <a href="/auth/inscription"><i class="fas fa-user-plus"></i>Inscription</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script pour le menu hamburger -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobileMenu');
            const body = document.body;
            
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                mobileMenu.classList.toggle('active');
                body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
            });
            
            // Fermer le menu quand on clique sur un lien
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('active');
                    mobileMenu.classList.remove('active');
                    body.style.overflow = '';
                });
            });
            
            // Fermer le menu avec la touche Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    hamburger.classList.remove('active');
                    mobileMenu.classList.remove('active');
                    body.style.overflow = '';
                }
            });
            
            // Gérer le redimensionnement de la fenêtre
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    hamburger.classList.remove('active');
                    mobileMenu.classList.remove('active');
                    body.style.overflow = '';
                }
            });
            
            // Gestion du menu déroulant utilisateur
            const userDropdown = document.getElementById('userDropdown');
            const userDropdownToggle = document.getElementById('userDropdownToggle');
            
            if (userDropdown && userDropdownToggle) {
                userDropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    userDropdown.classList.toggle('show');
                });
                
                // Fermer le menu en cliquant ailleurs
                document.addEventListener('click', function(e) {
                    if (!userDropdown.contains(e.target)) {
                        userDropdown.classList.remove('show');
                    }
                });
                
                // Fermer le menu avec Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        userDropdown.classList.remove('show');
                    }
                });
            }
        });
    </script>
</body>
</html> 