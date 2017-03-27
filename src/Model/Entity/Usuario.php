<?php

namespace src\Model\Entity;

use src\Model\Persistence\Mysql;

/**
 * Classe que referencia a tabela usuário do meu banco de dados
 */
class Usuario {

    //Os campos da minha tabela
    private $id;
    private $nome;
    private $idade;
    private $login;
    private $senha;
    //Esse atributo é para possamos usar a mesma instância
    //para vários métodos
    private $mysql;

    function __construct() {
        //reutilizando nossa classe para execuções que 
        //de querys no banco de dados
        $this->mysql = new Mysql();
    }

    function getNome() {
        return $this->nome;
    }

    function getIdade() {
        return $this->idade;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    /**
     * @desc Esse método pega tudo que vier do formulário em forma
     * de array e passa para o objeto Usuário
     * @return Usuario Objeto
     */
    public function hidratarObjeto($array, Usuario $objeto) {
        $objeto->setNome($array["nome"]);
        $objeto->setIdade($array["idade"]);
        $objeto->setId($array["id"]);
        return $objeto;
    }

    /**
     * É um método que busca todos os usuários da minha base
     * @return array de usuários
     */
    public function listarUsuario() {
        $sql = "SELECT * FROM tb_usuario";
        return $this->mysql->executarQuery($sql);
    }

    /**
     * É um método que salva o usuário de acordo com o Objeto Usuario 
     * passado como parametro
     * @param \src\Model\Entity\Usuario $usuario
     */
    public function salvar(Usuario $usuario) {
        $data_inserir = date();
        $sql = "INSERT INTO tb_usuario (nome, idade, perfil_id, data_inserir)"
                . "VALUES ('{$usuario->getNome()}', {$usuario->getIdade()}, 1, {$data_inserir})";
        $this->mysql->inserirQuery($sql);
    }

    /**
     * É um método que edita o usuário de acordo com o Objeto Usuario 
     * passado como parametro
     * @param \src\Model\Entity\Usuario $usuario
     */
    public function editar(Usuario $usuario) {
        $sql = "UPDATE tb_usuario set nome = '{$usuario->getNome()}', "
                . "idade = {$usuario->getIdade()} WHERE id = {$usuario->getId()}";
        $this->mysql->inserirQuery($sql);
    }

    /**
     * @desc Método que busca um usuário de acordo com o id
     * @param int $id 
     * @return array de usuários
     */
    public function findById($id) {
        $sql = "SELECT * FROM tb_usuario WHERE id = " . $id;
        return $this->mysql->executarQuery($sql);
    }

    /**
     * @desc Método que deleta usuário de acordo com o id
     * @param int $id
     */
    public function deletar($id) {
        $sql = "DELETE FROM tb_usuario WHERE id = " . $id;
        $this->mysql->inserirQuery($sql);
    }

    public function findByLoginAndSenha($login, $senha) {
        $sql = "SELECT * FROM tb_usuario WHERE login = '{$login}' and "
        . "senha = '{$senha}'";
        return $this->mysql->executarQuery($sql);
    }

}
