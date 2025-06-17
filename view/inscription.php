<?php 
$page_title = 'Inscription - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Styles pour la page d'inscription avec la nouvelle palette */
    .min-vh-80 {
        min-height: 80vh;
    }
    
    .auth-header {
        margin-bottom: 3rem;
    }
    
    .auth-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-secondary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-size: 2rem;
        margin: 0 auto;
        box-shadow: var(--shadow-lg);
        animation: pulse-mystery 3s ease-in-out infinite;
    }
    
    .auth-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .auth-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        line-height: 1.6;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .auth-card {
        background: var(--bg-primary);
        border-radius: 24px;
        box-shadow: var(--shadow-xl);
        border: 1px solid rgba(175, 116, 129, 0.1);
        position: relative;
        overflow: hidden;
    }
    
    .auth-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-accent);
    }
    
    .auth-card-body {
        padding: 3rem 2.5rem;
    }
    
    .form-group-modern {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .form-label-modern {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }
    
    .form-label-modern i {
        color: var(--old-rose);
        margin-right: 0.5rem;
    }
    
    .input-wrapper {
        position: relative;
    }
    
    .form-control-modern {
        width: 100%;
        padding: 1rem 3rem 1rem 1rem;
        border: 2px solid rgba(175, 116, 129, 0.2);
        border-radius: 12px;
        background: var(--bg-primary);
        color: var(--text-primary);
        font-size: 1rem;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-sm);
    }
    
    .form-control-modern:focus {
        outline: none;
        border-color: var(--old-rose);
        box-shadow: 0 0 0 3px rgba(175, 116, 129, 0.1);
        background: var(--bg-primary);
    }
    
    .form-control-modern::placeholder {
        color: var(--text-muted);
    }
    
    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--old-rose);
        font-size: 0.9rem;
        pointer-events: none;
    }
    
    .form-text {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .form-check-modern {
        background: rgba(175, 116, 129, 0.05);
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(175, 116, 129, 0.1);
    }
    
    .form-check-input:checked {
        background-color: var(--old-rose);
        border-color: var(--old-rose);
    }
    
    .form-check-input:focus {
        border-color: var(--old-rose);
        box-shadow: 0 0 0 0.25rem rgba(175, 116, 129, 0.25);
    }
    
    .form-check-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .form-check-label a {
        color: var(--rust);
        text-decoration: none;
        font-weight: 600;
    }
    
    .form-check-label a:hover {
        color: var(--rust-light);
        text-decoration: underline;
    }
    
    .auth-footer {
        margin-top: 2rem;
    }
    
    .auth-footer-text {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin: 0;
    }
    
    .auth-link {
        color: var(--rust);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition-smooth);
    }
    
    .auth-link:hover {
        color: var(--rust-light);
        text-decoration: underline;
    }
    
    /* Info card */
    .info-card {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-accent) 100%);
        border: 1px solid rgba(175, 116, 129, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 2rem;
        box-shadow: var(--shadow-sm);
    }
    
    .info-card h5 {
        color: var(--wine);
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .info-card h5 i {
        color: var(--rust);
        margin-right: 0.5rem;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .info-item:last-child {
        margin-bottom: 0;
    }
    
    .info-item i {
        color: var(--old-rose);
        margin-right: 0.5rem;
        width: 16px;
    }
    
    /* Validation states */
    .form-control-modern.is-valid {
        border-color: #28a745;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
    }
    
    .form-control-modern.is-invalid {
        border-color: var(--wine);
        box-shadow: 0 0 0 3px rgba(122, 41, 58, 0.1);
    }
    
    .valid-feedback {
        color: #28a745;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    .invalid-feedback {
        color: var(--wine);
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .auth-card-body {
            padding: 2rem 1.5rem;
        }
        
        .auth-title {
            font-size: 2rem;
        }
        
        .auth-subtitle {
            font-size: 1rem;
        }
        
        .form-group-modern {
            margin-bottom: 1.25rem;
        }
    }
    
    @media (max-width: 576px) {
        .auth-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        
        .auth-title {
            font-size: 1.75rem;
        }
        
        .form-control-modern {
            padding: 0.875rem 2.5rem 0.875rem 0.875rem;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-80">
        <div class="col-lg-8 col-xl-7">
            <!-- En-tête de la page -->
            <div class="auth-header text-center mb-5 animate-on-scroll">
                <div class="auth-icon mb-4">
                    <i class="fas fa-user-plus" aria-hidden="true"></i>
                </div>
                <h1 class="auth-title mb-3">
                    Rejoignez l'aventure
                </h1>
                <p class="auth-subtitle">
                    Créez votre compte pour participer à nos Murder Party et vivez des expériences d'enquête inoubliables.
                </p>
            </div>

            <!-- Alertes de succès -->
            <?php if ($succes): ?>
                <div class="alert alert-modern alert-success alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3" aria-hidden="true"></i>
                        <div>
                            <strong>Félicitations !</strong><br>
                            Votre inscription a été enregistrée avec succès. Vous pouvez maintenant vous 
                            <a href="/auth/connexion" class="alert-link">connecter</a>.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            <?php endif; ?>

            <!-- Alertes d'erreur -->
            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-modern alert-danger alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle fa-2x me-3 mt-1" aria-hidden="true"></i>
                        <div>
                            <strong>Erreur d'inscription</strong><br>
                            Veuillez corriger les problèmes suivants :
                            <ul class="mb-0 mt-2">
                                <?php foreach ($erreurs as $erreur): ?>
                                    <li><?= securise($erreur) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            <?php endif; ?>

            <!-- Formulaire d'inscription -->
            <div class="auth-card animate-on-scroll">
                <div class="auth-card-body">
                    <form method="POST" action="/auth/inscription" class="auth-form" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="prenom" class="form-label-modern">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                        Prénom *
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" 
                                               class="form-control-modern" 
                                               id="prenom" 
                                               name="prenom" 
                                               value="<?= securise($_POST['prenom'] ?? '') ?>"
                                               placeholder="Votre prénom"
                                               required>
                                        <div class="input-icon">
                                            <i class="fas fa-user" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="nom" class="form-label-modern">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                        Nom *
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" 
                                               class="form-control-modern" 
                                               id="nom" 
                                               name="nom" 
                                               value="<?= securise($_POST['nom'] ?? '') ?>"
                                               placeholder="Votre nom"
                                               required>
                                        <div class="input-icon">
                                            <i class="fas fa-user" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-modern">
                            <label for="email" class="form-label-modern">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                Adresse email *
                            </label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       class="form-control-modern" 
                                       id="email" 
                                       name="email" 
                                       value="<?= securise($_POST['email'] ?? '') ?>"
                                       placeholder="votre@email.com"
                                       required>
                                <div class="input-icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </div>
                            </div>
                            <small class="form-text">
                                Cette adresse sera utilisée pour vous connecter
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="mot_de_passe" class="form-label-modern">
                                        <i class="fas fa-lock" aria-hidden="true"></i>
                                        Mot de passe *
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" 
                                               class="form-control-modern" 
                                               id="mot_de_passe" 
                                               name="mot_de_passe" 
                                               placeholder="Votre mot de passe"
                                               minlength="6"
                                               required>
                                        <div class="input-icon">
                                            <i class="fas fa-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <small class="form-text">
                                        Au moins 6 caractères
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="mot_de_passe_confirm" class="form-label-modern">
                                        <i class="fas fa-lock" aria-hidden="true"></i>
                                        Confirmer le mot de passe *
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" 
                                               class="form-control-modern" 
                                               id="mot_de_passe_confirm" 
                                               name="mot_de_passe_confirm" 
                                               placeholder="Confirmer le mot de passe"
                                               minlength="6"
                                               required>
                                        <div class="input-icon">
                                            <i class="fas fa-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="telephone" class="form-label-modern">
                                        <i class="fas fa-phone" aria-hidden="true"></i>
                                        Téléphone
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="tel" 
                                               class="form-control-modern" 
                                               id="telephone" 
                                               name="telephone" 
                                               value="<?= securise($_POST['telephone'] ?? '') ?>"
                                               placeholder="06 12 34 56 78">
                                        <div class="input-icon">
                                            <i class="fas fa-phone" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <small class="form-text">
                                        Optionnel - pour vous contacter si nécessaire
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="age" class="form-label-modern">
                                        <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                                        Âge *
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="number" 
                                               class="form-control-modern" 
                                               id="age" 
                                               name="age" 
                                               value="<?= intval($_POST['age'] ?? '') ?>"
                                               placeholder="Votre âge"
                                               min="12" 
                                               max="120"
                                               required>
                                        <div class="input-icon">
                                            <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <small class="form-text">
                                        Minimum 12 ans pour participer
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-check-modern">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="conditions" 
                                       name="conditions" 
                                       required>
                                <label class="form-check-label" for="conditions">
                                    J'accepte les <a href="/mentions" target="_blank">conditions d'utilisation</a> 
                                    et la politique de confidentialité *
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-modern-primary btn-lg">
                                <i class="fas fa-user-plus me-2" aria-hidden="true"></i>
                                Créer mon compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Lien de connexion -->
            <div class="auth-footer text-center mt-4 animate-on-scroll">
                <p class="auth-footer-text">
                    Vous avez déjà un compte ? 
                    <a href="/auth/connexion" class="auth-link">
                        <i class="fas fa-sign-in-alt me-1" aria-hidden="true"></i>
                        Se connecter
                    </a>
                </p>
            </div>

            <!-- Informations supplémentaires -->
            <div class="info-card animate-on-scroll">
                <h5>
                    <i class="fas fa-info-circle" aria-hidden="true"></i>
                    Pourquoi s'inscrire ?
                </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-item">
                            <i class="fas fa-calendar-check" aria-hidden="true"></i>
                            Réserver votre place aux événements
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-item">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            Accéder à la messagerie privée
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-item">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            Laisser des commentaires et avis
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Validation du mot de passe en temps réel
    document.getElementById('mot_de_passe_confirm').addEventListener('input', function() {
        const password = document.getElementById('mot_de_passe').value;
        const confirmPassword = this.value;
        
        if (password !== confirmPassword) {
            this.setCustomValidity('Les mots de passe ne correspondent pas');
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.setCustomValidity('');
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });
    
    // Validation de l'email
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && emailRegex.test(email)) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else if (email) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
        } else {
            this.classList.remove('is-invalid', 'is-valid');
        }
    });
    
    // Validation des champs requis
    document.querySelectorAll('.form-control-modern[required]').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            }
        });
    });
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 