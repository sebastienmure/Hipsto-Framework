<?php
namespace src\tests;

var_dump("expression");
die();

require_once "..\model\zone.php";
require_once "..\model\helper\ZoneHelper.php";
require_once "\..\model\helper\HelperFactory.php";

use src\model\Zone;
use src\model\helper\ZoneHelper;
use src\model\helper\HelperFactory;

function testGet($class)
{
	$zh = HelperFactory::getInstance()->getHelper($class);
	$zone = null;
	
	if ($zh == null)
		echo "pb ac HelperFactory";
	else
	{
		if($class === "user")
			$lol = 0;
		else
			$lol = 1;
		$zone = $zh->getOneById($lol);
		if ($zone == null)
			echo "pb ac " . ucfirst($class) . "Helper";
		else
			var_dump($zone);
	}
}

function testGetZoneForUserId($userId)
{
	$zh = HelperFactory::getInstance()->getHelper("zone");
	$zones = null;

	if ($zh == null)
		echo "pb ac HelperFactory";
	else
	{
		$zones = $zh->getAllByUserId($userId);
		if ($zones == null)
			echo "pb ac ZoneHelper";
		else
			var_dump($zones);
	}
}

testGet("zone");
testGet("user");
testGetZoneForUserId(0);
?>