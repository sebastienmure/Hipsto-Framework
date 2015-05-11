<?php
namespace src\model\helper;

require_once (realpath('src/model/mySqlConnect.php'));

use src\model\MySqlConnect;

/**
 * @brief Classe generalisant les helpers.
 *  Fait le lien entre des entrees d'une table de base
 *  de donnees et des entitees
 */
abstract class AbsHelper
{
    protected $context;
    
    public function __construct()
    {
        $this->context = MySqlConnect::getInstance();
    }

    /**
     * @brief Recupere toutes les entrees de la table.
     * @return array() $ret d'objets de type Entite
     */
    public abstract function getAll();

    /**
     * @brief Recupere l'entree liee a un id
     * @param int $id l'id de l'entree a recuperer
     * @return Entite $ret
     */
    public abstract function getOneById($id);

    /**
     * @brief Met a jour une entree de la table
     * @param Entite $obj, l'objet qui represente l'entree a inserer
     * @return
     */
    public abstract function update($obj);

    /**
     * @brief Supprime une entree de la table
     * @param Entite $obj
     */
    public abstract function remove($obj);

    /**
     * @brief Cree un objet Entite a partir d'un objet \PDOStatement
     * @param \PDOStatement $rep
     * @return Entite $ret 
     */
    protected abstract function statementToEntity($rep);
    
    /**
     * @brief Execute une requete en bdd apres avoir etablit la
     *  connection, puis la referme.
     * @param string $query La requete sql
     * @return \PDOStatement $rep Le resultat de la requete
     */
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