<?php
namespace src\model\helper;

require_once '../model/helper/AbsHelper.php';
require_once '../model/zone.php';
require_once '../model/user.php';

use src\model\helper\AbsHelper;
use src\model\Zone;
use src\model\User;

/**
 * 
 */
class ZoneHelper extends AbsHelper
{
	protected function statementToEntity($rep)
	{
		$zone = new Zone();
		$zone->setZoneId($rep[Zone::ID]);
		$zone->setCounrtyCode($rep[Zone::COUNTRYCODE]);
		$zone->setZoneName($rep[Zone::NAME]);
		
		return $zone;
	}
	
    public function getAll()
    {
    	$query = "select * from zone z";
    	$zones = null;
    	
    	$reps = $this->query($query);
    	
    	if($reps != null)
    	{
    		$zones = array();
    		$index = 0;
    		
    		foreach ($reps as $rep)
    		{
    			$zones[$index] = $this->statementToEntity($rep);
    			$index++;
    		}
    	}
    	
    	return $zones;
    }
    
    public function getAllByUser($user)
    {
    	return $this->getAllByUserID($user);
    }
    
    public function getAllByUserID($userId)
    {
    	$query = "select z." . Zone::ID . ", z." . Zone::COUNTRYCODE . ", z." . Zone::NAME . " from zone z, user u, voit v "
    			. "where v." . User::ID . "=" . $userId
    			. " and z." . Zone::ID . "= v." . Zone::ID;
    	$zones = null;
    
    	$reps = $this->query($query);
    
    	if($reps != null)
    	{
    		$zones = array();
    		$index = 0;
    		foreach ($reps as $rep)
    		{
    			$zones[$index] = $this->statementToEntity($rep);
    			$index++;
    		}
    	}
    
    	return $zones;
    }
    
    public function getOneById($id)
    {
        $query = "select * from zone z where z." . Zone::ID . " = " . $id;
		$zone = null;
		
		$rep = $this->query($query);
		
		if($rep != null)
			$zone = $this->statementToEntity($rep[0]);
		
		return $zone;
    }

    public function update($obj)
    {
    	$query = "update table zone set "
    		. Zone::COUNTRYCODE . " = " . $obj->getCounrtyCode() . ", "
    		. Zone::NAME . " = " . $obj->getZoneName() . " where "
    		. Zone::ID . " = " . $obj->getZoneId();
    	
    	$rep = query(query);
    	
    	if($rep == FALSE)
    		throw new \Exception("Shit happenned... ZoneHelper L47");
    }

    public function remove($obj) {
        // TODO implement here
    }
}