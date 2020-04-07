<?php
namespace App;
require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . AUTOLOAD;
use App\Connect;


class Users {

    public function __construct() {

    }

    public function get(string $type, string $value): bool {
        // Connection à la base de donnée
        $pdo = Connect::getPDO();
        // Recherche dans la base de donnée
        if ($type === 'password') {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }
        $req = $pdo->query("SELECT name FROM users ");
        while ($res = $req->fetch()) {
            if (htmlspecialchars($res['name']) === $name) {
                echo $name . ' est dans la bdd';
                return true;
            }
        }
        return false;
    }

    public function setName() {

    }

    
}

$test = new Users;
$test->getName('root');


