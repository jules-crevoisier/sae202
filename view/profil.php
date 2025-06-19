<?php 
$page_title = 'Profil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles pour la page profil */
    .main-content {
        padding-top: 120px;
        min-height: 100vh;
    }
    
    .container-custom {
        max-width: 1400px;
        margin: 0 auto;
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
        filter: hue-rotate(20deg) saturate(1.2);
    }
    
    .profil-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #742939;
        text-align: center;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }
    
    .profil-subtitle {
        text-align: center;
        color: #8B4513;
        font-style: italic;
        margin-bottom: 3rem;
        font-size: 1.1rem;
    }
    
    .profil-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .profil-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #742939, #A94803);
    }
    
    .profil-card-body {
        padding: 2.5rem;
    }
    
    .section-title-profil {
        color: #742939;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-profil i {
        color: #A94803;
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .nav-tabs-custom {
        border-bottom: 2px solid rgba(116, 41, 57, 0.1);
        margin-bottom: 2rem;
    }
    
    .nav-tabs-custom .nav-link {
        color: #8B4513;
        border: none;
        border-bottom: 3px solid transparent;
        padding: 1rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        background: transparent;
    }
    
    .nav-tabs-custom .nav-link:hover {
        color: #742939;
        border-bottom-color: rgba(116, 41, 57, 0.3);
        background: rgba(116, 41, 57, 0.05);
    }
    
    .nav-tabs-custom .nav-link.active {
        color: #742939;
        border-bottom-color: #A94803;
        background: white;
        font-weight: 700;
    }
    
    .nav-tabs-custom .nav-link i {
        margin-right: 0.5rem;
    }
    
    .profile-card {
        background: white;
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.1);
        margin-bottom: 2rem;
    }
    
    .profile-card-body {
        padding: 0;
    }
    
    .form-group-profile {
        margin-bottom: 1.5rem;
    }
    
    .form-label-profile {
        color: #742939;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-profile i {
        color: #A94803;
        margin-right: 0.5rem;
        width: 16px;
    }
    
    .form-control-profile {
        border: 2px solid rgba(116, 41, 57, 0.2);
        border-radius: 12px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
        padding: 1rem;
    }
    
    .form-control-profile:focus {
        outline: none;
        border-color: #A94803;
        box-shadow: 0 0 0 3px rgba(169, 72, 3, 0.1);
        background: white;
    }
    
    .form-control-profile:disabled {
        background: rgba(116, 41, 57, 0.05);
        color: #8B4513;
        cursor: not-allowed;
    }
    
    .form-text-profile {
        color: #8B4513;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .btn-modern-primary {
        background: #A94803;
        border-color: #A94803;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-modern-primary:hover {
        background: #742939;
        border-color: #742939;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.3);
    }
    
    .btn-password-fix {
        background: #742939;
        border-color: #742939;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-password-fix:hover {
        background: #A94803;
        border-color: #A94803;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(169, 72, 3, 0.3);
    }
    
    .password-info-card {
        background: rgba(116, 41, 57, 0.05);
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .text-muted {
        color: #8B4513 !important;
    }
    
    @media (max-width: 768px) {
        .profil-title {
            font-size: 2rem;
        }
        
        .profil-card-body {
            padding: 1.5rem;
        }
        
        .nav-tabs-custom .nav-link {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }
    }
</style>

<div class="main-content">
    <div class="container-custom">
        <div class="ornament-top">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement décoratif" />
        </div>
        
        <h1 class="profil-title">Mon Profil</h1>
        <p class="profil-subtitle">Gérez vos informations personnelles et votre sécurité</p>
        
        <div class="profil-card">
            <div class="profil-card-body">
                <!-- Messages de succès/erreur -->
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Navigation des onglets -->
                <ul class="nav nav-tabs nav-tabs-custom animate-on-scroll" id="profilTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="infos-tab" data-bs-toggle="tab" data-bs-target="#infos" type="button" role="tab">
                            <i class="fas fa-user"></i> Informations personnelles
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">
                            <i class="fas fa-lock"></i> Mot de passe
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="profilTabsContent">
                    <!-- Informations personnelles -->
                    <div class="tab-pane fade show active animate-on-scroll" id="infos" role="tabpanel">
                        <div class="profile-card">
                            <div class="profile-card-body">
                                <h3 class="section-title-profil">
                                    <i class="fas fa-user"></i> Informations personnelles
                                </h3>
                                
                                <form method="POST" action="/profil">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group-profile">
                                                <label for="prenom" class="form-label-profile">
                                                    <i class="fas fa-user"></i> Prénom *
                                                </label>
                                                <input type="text" 
                                                       class="form-control form-control-profile" 
                                                       id="prenom" 
                                                       name="prenom" 
                                                       value="<?= securise($user['prenom'] ?? '') ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-profile">
                                                <label for="nom" class="form-label-profile">
                                                    <i class="fas fa-user"></i> Nom *
                                                </label>
                                                <input type="text" 
                                                       class="form-control form-control-profile" 
                                                       id="nom" 
                                                       name="nom" 
                                                       value="<?= securise($user['nom'] ?? '') ?>"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group-profile">
                                        <label for="email" class="form-label-profile">
                                            <i class="fas fa-envelope"></i> Adresse email
                                        </label>
                                        <input type="email" 
                                               class="form-control form-control-profile" 
                                               id="email" 
                                               value="<?= securise($user['email'] ?? '') ?>"
                                               disabled>
                                        <div class="form-text-profile">L'adresse email ne peut pas être modifiée pour des raisons de sécurité</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group-profile">
                                                <label for="telephone" class="form-label-profile">
                                                    <i class="fas fa-phone"></i> Téléphone
                                                </label>
                                                <input type="tel" 
                                                       class="form-control form-control-profile" 
                                                       id="telephone" 
                                                       name="telephone" 
                                                       value="<?= securise($user['telephone'] ?? '') ?>"
                                                       placeholder="06 12 34 56 78">
                                                <div class="form-text-profile">Optionnel - pour vous contacter si nécessaire</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group-profile">
                                                <label for="age" class="form-label-profile">
                                                    <i class="fas fa-birthday-cake"></i> Âge *
                                                </label>
                                                <input type="number" 
                                                       class="form-control form-control-profile" 
                                                       id="age" 
                                                       name="age" 
                                                       value="<?= intval($user['age'] ?? '') ?>"
                                                       min="12" 
                                                       max="120"
                                                       required>
                                                <div class="form-text-profile">Minimum 12 ans pour participer</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group-profile">
                                        <label class="form-label-profile">
                                            <i class="fas fa-calendar-alt"></i> Membre depuis
                                        </label>
                                        <input type="text" 
                                               class="form-control form-control-profile" 
                                               value="<?= date('d/m/Y', strtotime($user['date_inscription'] ?? '')) ?>"
                                               disabled>
                                        <div class="form-text-profile">Date de création de votre compte</div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-modern-primary btn-lg">
                                            <i class="fas fa-save me-2"></i> Enregistrer les modifications
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Changement de mot de passe -->
                    <div class="tab-pane fade animate-on-scroll" id="password" role="tabpanel">
                        <div class="profile-card">
                            <div class="profile-card-body">
                                <h3 class="section-title-profil">
                                    <i class="fas fa-lock"></i> Sécurité du compte
                                </h3>
                                
                                <div class="password-info-card">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-shield-alt fa-2x me-3"></i>
                                        <div>
                                            <strong>Sécurité renforcée</strong><br>
                                            <span class="text-muted">Pour votre sécurité, choisissez un mot de passe fort contenant au moins 6 caractères avec des lettres, chiffres et caractères spéciaux.</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <a href="/profil/mot_de_passe" class="btn btn-password-fix btn-lg">
                                        <i class="fas fa-key me-2"></i> Modifier mon mot de passe
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 