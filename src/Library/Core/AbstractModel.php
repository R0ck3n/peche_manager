<?php

namespace Library\Core;

use Library\Database\Connection;

abstract class AbstractModel
{
    //se connecte a la base de donnée en fonction des paramètres du fichier de configuration (config/database.php)
    protected Connection $db;
    
    public function __construct()
    {
        $config = require 'config/database.php';
        $this->db = new Connection($config);
    }
}