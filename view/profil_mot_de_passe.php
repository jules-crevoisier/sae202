<?php
$title = "Changer mon mot de passe - Murder Party";
include_once('view/autres_pages/header.php');
?>

<style>
    /* Styles pour la page mot de passe avec direction artistique du site */
    body {

        min-height: 100vh;
    }
    
    .main-content {
        padding-top: 120px;
        position: relative;
    }
    
    .main-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: repeating-linear-gradient(
            90deg,
            rgba(116, 41, 57, 0.03) 0px,
            rgba(116, 41, 57, 0.03) 1px,
            transparent 1px,
            transparent 20px
        );
        pointer-events: none;
    }
    
    .container-custom {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    /* Ornement décoratif */
    .ornament-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .ornament-header img {
        height: 120px;
        width: auto;
        opacity: 0.8;
        filter: brightness(0) saturate(100%) invert(23%) sepia(18%) saturate(1847%) hue-rotate(314deg) brightness(95%) contrast(89%);
    }
    
    .password-header {
        text-align: center;
        padding: 2rem 0 3rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
    }
    
    .password-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #742939;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }
    
    .password-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(116, 41, 57, 0.1);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
    }
    
    .password-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #742939, #A94803);
    }
    
    .password-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(116, 41, 57, 0.15);
        border-color: rgba(116, 41, 57, 0.2);
    }
    
    .form-control {
        border: 2px solid rgba(116, 41, 57, 0.2);
        border-radius: 12px;
        background: white;
        color: #333;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(116, 41, 57, 0.05);
        padding: 1rem;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #A94803;
        box-shadow: 0 0 0 3px rgba(169, 72, 3, 0.1);
        background: white;
    }
    
    .btn-outline-secondary {
        background: transparent;
        border: 2px solid #742939;
        color: #742939;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-outline-secondary:hover {
        background: #742939;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.3);
    }
    
    .btn-primary {
        background: #A94803;
        border-color: #A94803;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-primary:hover {
        background: #742939;
        border-color: #742939;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(116, 41, 57, 0.3);
    }
</style>

<div class="main-content">
    <div class="container-custom">
        <!-- Ornement décoratif -->
        <div class="ornament-header">
            <img src="/assets/img/ornement1Couleur.png" alt="Ornement décoratif" />
        </div>
        
        <!-- Header de la page -->
        <div class="password-header">
            <h1 class="password-title">Changer mon mot de passe</h1>
            <div class="mt-3">
                <a href="/profil" class="btn-outline-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border: 2px solid #742939; color: #742939; text-decoration: none; border-radius: 20px; transition: all 0.3s ease;">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour au profil
                </a>
            </div>
        </div>

        <div class="col-lg-8">

    <!-- Affichage des erreurs -->
    <?php if (!empty($erreurs)): ?>
            <div class="password-card">
                <div class="card-body">
            <div class="alert alert-danger">
                <h6><i class="fas fa-exclamation-triangle me-2"></i>Erreurs :</h6>
                <ul class="mb-0">
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= htmlspecialchars($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Message de succès -->
    <?php if ($succes): ?>
            <div class="password-card">
                <div class="card-body">
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                Votre mot de passe a été modifié avec succès !
                <hr>
                <a href="/profil" class="btn btn-success">
                    <i class="fas fa-user me-2"></i>
                    Retour au profil
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!$succes): ?>
            <div class="password-card">
                <div class="card-body" style="padding: 2.5rem;">
                    <h3 style="color: #742939; font-weight: 700; font-size: 1.5rem; margin-bottom: 2rem; display: flex; align-items: center;">
                        <i class="fas fa-shield-alt" style="color: #A94803; margin-right: 1rem; font-size: 1.3rem;"></i>
                        Sécurité du compte
                    </h3>
                    
                    <form method="POST" action="/profil/mot_de_passe">
                        <div class="mb-4">
                            <label for="ancien_mot_de_passe" class="form-label" style="color: #742939; font-weight: 600; display: flex; align-items: center;">
                                <i class="fas fa-lock me-2" style="color: #A94803;"></i>
                                Mot de passe actuel *
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="ancien_mot_de_passe" 
                                name="ancien_mot_de_passe" 
                                placeholder="Saisissez votre mot de passe actuel"
                                required>
                            <div class="form-text" style="color: #8B4513; font-size: 0.85rem; margin-top: 0.5rem;">
                                <i class="fas fa-info-circle me-1"></i>
                                Confirmez votre identité avec votre mot de passe actuel.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nouveau_mot_de_passe" class="form-label" style="color: #742939; font-weight: 600; display: flex; align-items: center;">
                                <i class="fas fa-key me-2" style="color: #A94803;"></i>
                                Nouveau mot de passe *
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="nouveau_mot_de_passe" 
                                name="nouveau_mot_de_passe" 
                                placeholder="Choisissez un nouveau mot de passe"
                                minlength="6"
                                required>
                            <div class="form-text" style="color: #8B4513; font-size: 0.85rem; margin-top: 0.5rem;">
                                <i class="fas fa-info-circle me-1"></i>
                                Minimum 6 caractères. Utilisez un mélange de lettres, chiffres et symboles.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nouveau_mot_de_passe_confirm" class="form-label" style="color: #742939; font-weight: 600; display: flex; align-items: center;">
                                <i class="fas fa-check-double me-2" style="color: #A94803;"></i>
                                Confirmer le nouveau mot de passe *
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="nouveau_mot_de_passe_confirm" 
                                name="nouveau_mot_de_passe_confirm" 
                                placeholder="Confirmez votre nouveau mot de passe"
                                minlength="6"
                                required>
                            <div class="form-text" style="color: #8B4513; font-size: 0.85rem; margin-top: 0.5rem;">
                                <i class="fas fa-info-circle me-1"></i>
                                Ressaisissez le nouveau mot de passe pour confirmation.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <a href="/profil" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Changer le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nouveauMdp = document.getElementById('nouveau_mot_de_passe');
    const confirmMdp = document.getElementById('nouveau_mot_de_passe_confirm');
    
    // Vérification en temps réel de la correspondance des mots de passe
    function verifierCorrespondance() {
        if (nouveauMdp.value && confirmMdp.value) {
            if (nouveauMdp.value === confirmMdp.value) {
                confirmMdp.classList.remove('is-invalid');
                confirmMdp.classList.add('is-valid');
            } else {
                confirmMdp.classList.remove('is-valid');
                confirmMdp.classList.add('is-invalid');
            }
        } else {
            confirmMdp.classList.remove('is-valid', 'is-invalid');
        }
    }
    
    nouveauMdp.addEventListener('input', verifierCorrespondance);
    confirmMdp.addEventListener('input', verifierCorrespondance);
    
    // Indicateur de force du mot de passe
    nouveauMdp.addEventListener('input', function() {
        const mdp = this.value;
        let force = 0;
        
        if (mdp.length >= 6) force++;
        if (mdp.length >= 8) force++;
        if (/[a-z]/.test(mdp)) force++;
        if (/[A-Z]/.test(mdp)) force++;
        if (/[0-9]/.test(mdp)) force++;
        if (/[^A-Za-z0-9]/.test(mdp)) force++;
        
        // Supprimer les anciennes classes
        this.classList.remove('is-valid', 'is-invalid');
        
        if (mdp.length > 0) {
            if (force < 3) {
                this.classList.add('is-invalid');
            } else {
                this.classList.add('is-valid');
            }
        }
    });
});
</script>

<?php include_once('view/autres_pages/footer.php'); ?> 