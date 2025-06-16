<?php
require_once('conf/config.php');
require_once('model/Comment.php');

function index() {
    // Récupérer les commentaires approuvés
    $commentaires = Comment::getApproved();
    
    // Inclure la vue d'accueil
    require_once('view/accueil.php');
}
?> 