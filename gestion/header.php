<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Administration - Murder Party') ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --sidebar-bg: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            --card-shadow: 0 10px 30px rgba(0,0,0,0.1);
            --hover-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* Navigation moderne */
        .admin-navbar {
            background: var(--primary-gradient);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            border: none;
            padding: 1rem 0;
            position: relative;
            z-index: 1030;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: white !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
            text-shadow: 0 4px 8px rgba(0,0,0,0.4);
        }

        .navbar-brand i {
            background: var(--secondary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Sidebar moderne */
        .admin-sidebar {
            background: var(--sidebar-bg);
            min-height: calc(100vh - 80px);
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .sidebar-header {
            padding: 2rem 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }

        .sidebar-header h6 {
            color: #ffffff;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
            opacity: 0.9;
        }

        .sidebar-item {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            border-radius: 12px;
            margin: 0.25rem 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .sidebar-item:hover::before {
            left: 100%;
        }

        .sidebar-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            text-decoration: none;
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .sidebar-item.active {
            background: var(--secondary-gradient);
            color: white;
            box-shadow: 0 6px 20px rgba(245, 87, 108, 0.3);
            transform: translateX(8px);
        }

        .sidebar-item i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .badge-notification {
            font-size: 0.7em;
            padding: 0.3em 0.6em;
            border-radius: 50px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }

        /* Contenu principal */
        .admin-content {
            background: transparent;
            min-height: calc(100vh - 80px);
            padding: 2rem;
        }

        /* Dropdown moderne */
        .dropdown-menu {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: 12px;
            padding: 0.5rem;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            z-index: 9999 !important;
            position: absolute !important;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-1px);
        }

        .dropdown-toggle::after {
            display: none;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.75rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white !important;
        }

        /* Dropdown container */
        .nav-item.dropdown {
            position: relative;
            z-index: 1040;
        }

        /* Assurer que le dropdown soit au-dessus de tout */
        .dropdown.show .dropdown-menu {
            z-index: 10000 !important;
        }

        /* Pour éviter tout problème de débordement sur les cartes et autres éléments */
        .card, .alert, .table-responsive, .admin-content > * {
            position: relative;
            z-index: 1;
        }

        /* S'assurer que le dropdown reste cliquable */
        .dropdown-menu {
            pointer-events: auto !important;
            user-select: auto !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                min-height: auto;
            }
            
            .admin-content {
                padding: 1rem;
            }
            
            .sidebar-item {
                margin: 0.25rem 0.5rem;
                padding: 0.75rem 1rem;
            }
        }

        /* Animations d'entrée */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scrollbar personnalisée */
        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.5);
        }
    </style>
</head>
<body>
    <!-- Navigation principale -->
    <nav class="navbar navbar-expand-lg admin-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/gestion">
                <i class="fas fa-skull-crossbones me-2"></i>
                Murder Party Admin
            </a>
            
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="d-none d-md-block">
                                <small class="d-block opacity-75">Administrateur</small>
                                <strong><?= htmlspecialchars($_SESSION['user_prenom'] ?? 'Admin') ?></strong>
                            </div>
                        </div>
                        <i class="fas fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/profil">
                            <i class="fas fa-user me-2"></i>Mon profil
                        </a></li>
                        <li><a class="dropdown-item" href="/" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Voir le site
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="/auth/deconnexion">
                            <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 admin-sidebar">
                <div class="sidebar-header">
                    <h6>
                        <i class="fas fa-cogs me-2"></i>
                        Panneau d'administration
                    </h6>
                </div>
                
                <nav class="nav flex-column">
                    <a href="/gestion" class="sidebar-item <?= ($admin_active ?? '') === 'dashboard' ? 'active' : '' ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Tableau de bord</span>
                    </a>
                    
                    <a href="/gestion/utilisateurs" class="sidebar-item <?= ($admin_active ?? '') === 'utilisateurs' ? 'active' : '' ?>">
                        <i class="fas fa-users"></i>
                        <span>Utilisateurs</span>
                    </a>
                    
                    <a href="/gestion/commentaires" class="sidebar-item <?= ($admin_active ?? '') === 'commentaires' ? 'active' : '' ?>">
                        <i class="fas fa-comments"></i>
                        <span>Commentaires</span>
                        <?php if (isset($nb_commentaires_attente) && $nb_commentaires_attente > 0): ?>
                            <span class="badge bg-warning badge-notification ms-auto"><?= $nb_commentaires_attente ?></span>
                        <?php endif; ?>
                    </a>
                    
                    <a href="/gestion/messages" class="sidebar-item <?= ($admin_active ?? '') === 'messages' ? 'active' : '' ?>">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                        <?php if (isset($nb_messages_non_lus) && $nb_messages_non_lus > 0): ?>
                            <span class="badge bg-info badge-notification ms-auto"><?= $nb_messages_non_lus ?></span>
                        <?php endif; ?>
                    </a>
                    
                    <div style="height: 1px; background: rgba(255,255,255,0.1); margin: 1.5rem 1rem;"></div>
                    
                    <a href="/" class="sidebar-item" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Voir le site</span>
                    </a>
                </nav>
            </div>
            
            <!-- Contenu principal -->
            <div class="col-lg-10 col-md-9 admin-content fade-in"> 