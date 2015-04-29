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
			$user = $this->statementToEntity($rep);
		
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
    		echo "rep false...";
    		throw new \Exception("Shit happenned... ZoneHelper L47");
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
}