<?php
namespace src\model;

use PDO;

class MySqlConnect
{
	private static $instance = null;
	private  $db = "daClockBase";
	private $dbuser = "root";
	private $dbpass = "123lol";
	private $pdo = null;
	
	public static function getInstance()
	{
		if(self::$instance == null)
			self::$instance = new MySqlConnect();
		
		return self::$instance;
	}
	
	private function __construct()
	{
	}
	
	public function connect()
	{
		try
		{
			$strConnection = 'mysql:host=localhost;dbname=' . $this->db; //Ligne 1
			$arrExtraParam= array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //Ligne 2
			$this->pdo = new PDO($strConnection, $this->dbuser, $this->dbpass, $arrExtraParam); //Ligne 3; Instancie la connexion
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Ligne 4
		}
		catch(PDOException $e)
		{
			$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
			die($msg);
		}
		
	}
	
	public function disconnect()
	{
		$this->pdo = null;
	}
	
	/**
	 * @brief Executes pdo->query
	 * @param String $query
	 * @return  PDOStatement
	 */
	public function query($query)
	{
		$arr = null;
		
		if($this->pdo != null)
		{
			try
			{
				$arr = $this->pdo->query($query)->fetchAll();
			}
			catch(PDOException $e)
			{
				$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
				die($msg);
			}
		}
		
		return $arr;
	}
}

?>