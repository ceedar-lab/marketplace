<?php
namespace Core;

/**
 * Gère la connexion à la base de données et prépare les requêtes de base
 */
class Model {
    
    /**
     * Paramètres de connexion à la BDD
     */
    private $host = 'localhost';
    private $database = 'niakmarket';
    private $login = 'root';
    private $password = '';

    /**
     * new PDO
     */
    static $pdo = null;
    
    /**
     * Connection à la base de donnée
     *
     * @return void
     */
    public function __construct() {
        if ($this::$pdo === null) {
            try {
                $pdo = new \PDO ('mysql:host=' .$this->host. ';dbname=' .$this->database. ';charset=utf8;', $this->login, $this->password);
                $this::$pdo = $pdo;
            } catch (\PDOException $e) {
                die ($e->getMessage());
            }            
        }
    }
    
    /**
     * Selection de plusieurs données
     *
     * @param  mixed $values
     * @param  mixed $table
     * @param  mixed $options
     * @return void
     */
    public function selectAll(string $values, string $table, string $options = null) {
        $pdo = $this::$pdo;
        $req = $pdo->prepare('SELECT ' .$values. ' FROM ' .$table. ' ' .$options);
        $req->execute();
        return $res = $req->fetchAll();
    }
}