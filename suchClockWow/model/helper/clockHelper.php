<?php
namespace model\helper;

require 'model/mySqlConnect.php';
require 'model/helper/iHelper.php';
require 'model/clock.php';

use model\MySqlConnect;
use model\helper\IHelper;
use model\Clock;

class ClockHelper implements IHelper
{
	//TODO pattern adapter pr mysqlconnect
	static $TOTAL_ROW = 3;
	
	public static function getAll()
	{
	}
	
	public static function getOneById($id)
	{
		$query = "select * from zone z, horloge h where h.id_ho = " . $id . " and h.zone_id = z.zone_id";
		$clock = null;
		
		MySqlConnect::getInstance()->connect();
		
		$rep = MySqlConnect::getInstance()->query($query);
		MySqlConnect::getInstance()->disconnect();
		
		
		if($rep != null)
		{
			$clock = new Clock();
			$clock->setId((int)$rep[0]['id_ho']);
			$clock->setNom($rep[0]['nom_ho']);
			$clock->setZone($rep[0]['zone_name']);
		}
		
		return $clock;
	}
	
	public static function update($clock)
	{
	}
	
	public static function remove($clock)
	{
	}
}

?>