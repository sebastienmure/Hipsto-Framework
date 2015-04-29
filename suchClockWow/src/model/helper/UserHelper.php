<?php
namespace src\model\helper;

require_once "..\model\helper\AbsHelper.php";
require_once "..\model\user.php";

use src\model\helper\AbsHelper;
use src\model\User;

class UserHelper extends AbsHelper
{
    public function getAll()
    {
        // TODO implement here
    }
    
    public function getOneById($id)
    {
        $query = "select * from user u where u." . User::ID . " = " . $id;
		$user = null;
		
		$rep = $this->query($query);
		
		if($rep != null)
		{
			$user = $this->statementToEntity($rep[0]);
			$user->setClocks( HelperFactory::getInstance()->getHelper("zone")->getAllByUserId($user->getIdUs()) );
			if($user == null)
				throw new \Exception("oh no user's clocks went wrong");
		}
		
		return $user;
    }
    
	public function update($obj)
	{
        $query = "update table user set "
    		. User::USERNAME . " = " . $obj->getUsernameUs() . ", "
    		. User::HASH . " = " . $obj->getHash() . ", "
    		. User::PASS . " = " . $obj->getPassUs() . " where "
    		. User::ID . " = " . $obj->getIdUs();
    	
    	$rep = query($query);
    	
    	if($rep == FALSE)
    	{
    		echo "rep false...";
    		throw new \Exception("Shit happenned... ZoneHelper L47");
    	}
    	
    	$this->persistZonesForUser($obj->getClocks(), $obj->getIdUs());
    	    	
    }
    
    /**
     * Persists users's zones if not already into table "voit"
     * @param $zones array of Zone pbjects
     * @param $userId
     * @throws \Exception if HelperFactory fucked up
     */
    private function persistZonesForUser($zones, $userId)
    {
    	try
    	{
    		$zhelper = HelperFactory::getInstance()->getHelper("zone");
    		if($zhelper == null)
    			throw new \Exception("Shit happened with getHelper('zone')");
    		
	    	$this->context->connect();
	    	$conn = $this->context->getPdo();
	    	$conn->beginTransaction();
	    	
	    	foreach ($zones as $zone)
	    	{
	    		if( $zhelper->getOneById($zone->getZoneId()) == null )
		    		 $conn->exec("insert into voit values ('$userId', '" . $zone->getZoneID() . "')");
	    	}
	    	
	    	// commit the transaction
	    	$conn->commit();
    	}
    	catch(PDOException $e)
    	{
    		// roll back the transaction if something failed
    		$conn->rollback();
    		echo "Error: " . $e->getMessage();
    	}
    	finally
    	{
	    	$this->context->disconnect();
    	}
    }
    
	public function remove($obj)
	{
        // TODO implement here
    }
    
    protected function statementToEntity($rep)
    {
    	$user = new User();
    	$user->setIdUs($rep[User::ID]);
    	$user->setUsernameUs($rep[User::USERNAME]);
    	$user->setPassUs($rep[User::PASS]);
    	$user->setHash($rep[User::HASH]);
    	
    	return $user;
    }
    
    public function persist(User $obj)
    {
	    $query = "insert into user values ('"
	    	. $obj->getIdUs() . "', '"
    		. $obj->getUsernameUs() . "', '"
    		. $obj->getPassUs() . "', '"
    		. $obj->getHash() . "')";
    	
    	$rep = query($query);
    	
    	$this->persistZonesForUser($obj->getClocks(), $obj->getIdUs());
    	
    	if($rep == FALSE)
    	{
    		echo "rep false...";
    		throw new \Exception("Shit happenned... ZoneHelper L47");
    	}
    }
}