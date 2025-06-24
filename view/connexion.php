<?php 
$page_title = 'Connexion - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Page de connexion - Style exact de l'image */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: url('/assets/img/imageHeroFond.png') center/cover;
        position: relative;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        pointer-events: none;
    }

    .main-content {
        position: relative;
        z-index: 2;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Section principale */
    .auth-section {
        flex: 1;
        display: flex;
        align-items: center;
        padding: 6rem 0 2rem 0;
    }

    .container-custom {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        width: 100%;
    }

    /* Ornement décoratif */
    .ornament-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .ornament-header img {
        height: 100px;
        width: auto;
        opacity: 0.8;
    }



    /* Layout en deux colonnes */
    .auth-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }

    /* Colonne gauche - Texte de bienvenue */
    .welcome-section {
        color: white;
    }

    .welcome-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .welcome-subtitle {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 0;
        max-width: 400px;
    }

    /* Colonne droite - Formulaire */
    .form-section {
        background: rgba(255, 248, 240, 0.95);
        border-radius: 15px;
        padding: 2.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 2rem;
        text-align: center;
        text-transform: uppercase;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #742939;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 1rem 2.5rem 1rem 1rem;
        border: 2px solid #D4A574;
        border-radius: 8px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #742939;
        box-shadow: 0 0 0 3px rgba(116, 41, 57, 0.1);
    }

    .form-control::placeholder {
        color: #999;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #D4A574;
        font-size: 0.9rem;
        pointer-events: none;
    }

    .forgot-password {
        text-align: right;
        margin-top: 0.5rem;
    }

    .forgot-password a {
        color: #A94803;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        background: #A94803;
        color: white;
        padding: 1rem;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .btn-login:hover {
        background: #8a3803;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(169, 72, 3, 0.3);
    }

    .auth-footer {
        text-align: center;
        margin-top: 2rem;
        color: #666;
        font-size: 0.95rem;
    }

    .auth-footer a {
        color: #A94803;
        text-decoration: none;
        font-weight: 600;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .auth-layout {
            grid-template-columns: 1fr;
            gap: 2rem;
            text-align: center;
        }

        .welcome-title {
            font-size: 2.5rem;
        }

        .form-section {
            padding: 2rem;
        }

        .ornament-header img {
            height: 80px;
        }
    }

    @media (max-width: 576px) {
        .welcome-title {
            font-size: 2rem;
        }

        .form-section {
            padding: 1.5rem;
        }

        .container-custom {
            padding: 0 1rem;
        }
    }
</style>

<div class="main-content">
        <section class="auth-section">
        <div class="container-custom">
            <!-- Ornement décoratif -->
            <div class="ornament-header">
                <img src="/assets/img/ornement1.png" alt="Ornement décoratif" />
            </div>

            <div class="auth-layout">
                <!-- Colonne gauche - Bienvenue -->
                <div class="welcome-section">
                    <h1 class="welcome-title">Bienvenue</h1>
                    <p class="welcome-subtitle">
                        Connectez-vous pour accéder à votre espace personnel et réserver 
                        votre participation à la Murder Party.
                    </p>
                </div>

                <!-- Colonne droite - Formulaire de connexion -->
                <div class="form-section">
                    <h2 class="form-title">Connexion</h2>
                    
                    <form method="POST" action="/auth/connexion">
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-control" 
                                       placeholder="votre@email.com"
                                       required>
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       id="password" 
                                       name="mot_de_passe" 
                                       class="form-control" 
                                       placeholder="••••••••"
                                       required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                            <div class="forgot-password">
                                <a href="/auth/mot-de-passe-oublie">Mot de passe oublié ?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn-login">
                            Se connecter
                        </button>
                    </form>

                    <div class="auth-footer">
                        <p>Pas encore de compte ? <a href="/auth/inscription">Créer un compte</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 