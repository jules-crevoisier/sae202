<?php 
$page_title = 'Mon profil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles pour la page profil avec la nouvelle palette */
    .profile-header {
        padding: 3rem 0;
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .profile-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .profile-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 500px;
        margin: 0 auto;
    }
    
    .profile-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: var(--transition-smooth);
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
    }
    
    .profile-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-secondary);
    }
    
    .profile-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    .profile-card-body {
        padding: 2.5rem;
    }
    
    .section-title-profile {
        color: var(--wine);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }
    
    .section-title-profile i {
        color: var(--rust);
        margin-right: 1rem;
        font-size: 1.3rem;
    }
    
    .form-group-profile {
        margin-bottom: 1.5rem;
    }
    
    .form-label-profile {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-profile i {
        color: var(--old-rose);
        margin-right: 0.5rem;
        width: 16px;
    }
    
    .form-control-profile {
        border: 2px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        background: var(--bg-primary);
        color: var(--text-primary);
        font-size: 1rem;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
        padding: 0.875rem 1rem;
    }
    
    .form-control-profile:focus {
        outline: none;
        border-color: var(--old-rose);
        box-shadow: 0 0 0 3px rgba(175, 116, 129, 0.1);
        background: var(--bg-primary);
    }
    
    .form-control-profile:disabled {
        background: var(--bg-secondary);
        color: var(--text-muted);
        border-color: rgba(175, 116, 129, 0.1);
    }
    
    .form-text-profile {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    .nav-tabs-profile {
        border-bottom: 2px solid rgba(175, 116, 129, 0.2);
        margin-bottom: 2rem;
    }
    
    .nav-tabs-profile .nav-link {
        border: none;
        color: var(--text-secondary);
        font-weight: 500;
        padding: 1rem 1.5rem;
        border-radius: 12px 12px 0 0;
        transition: var(--transition-smooth);
        margin-right: 0.5rem;
    }
    
    .nav-tabs-profile .nav-link:hover {
        background: rgba(175, 116, 129, 0.1);
        color: var(--text-primary);
    }
    
    .nav-tabs-profile .nav-link.active {
        background: var(--gradient-secondary);
        color: var(--text-light);
        border-bottom: 2px solid var(--old-rose);
    }
    
    .nav-tabs-profile .nav-link i {
        margin-right: 0.5rem;
    }
    
    .quick-action-card {
        background: var(--bg-primary);
        border: 1px solid rgba(175, 116, 129, 0.1);
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
        height: 100%;
        text-align: center;
        padding: 2rem 1.5rem;
    }
    
    .quick-action-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: rgba(175, 116, 129, 0.2);
    }
    
    .quick-action-icon {
        color: var(--old-rose);
        margin-bottom: 1.5rem;
    }
    
    .quick-action-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }
    
    .quick-action-description {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }
    
    .password-info-card {
        background: linear-gradient(135deg, var(--bg-accent) 0%, var(--bg-secondary) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .password-info-card i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .password-info-card strong {
        color: var(--wine);
    }
    
    .btn-password-fix {
        background: var(--gradient-accent) !important;
        border: none !important;
        color: var(--text-light) !important;
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-rust);
    }
    
    .btn-password-fix:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: var(--text-light) !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="profile-header animate-on-scroll">
                <h1 class="profile-title">
                    <i class="fas fa-user-edit text-accent"></i> Mon profil
                </h1>
                <p class="profile-subtitle">
                    Gérez vos informations personnelles et paramètres de compte
                </p>
            </div>

            <!-- Alertes -->
            <?php if ($succes): ?>
                <div class="alert alert-modern alert-success alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3"></i>
                        <div>
                            <strong>Parfait !</strong><br>
                            Votre profil a été mis à jour avec succès.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-modern alert-danger alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle fa-2x me-3 mt-1"></i>
                        <div>
                            <strong>Erreur de mise à jour</strong><br>
                            Veuillez corriger les problèmes suivants :
                            <ul class="mb-0 mt-2">
                                <?php foreach ($erreurs as $erreur): ?>
                                    <li><?= securise($erreur) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Navigation des onglets -->
            <ul class="nav nav-tabs nav-tabs-profile animate-on-scroll" id="profilTabs" role="tablist">
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
                            <h3 class="section-title-profile">
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
                            <h3 class="section-title-profile">
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

            <!-- Actions rapides -->
            <div class="row animate-on-scroll">
                <div class="col-md-4 mb-4">
                    <div class="quick-action-card">
                        <i class="fas fa-envelope fa-3x quick-action-icon"></i>
                        <h6 class="quick-action-title">Messagerie</h6>
                        <p class="quick-action-description">Contactez les organisateurs pour toutes vos questions</p>
                        <a href="/messagerie" class="btn btn-modern-secondary">
                            <i class="fas fa-envelope me-2"></i> Accéder
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="quick-action-card">
                        <i class="fas fa-comments fa-3x quick-action-icon"></i>
                        <h6 class="quick-action-title">Mes commentaires</h6>
                        <p class="quick-action-description">Partagez votre expérience et consultez vos avis</p>
                        <a href="/commentaire" class="btn btn-modern-secondary">
                            <i class="fas fa-comments me-2"></i> Voir mes avis
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="quick-action-card">
                        <i class="fas fa-sign-out-alt fa-3x quick-action-icon"></i>
                        <h6 class="quick-action-title">Déconnexion</h6>
                        <p class="quick-action-description">Terminer votre session en toute sécurité</p>
                        <a href="/auth/deconnexion" class="btn btn-modern-outline">
                            <i class="fas fa-sign-out-alt me-2"></i> Se déconnecter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 