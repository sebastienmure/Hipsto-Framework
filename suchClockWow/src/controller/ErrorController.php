<?php
namespace src\controller;

class ErrorController
{
	private $params = null;
	private $lang = null;
	
	public function __construct($pparams, $plang)
	{
		$this->params = $pparams;
		$this->lang = $plang;
	}
	
	public function alert()
	{
		return "Alert comin from ErrorController::alert()";
	}
}

?>