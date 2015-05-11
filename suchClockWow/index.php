<?php
$srcPath = realpath('./src');

require ($srcPath . '/routing/Router.php');

use src\routing\Router;

//echo "<h1>ima index.php</h1>";

$router = Router::getInstance();

//Définition du dossier contenant les controlleur
//$router->setPath(realpath('./src/controller/'));
$router->setPath(realpath('./'));

// Si aucun controller n'est spécifié on appèlera accueilController et sa méthode index()
$router->setDefaultController('Accueil');

// En cas d'url invalid on appèlera le controller errorController et sa méthode alert()
$router->setErrorControllerAction('Error', 'alert');

// L'url http://monsite.com/actualites/archives/2012/01/PHP sera redirigé vers
// actualitesController et sa méthode index(). Les paramètres annee, mois , catégorie seront passer au controller par le routeur.

$router->addRule('accueil/bitchAssRoute', array('controller' => 'Accueil', 'action' => 'index'));

$router->addRule('accueil/accueil', array('controller' => 'Accueil', 'action' => 'accueil'));

$router->load();

?>