<?php
namespace src\model\helper;

require_once "..\model\mySqlConnect.php";
use src\model\MySqlConnect;

/**
 * 
 */
abstract class AbsHelper
{
    protected $context;
    
    public function __construct()
    {
        $this->context = MySqlConnect::getInstance();
    }

    public abstract function getAll();

    public abstract function getOneById($id);

    public abstract function update($obj);

    public abstract function remove($obj);

    protected abstract function statementToEntity($rep);
    
    protected function query($query)
    {
    	$rep = null;
    	$this->context->connect();
    	$rep = $this->context->query($query);
    	$this->context->disconnect();
    	
    	return $rep;
    }

}
?>