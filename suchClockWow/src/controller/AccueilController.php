<?php
namespace src\controller;

class AccueilController
{
	private $params = null;
	private $lang = null;
	
	public function __construct($pparams, $plang)
	{
		$this->params = $pparams;
		$this->lang = $plang;
	}
	
	public function index()
	{
		return "Comin from AccueilController::index()";
	}
}

?>