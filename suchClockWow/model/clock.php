<?php
namespace model;

class Clock
{
	private $id = -1;
	private $nom = null;
	private $zone = null;
	
	public function __construct()
	{
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	public function getZone() {
		return $this->zone;
	}
	public function setZone($zone) {
		$this->zone = $zone;
		return $this;
	}
	
	
	
}

?>