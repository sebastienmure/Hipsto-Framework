<?php
namespace src\model\helper;

require_once "..\model\helper\UserHelper.php";
require_once "..\model\helper\ZoneHelper.php";

use src\model\helper\UserHelper;
use src\model\helper\ZoneHelper;

/**
 * @brief Cree les helpers, et les stock dans une map
 */
class HelperFactory
{
    private static $instance = null;
    private $hashmap = null;

    private function __construct()
    {
        $this->hashmap = array("user" => new UserHelper(),
        				"zone" => new ZoneHelper());
    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
			self::$instance = new HelperFactory();  
     	}
	 
     	return self::$instance;
    }

    /**
     * @brief Cree un nouveau helper, et l'associe a une clef
     * @param string $key
     * @param AbsHelper $helper
     */
    public function register($key, $helper)
    {
        if($this->hashmap[$key] == null || $this->hashmap[$key] == "")
          $this->hashmap[$key] = $helper;
    }
    
    /**
     * @brief Retourne le helper associe a une cle
     * @param string $key
     * @return AbsHelper $ret Le helper voulu
     * @throws Exception si helper n'existe pas
     */
    public function getHelper($key)
    {
    	if($this->hashmap[$key] == null || $this->hashmap[$key] == "")
    		throw new Exception("Pas de helper...");
    	else
    		return $this->hashmap[$key];
    }
}
?>