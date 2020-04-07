<?php
/*
Connection à la base de données avec PDO
*/

namespace App;
use PDO;

class Connect {
    public static function getPDO():PDO {
        return new PDO('mysql:host=localhost;dbname=niakmarket;charset=utf8', 'root', '');
    }
}