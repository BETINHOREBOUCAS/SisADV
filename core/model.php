<?php
//Conexão com o banco de dados
class model {

    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;    
    }
}