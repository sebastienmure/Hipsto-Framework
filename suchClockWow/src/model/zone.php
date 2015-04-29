<?php
namespace src\model;

class Zone
{
	const NBCOL = 3;
	const ID = "zone_id";
	const COUNTRYCODE = "country_code";
	const NAME = "zone_name";
	
    private $zone_id;
	private $counrty_code;
	private $zone_name;

	public function __construct()
	{
	}
	
	public function getZoneId() {
		return $this->zone_id;
	}
	public function setZoneId($zone_id) {
		$this->zone_id = $zone_id;
		return $this;
	}
	public function getCounrtyCode() {
		return $this->counrty_code;
	}
	public function setCounrtyCode($counrty_code) {
		$this->counrty_code = $counrty_code;
		return $this;
	}
	public function getZoneName() {
		return $this->zone_name;
	}
	public function setZoneName($zone_name) {
		$this->zone_name = $zone_name;
		return $this;
	}
	
}