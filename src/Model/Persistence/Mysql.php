<?php
namespace src\Model\Persistence;
use src\Model\Persistence\Factory;
use PDO;
class Mysql {
    private static $con;
    /**
     * @desc Abre uma conexão com o banco de dados
     * @return Conexão do PDO
     */
    public function connect() {
        $arrayConexao = array(
            "host" => "localhost",
            "dbname" => "db_projeto",
            "username" => "root",
            "password" => ""
        );
        if (!isset(self::$con)) {
            self::$con = 
                    Factory::factory($arrayConexao);
        }
        return self::$con;
    }
    /**
     * @desc Método que recebe um sql, executa o mesmo no banco de dados
     * e retorna com o valor necessário.
     * @param string $sql
     * @return array da tabela pesquisada
     */
    public function executarQuery($sql){
        $this->connect();
        return self::$con->query($sql)
                ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * @desc inseri uma query que não necessita de retorno
     * @param string $sql
     */
    public function inserirQuery($sql){
        $this->connect();
        self::$con->query($sql);
    }
}
