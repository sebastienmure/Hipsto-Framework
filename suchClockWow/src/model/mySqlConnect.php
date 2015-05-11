<?php
namespace src\model;

use PDO;

/**
 * @brief Gere les operations de connection
 *  les plus "bas niveau" avec une bdd MySql
 *
 */
class MySqlConnect
{
	private static $instance = null;
	private $pdo = null;
	private  $db = "";
	private $dbuser = "";
	private $dbpass = "";
	private $host = "";
	private $encoding = "";
	
	public static function getInstance()
	{
		if(self::$instance == null)
			self::$instance = new MySqlConnect();
		
		return self::$instance;
	}
	
	private function loadConfig()
	{
		$strCfgPath = "../../dbconfig.cfg";
		$cfgPath = realpath($strCfgPath);
		
		if($cfgPath == false)
		{
			echo("Erreur lors du chargement du fichier de conf");
			die();
		}
		else
		{
			try
			{
				$monfichier = fopen($cfgPath, 'r+');			
				
				$args = array();
				while($ligne = fgets($monfichier))
				{
					$arg = explode(":", $ligne);
					$args[ trim($arg[0]) ] = trim($arg[1]);
				}
				fclose($monfichier);
				  
				$this->db = $args["dbname"];
				$this->dbuser = $args["user"];
				$this->dbpass = $args["pass"];
				$this->host = $args["host"];
				$this->encoding = $args["enc"];
				
			}
			catch(\Exception $e)
			{
				var_dump("Erreur lors du chargement de la config...");
				die($e);
			}
		}
	}
	
	private function __construct()
	{
		$this->loadConfig();
	}
	
	/**
	 * @brief Initie la connection avec la base
	 */
	public function connect()
	{
		try
		{
			$strConnection = 'mysql:host=' . $this->host . ';dbname=' . $this->db; //Ligne 1
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
	
	/**
	 * @brief Termine la connection avec la base
	 */
	public function disconnect()
	{
		$this->pdo = null;
	}
	
	/**
	 * @brief Executes pdo->query
	 * @param String $query
	 * @return  PDOStatement $arr
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
	
	public function getPdo()
	{
		$this->pdo;
	}
}

?>