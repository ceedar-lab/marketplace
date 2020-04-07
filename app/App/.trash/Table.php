<?php
/*
Différentes actions à faire dans la base de données
*/

namespace App;
require (dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'vendor/autoload.php');
use App\Connect;

class Table {
    
    /**
     * Choix de la table dans laquelle effectuer ses recherches
     */
    protected $table;

    public function __construct(string $table) {
        $this->table = $table;
    }
    
    /**
     * Verification du nom d'utilisateur et du mot de passe
     *
     * @param  mixed $name / Le nom d'utilisateur entré dans le formulaire de connexion
     * @param  mixed $password / Le mot de passe entré dans le formulaire de connexion
     */
    public function checkLogin(string $name, string $password): bool {
        // Connection à la base de donnée
        $pdo = Connect::getPDO();
        // Recherche dans la base de donnée
        $req = $pdo->query("SELECT id, password FROM $this->table WHERE name='$name'");
        while ($res = $req->fetch()) {
            if ($res !== null) {
                $hash = $res['password'];
                return (password_verify($password, $hash)) ? true : false;
            }
        }
        return false;
    }
}