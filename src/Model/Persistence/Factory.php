<?php
namespace src\Model\Persistence;
use PDO;
class Factory {
    /**
     * @desc Abre uma conexão com a base de dados
     * @param array $arrayConexao
     * @return PDO
     */
    public static function factory($arrayConexao) {
        $con = new PDO(
                "mysql:host={$arrayConexao['host']}"
                . ";dbname={$arrayConexao['dbname']}", 
                        $arrayConexao['username'], 
                        $arrayConexao['password']);

        $con->setAttribute(PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION);
        return $con;
    }
}

