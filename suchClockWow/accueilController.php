<?php

namespace \src\controller

require_once (realpath("./src/model/helper/ZoneHelper.php"));
require_once (realpath("./src/model/helper/HelperFactory.php"));

use src\model\helper\ZoneHelper;
use src\model\helper\HelperFactory;

Class AccueilController
{
	private $params = null;
	private $lang = null;
	
	function __construct($leparams,$lelang)
	{
		$params = $leparams;
		$lang = $lelang;
	}

	function zoneUser($idUser) { // affiche les zones spécifique de l'User
		$zones = getAllByUserID();
		require realpath('./vueAccueil.php');
	}

	function accueil() { //affiche toute les zones
	  $zones = HelperFactory::getInstance()->getHelper("zone")->getAll();
	  var_dump(realpath("."));
	  require_once realpath('./vueAccueil.php');
	}

	// ajouter zone à l'user
	function ajoutzone($idUser) {

	  require realpath('./vueAjoutzone.php');
	}

	// Affiche une erreur
	function erreur($msgErreur) {
	  require realpath('./vueErreur.php');
	}


	function login ($username,$usermdp)
	{
		//TODO
		//require vueLogin.php
	}
}