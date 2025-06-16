<?php 
$page_title = 'Connexion - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-80">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <!-- En-tête de la page -->
            <div class="auth-header text-center mb-5 animate-on-scroll">
                <div class="auth-icon mb-4">
                    <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                </div>
                <h1 class="auth-title mb-3">
                    Bienvenue de retour
                </h1>
                <p class="auth-subtitle">
                    Connectez-vous pour accéder à votre espace personnel et gérer votre participation à la Murder Party.
                </p>
            </div>

            <!-- Alertes d'erreur -->
            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-modern alert-danger alert-dismissible fade show animate-on-scroll" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-2x me-3" aria-hidden="true"></i>
                        <div>
                            <strong>Erreur de connexion</strong>
                            <br>
                            <?php foreach ($erreurs as $erreur): ?>
                                <?= securise($erreur) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            <?php endif; ?>

            <!-- Formulaire de connexion -->
            <div class="auth-card animate-on-scroll">
                <div class="auth-card-body">
                    <form method="POST" action="/auth/connexion" class="auth-form">
                        <div class="form-group-modern mb-4">
                            <label for="email" class="form-label-modern">
                                <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                                Adresse email
                            </label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       class="form-control-modern" 
                                       id="email" 
                                       name="email" 
                                       value="<?= securise($_POST['email'] ?? '') ?>"
                                       placeholder="votre@email.com"
                                       required
                                       aria-describedby="email-help">
                                <div class="input-icon">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                </div>
                            </div>
                            <small id="email-help" class="form-text">
                                Utilisez l'adresse email avec laquelle vous vous êtes inscrit
                            </small>
                        </div>

                        <div class="form-group-modern mb-5">
                            <label for="mot_de_passe" class="form-label-modern">
                                <i class="fas fa-lock me-2" aria-hidden="true"></i>
                                Mot de passe
                            </label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       class="form-control-modern" 
                                       id="mot_de_passe" 
                                       name="mot_de_passe" 
                                       placeholder="Votre mot de passe"
                                       required
                                       aria-describedby="password-help">
                                <div class="input-icon">
                                    <i class="fas fa-lock" aria-hidden="true"></i>
                                </div>
                                <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Afficher/masquer le mot de passe">
                                    <i class="fas fa-eye" id="password-toggle-icon" aria-hidden="true"></i>
                                </button>
                            </div>
                            <small id="password-help" class="form-text">
                                Votre mot de passe est sécurisé et chiffré
                            </small>
                        </div>

                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-modern-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2" aria-hidden="true"></i>
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Lien d'inscription -->
            <div class="auth-footer text-center mt-4 animate-on-scroll">
                <p class="auth-footer-text">
                    Pas encore de compte ? 
                    <a href="/auth/inscription" class="auth-link">
                        <i class="fas fa-user-plus me-1" aria-hidden="true"></i>
                        Créer un compte
                    </a>
                </p>
            </div>

            <!-- Compte de démonstration -->
            <div class="demo-card animate-on-scroll">
                <div class="demo-header">
                    <i class="fas fa-info-circle me-2" aria-hidden="true"></i>
                    <span>Compte de démonstration</span>
                </div>
                <div class="demo-content">
                    <div class="demo-account">
                        <div class="demo-label">
                            <i class="fas fa-crown me-2" aria-hidden="true"></i>
                            Administrateur
                        </div>
                        <div class="demo-credentials">
                            <span class="demo-email">admin@sae202.local</span>
                            <span class="demo-separator">•</span>
                            <span class="demo-password">password</span>
                        </div>
                    </div>
                    <div class="demo-account">
                        <div class="demo-label">
                            <i class="fas fa-user me-2" aria-hidden="true"></i>
                            Utilisateur
                        </div>
                        <div class="demo-credentials">
                            <span class="demo-email">jean.dupont@email.com</span>
                            <span class="demo-separator">•</span>
                            <span class="demo-password">password</span>
                        </div>
                    </div>
                    <small class="demo-note">
                        Utilisez ces comptes pour tester toutes les fonctionnalités du site
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styles pour la page de connexion */
    .min-vh-80 {
        min-height: 80vh;
    }
    
    .auth-header {
        margin-bottom: 3rem;
    }
    
    .auth-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
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
        max-width: 400px;
        margin: 0 auto;
    }
    
    .auth-card {
        background: var(--bg-light);
        border-radius: 24px;
        box-shadow: var(--shadow-xl);
        border: 1px solid rgba(212, 175, 55, 0.1);
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
    }
    
    .form-label-modern {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }
    
    .input-wrapper {
        position: relative;
    }
    
    .form-control-modern {
        width: 100%;
        padding: 1rem 1rem 1rem 3.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        font-size: 1rem;
        transition: var(--transition-smooth);
        background: var(--bg-light);
        color: var(--text-primary);
    }
    
    .form-control-modern:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        transform: translateY(-2px);
    }
    
    .form-control-modern::placeholder {
        color: var(--text-muted);
    }
    
    .input-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 1.1rem;
        transition: var(--transition-smooth);
        pointer-events: none;
    }
    
    .form-control-modern:focus + .input-icon {
        color: var(--accent-gold);
    }
    
    .password-toggle {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-muted);
        font-size: 1.1rem;
        cursor: pointer;
        transition: var(--transition-smooth);
        padding: 0.5rem;
        border-radius: 8px;
    }
    
    .password-toggle:hover {
        color: var(--accent-gold);
        background: rgba(212, 175, 55, 0.1);
    }
    
    .password-toggle:focus {
        outline: 2px solid var(--accent-gold);
        outline-offset: 2px;
    }
    
    .form-text {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .auth-footer-text {
        color: var(--text-secondary);
        font-size: 1rem;
        margin: 0;
    }
    
    .auth-link {
        color: var(--accent-gold);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition-smooth);
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
    }
    
    .auth-link:hover {
        color: var(--accent-gold-dark);
        background: rgba(212, 175, 55, 0.1);
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .auth-link:focus {
        outline: 2px solid var(--accent-gold);
        outline-offset: 2px;
    }
    
    .demo-card {
        background: var(--bg-light-alt);
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        margin-top: 2rem;
        overflow: hidden;
        transition: var(--transition-smooth);
    }
    
    .demo-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .demo-header {
        background: var(--gradient-accent);
        color: var(--text-primary);
        padding: 1rem 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
    }
    
    .demo-content {
        padding: 1.5rem;
    }
    
    .demo-account {
        margin-bottom: 1.5rem;
    }
    
    .demo-account:last-of-type {
        margin-bottom: 1rem;
    }
    
    .demo-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }
    
    .demo-credentials {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-family: 'Courier New', monospace;
        background: var(--bg-light);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        font-size: 0.9rem;
    }
    
    .demo-email {
        color: var(--accent-gold-dark);
        font-weight: 600;
    }
    
    .demo-separator {
        color: var(--text-muted);
    }
    
    .demo-password {
        color: var(--text-secondary);
        font-weight: 600;
    }
    
    .demo-note {
        color: var(--text-muted);
        font-size: 0.85rem;
        font-style: italic;
        display: block;
        text-align: center;
    }
    
    /* Responsive Design */
    @media (max-width: 767.98px) {
        .auth-card-body {
            padding: 2rem 1.5rem;
        }
        
        .auth-title {
            font-size: 2rem;
        }
        
        .auth-subtitle {
            font-size: 1rem;
        }
        
        .form-control-modern {
            padding: 0.875rem 0.875rem 0.875rem 3rem;
        }
        
        .input-icon {
            left: 1rem;
        }
        
        .password-toggle {
            right: 1rem;
        }
        
        .demo-credentials {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }
        
        .demo-separator {
            display: none;
        }
    }
    
    /* Animation pour les erreurs */
    .alert-modern.alert-danger {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        border: 1px solid #f87171;
        color: #dc2626;
    }
    
    .alert-modern.alert-danger i {
        color: #dc2626;
    }
</style>

<script>
    // Fonction pour afficher/masquer le mot de passe
    function togglePassword() {
        const passwordInput = document.getElementById('mot_de_passe');
        const toggleIcon = document.getElementById('password-toggle-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Animation des champs au focus
    document.querySelectorAll('.form-control-modern').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
    
    // Validation en temps réel
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && !emailRegex.test(email)) {
            this.style.borderColor = '#f87171';
        } else {
            this.style.borderColor = '#e2e8f0';
        }
    });
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 