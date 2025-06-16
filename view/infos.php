<?php 
$page_title = 'Infos pratiques - Murder Party';
require_once('view/autres_pages/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Header de la page -->
            <div class="text-center mb-5">
                <h1 class="display-4 text-accent">
                    <i class="fas fa-info-circle"></i> Informations pratiques
                </h1>
                <p class="lead">Tout ce que vous devez savoir pour participer</p>
            </div>

            <!-- Informations générales -->
            <section class="mb-5">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="text-accent mb-4">
                            <i class="fas fa-map-marker-alt"></i> Lieu et Accès
                        </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-accent">Château de Vaux</h5>
                                <p class="mb-3">
                                    <i class="fas fa-map-marker-alt text-accent me-2"></i>
                                    123 Route du Château<br>
                                    10000 Troyes, France
                                </p>
                                
                                <h6 class="text-accent">En voiture</h6>
                                <ul class="mb-3">
                                    <li>Autoroute A5, sortie 20 "Troyes Centre"</li>
                                    <li>Suivre "Château de Vaux" sur 8 km</li>
                                    <li>Parking gratuit sur place (50 places)</li>
                                </ul>
                                
                                <h6 class="text-accent">En transport en commun</h6>
                                <ul class="mb-0">
                                    <li>Gare SNCF de Troyes (ligne Paris-Mulhouse)</li>
                                    <li>Bus ligne 12 direction "Vaux" (arrêt "Château")</li>
                                    <li>Navette gratuite depuis la gare à 18h30</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-secondary">
                                    <div class="card-body text-center">
                                        <i class="fas fa-clock fa-3x text-accent mb-3"></i>
                                        <h5>Horaires</h5>
                                        <p class="mb-2"><strong>Accueil :</strong> 19h00</p>
                                        <p class="mb-2"><strong>Début :</strong> 19h30</p>
                                        <p class="mb-0"><strong>Fin :</strong> 23h00</p>
                                        <hr>
                                        <small class="text-muted">
                                            Merci d'arriver à l'heure pour ne pas manquer le début de l'intrigue !
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Programme de la soirée -->
            <section class="mb-5">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="text-accent mb-4">
                            <i class="fas fa-calendar-alt"></i> Programme de la soirée
                        </h2>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-handshake text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>19h00 - 19h30 : Accueil</h5>
                                        <p>Arrivée des participants, distribution des rôles et costumes, cocktail de bienvenue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-users text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>19h30 - 20h00 : Immersion</h5>
                                        <p>Présentation des personnages, mise en situation et début de l'intrigue</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-skull text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>20h00 - 20h15 : Le Crime</h5>
                                        <p>Découverte du meurtre et début de l'enquête</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-utensils text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>20h15 - 22h00 : Dîner-enquête</h5>
                                        <p>Repas thématique avec investigation, interrogatoires et révélations</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-search text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>22h00 - 22h30 : Accusations</h5>
                                        <p>Chaque participant expose sa théorie et désigne le coupable</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="fas fa-trophy text-white"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5>22h30 - 23h00 : Dénouement</h5>
                                        <p>Révélation de la solution, remise des prix et pot de l'amitié</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ce qu'il faut apporter -->
            <section class="mb-5">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="text-accent mb-3">
                                    <i class="fas fa-suitcase"></i> À apporter
                                </h3>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Costume d'époque (années 1920) si possible</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Carnet et stylo pour vos notes</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Bonne humeur et esprit d'équipe</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Pièce d'identité</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="text-accent mb-3">
                                    <i class="fas fa-gift"></i> Fourni sur place
                                </h3>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Fiche personnage détaillée</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Accessoires de costume</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Repas complet et boissons</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Indices et documents d'enquête</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Infos pratiques -->
            <section class="mb-5">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="text-accent mb-4">
                            <i class="fas fa-exclamation-circle"></i> Informations importantes
                        </h2>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="alert alert-info">
                                    <h6><i class="fas fa-users"></i> Participants</h6>
                                    <p class="mb-0">6 à 12 joueurs<br>Âge minimum : 16 ans</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="alert alert-warning">
                                    <h6><i class="fas fa-euro-sign"></i> Tarification</h6>
                                    <p class="mb-0">25€ par personne<br>Repas et boissons inclus</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="alert alert-danger">
                                    <h6><i class="fas fa-times-circle"></i> Annulation</h6>
                                    <p class="mb-0">Gratuite jusqu'à 48h avant<br>50% au-delà</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5 class="text-accent">Allergies et régimes spéciaux</h5>
                            <p class="mb-3">
                                Merci de nous signaler toute allergie alimentaire ou régime particulier 
                                lors de votre inscription. Nous nous efforcerons de nous adapter dans la mesure du possible.
                            </p>
                            
                            <h5 class="text-accent">Accessibilité</h5>
                            <p class="mb-0">
                                Le château dispose d'un accès pour les personnes à mobilité réduite. 
                                N'hésitez pas à nous contacter pour organiser au mieux votre venue.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section class="mb-5">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <h3 class="text-accent mb-3">
                            <i class="fas fa-phone"></i> Besoin d'informations ?
                        </h3>
                        <p class="mb-4">
                            Notre équipe est à votre disposition pour répondre à toutes vos questions.
                        </p>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <i class="fas fa-envelope text-accent me-2"></i>
                                contact@murderparty.local
                            </div>
                            <div class="col-md-4 mb-2">
                                <i class="fas fa-phone text-accent me-2"></i>
                                03 25 XX XX XX
                            </div>
                            <div class="col-md-4 mb-2">
                                <?php if (isLoggedIn()): ?>
                                    <a href="/messagerie" class="btn btn-outline-light btn-sm">
                                        <i class="fas fa-envelope"></i> Messagerie
                                    </a>
                                <?php else: ?>
                                    <a href="/auth/inscription" class="btn btn-primary btn-sm">
                                        <i class="fas fa-user-plus"></i> S'inscrire
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php require_once('view/autres_pages/footer.php'); ?> 