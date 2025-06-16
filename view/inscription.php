<?php 
$page_title = 'Inscription - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <h1 class="display-5 text-accent">
                    <i class="fas fa-user-plus"></i> Inscription
                </h1>
                <p class="lead">Rejoignez notre communauté de détectives en herbe</p>
            </div>

            <?php if ($succes): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>Félicitations !</strong> Votre inscription a été enregistrée avec succès.
                    Vous pouvez maintenant vous <a href="/auth/connexion" class="alert-link">connecter</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (!empty($erreurs)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Erreur !</strong> Veuillez corriger les problèmes suivants :
                    <ul class="mb-0 mt-2">
                        <?php foreach ($erreurs as $erreur): ?>
                            <li><?= securise($erreur) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body p-4">
                    <form method="POST" action="/auth/inscription">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label text-accent">
                                    <i class="fas fa-user"></i> Prénom *
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="prenom" 
                                       name="prenom" 
                                       value="<?= securise($_POST['prenom'] ?? '') ?>"
                                       required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label text-accent">
                                    <i class="fas fa-user"></i> Nom *
                                </label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nom" 
                                       name="nom" 
                                       value="<?= securise($_POST['nom'] ?? '') ?>"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-accent">
                                <i class="fas fa-envelope"></i> Adresse email *
                            </label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   value="<?= securise($_POST['email'] ?? '') ?>"
                                   required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mot_de_passe" class="form-label text-accent">
                                    <i class="fas fa-lock"></i> Mot de passe *
                                </label>
                                <input type="password" 
                                       class="form-control" 
                                       id="mot_de_passe" 
                                       name="mot_de_passe" 
                                       minlength="6"
                                       required>
                                <div class="form-text">Au moins 6 caractères</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mot_de_passe_confirm" class="form-label text-accent">
                                    <i class="fas fa-lock"></i> Confirmer le mot de passe *
                                </label>
                                <input type="password" 
                                       class="form-control" 
                                       id="mot_de_passe_confirm" 
                                       name="mot_de_passe_confirm" 
                                       minlength="6"
                                       required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telephone" class="form-label text-accent">
                                    <i class="fas fa-phone"></i> Téléphone
                                </label>
                                <input type="tel" 
                                       class="form-control" 
                                       id="telephone" 
                                       name="telephone" 
                                       value="<?= securise($_POST['telephone'] ?? '') ?>"
                                       placeholder="06 12 34 56 78">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label text-accent">
                                    <i class="fas fa-birthday-cake"></i> Âge *
                                </label>
                                <input type="number" 
                                       class="form-control" 
                                       id="age" 
                                       name="age" 
                                       value="<?= intval($_POST['age'] ?? '') ?>"
                                       min="12" 
                                       max="120"
                                       required>
                                <div class="form-text">Minimum 12 ans</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="conditions" 
                                       name="conditions" 
                                       required>
                                <label class="form-check-label" for="conditions">
                                    J'accepte les <a href="/mentions" class="text-accent" target="_blank">conditions d'utilisation</a> et la politique de confidentialité *
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus"></i> Créer mon compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p>
                    Vous avez déjà un compte ? 
                    <a href="/auth/connexion" class="text-accent text-decoration-none">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </a>
                </p>
            </div>

            <!-- Informations supplémentaires -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="text-accent mb-3">
                        <i class="fas fa-info-circle"></i> Pourquoi s'inscrire ?
                    </h5>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-calendar-check text-accent me-2"></i>
                            Réserver votre place
                        </div>
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-envelope text-accent me-2"></i>
                            Messagerie privée
                        </div>
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-comment text-accent me-2"></i>
                            Laisser des commentaires
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
    } else {
        this.setCustomValidity('');
    }
});
</script>

<?php require_once('view/autres_pages/footer.php'); ?> 