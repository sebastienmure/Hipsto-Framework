<?php

require_once (realpath('./AccueilController.php'));

use \AccueilController;

$controller = new AccueilController(null,null);

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billet') {
      if (isset($_GET['id'])) {
        $idBillet = intval($_GET['id']);
        if ($idBillet != 0)
          billet($idBillet);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    $controller->accueil();  // action par défaut
  }
}
catch (Exception $e) {
    $controller->erreur($e->getMessage());
}

?>