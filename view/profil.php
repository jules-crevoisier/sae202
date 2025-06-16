<?php 
$page_title = 'Mon profil - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Header de la page -->
            <div class="text-center mb-4">
                <h1 class="display-5 text-accent">
                    <i class="fas fa-user-edit"></i> Mon profil
                </h1>
                <p class="lead">Gérez vos informations personnelles</p>
            </div>

            <?php if ($succes): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <strong>Succès !</strong> Votre profil a été mis à jour avec succès.
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

            <!-- Navigation des onglets -->
            <ul class="nav nav-tabs mb-4" id="profilTabs" role="tablist">
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
                <div class="tab-pane fade show active" id="infos" role="tabpanel">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="card-title text-accent mb-4">
                                <i class="fas fa-user"></i> Informations personnelles
                            </h5>
                            
                            <form method="POST" action="/profil">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="prenom" class="form-label text-accent">
                                            <i class="fas fa-user"></i> Prénom *
                                        </label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="prenom" 
                                               name="prenom" 
                                               value="<?= securise($user['prenom'] ?? '') ?>"
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
                                               value="<?= securise($user['nom'] ?? '') ?>"
                                               required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label text-accent">
                                        <i class="fas fa-envelope"></i> Adresse email
                                    </label>
                                    <input type="email" 
                                           class="form-control" 
                                           id="email" 
                                           value="<?= securise($user['email'] ?? '') ?>"
                                           disabled>
                                    <div class="form-text">L'adresse email ne peut pas être modifiée</div>
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
                                               value="<?= securise($user['telephone'] ?? '') ?>"
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
                                               value="<?= intval($user['age'] ?? '') ?>"
                                               min="12" 
                                               max="120"
                                               required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-accent">
                                        <i class="fas fa-calendar-alt"></i> Membre depuis
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           value="<?= date('d/m/Y', strtotime($user['date_inscription'] ?? '')) ?>"
                                           disabled>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Enregistrer les modifications
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Changement de mot de passe -->
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="card-title text-accent mb-4">
                                <i class="fas fa-lock"></i> Changer le mot de passe
                            </h5>
                            
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                Pour votre sécurité, veuillez choisir un mot de passe fort contenant au moins 6 caractères.
                            </div>
                            
                            <a href="/profil/mot_de_passe" class="btn btn-outline-light">
                                <i class="fas fa-key"></i> Modifier mon mot de passe
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope fa-2x text-accent mb-3"></i>
                            <h6>Messagerie</h6>
                            <p class="small">Contactez les organisateurs</p>
                            <a href="/messagerie" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-envelope"></i> Accéder
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-comment fa-2x text-accent mb-3"></i>
                            <h6>Commentaires</h6>
                            <p class="small">Partagez votre expérience</p>
                            <a href="/commentaire" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-comment"></i> Commenter
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-sign-out-alt fa-2x text-accent mb-3"></i>
                            <h6>Déconnexion</h6>
                            <p class="small">Quitter votre session</p>
                            <a href="/auth/deconnexion" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 