<?php
$title = "Changer mon mot de passe - Murder Party";
include_once('view/autres_pages/header.php');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-key"></i> Changer mon mot de passe
                </h1>
                <a href="/profil" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Retour au profil
                </a>
            </div>
        </div>
    </div>

    <!-- Affichage des erreurs -->
    <?php if (!empty($erreurs)): ?>
    <div class="row">
        <div class="col-12">
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
    <div class="row">
        <div class="col-12">
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
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Sécurité du compte
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/profil/mot_de_passe">
                        <div class="mb-4">
                            <label for="ancien_mot_de_passe" class="form-label">
                                <i class="fas fa-lock me-2"></i>
                                Mot de passe actuel *
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="ancien_mot_de_passe" 
                                name="ancien_mot_de_passe" 
                                placeholder="Saisissez votre mot de passe actuel"
                                required>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Confirmez votre identité avec votre mot de passe actuel.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nouveau_mot_de_passe" class="form-label">
                                <i class="fas fa-key me-2"></i>
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
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Minimum 6 caractères. Utilisez un mélange de lettres, chiffres et symboles.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nouveau_mot_de_passe_confirm" class="form-label">
                                <i class="fas fa-check-double me-2"></i>
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
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Ressaisissez le nouveau mot de passe pour confirmation.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
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

    <!-- Conseils de sécurité -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Conseils de sécurité
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>✅ Mot de passe fort :</h6>
                            <ul class="small">
                                <li>Au moins 8 caractères</li>
                                <li>Majuscules et minuscules</li>
                                <li>Chiffres et symboles</li>
                                <li>Unique pour ce site</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>❌ À éviter :</h6>
                            <ul class="small">
                                <li>Informations personnelles</li>
                                <li>Mots du dictionnaire</li>
                                <li>Suites de caractères</li>
                                <li>Réutiliser d'anciens mots de passe</li>
                            </ul>
                        </div>
                    </div>
                    <div class="alert alert-warning mt-3 mb-0">
                        <small>
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            <strong>Important :</strong> Après avoir changé votre mot de passe, vous devrez vous reconnecter sur tous vos appareils.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
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