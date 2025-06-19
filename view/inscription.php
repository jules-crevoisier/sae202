<?php 
$page_title = 'Inscription - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<style>
    /* Page d'inscription - Style exact de l'image */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: url('/assets/img/imageHeroFond.png') center/cover;
        position: relative;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
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
        padding: 2rem 0;
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
        align-items: center;
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
        max-width: 450px;
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

    /* Messages d'alerte */
    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border: 1px solid;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.2rem;
    }

    .alert p {
        margin: 0;
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

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-check {
        background: rgba(212, 165, 116, 0.1);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(212, 165, 116, 0.3);
    }

    .form-check input[type="checkbox"] {
        margin-right: 0.5rem;
        accent-color: #742939;
    }

    .form-check label {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
        margin: 0;
    }

    .form-check label a {
        color: #A94803;
        text-decoration: none;
        font-weight: 600;
    }

    .form-check label a:hover {
        text-decoration: underline;
    }

    .btn-register {
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

    .btn-register:hover {
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

        .form-row {
            grid-template-columns: 1fr;
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
                <img src="/assets/img/ornementHeader.png" alt="Ornement décoratif" />
            </div>

            <div class="auth-layout">
                <!-- Colonne gauche - Rejoignez l'aventure -->
                <div class="welcome-section">
                    <h1 class="welcome-title">Rejoignez<br>l'aventure</h1>
                    <p class="welcome-subtitle">
                        Créez votre compte pour vous inscrire à nos Murder Party et vivre des 
                        soirées inoubliables.
                    </p>
                </div>

                <!-- Colonne droite - Formulaire d'inscription -->
                <div class="form-section">
                    <h2 class="form-title">Inscription</h2>
                    
                    <?php if (!empty($erreurs)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($erreurs as $erreur): ?>
                                    <li><?php echo htmlspecialchars($erreur); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($succes) && $succes): ?>
                        <div class="alert alert-success">
                            <p><strong>Félicitations !</strong> Votre compte a été créé avec succès. Vous pouvez maintenant <a href="/auth/connexion">vous connecter</a>.</p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!isset($succes) || !$succes): ?>
                    <form method="POST" action="/auth/inscription">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="prenom" class="form-label">Prénom</label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           id="prenom" 
                                           name="prenom" 
                                           class="form-control" 
                                           placeholder="Votre prénom"
                                           required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom</label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           id="nom" 
                                           name="nom" 
                                           class="form-control" 
                                           placeholder="Votre nom"
                                           required>
                                    <i class="fas fa-user input-icon"></i>
                                </div>
                            </div>
                        </div>

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
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="form-label">Confirmation Mot de passe</label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       id="password_confirm" 
                                       name="mot_de_passe_confirm" 
                                       class="form-control" 
                                       placeholder="••••••••"
                                       required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <div class="input-wrapper">
                                    <input type="tel" 
                                           id="telephone" 
                                           name="telephone" 
                                           class="form-control" 
                                           placeholder="06 12 34 56 78">
                                    <i class="fas fa-phone input-icon"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="age" class="form-label">Âge</label>
                                <div class="input-wrapper">
                                    <input type="number" 
                                           id="age" 
                                           name="age" 
                                           class="form-control" 
                                           placeholder="25"
                                           min="16"
                                           required>
                                    <i class="fas fa-calendar input-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">
                                J'accepte les <a href="/mentions-legales">conditions d'utilisation</a> et la <a href="/politique-confidentialite">politique de confidentialité</a> *
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            <label for="newsletter">
                                Vous souhaitez recevoir nos communications ?
                            </label>
                        </div>

                        <button type="submit" class="btn-register">
                            S'inscrire
                        </button>
                    </form>

                    <div class="auth-footer">
                        <p>Déjà un compte ? <a href="/auth/connexion">Se connecter</a></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 