<?php
namespace src\Model;
use src\Model\Entity\Usuario;
class Auth {
    public function __construct() {
        session_start();
    }
    /**
     * @param string $login
     * @param string $senha
     */
    public function login($login, $senha) {
        $usuario = new Usuario();
        $usuarioLogado = $usuario->findByLoginAndSenha($login, $senha);

        if(!empty($usuarioLogado)) {
            $usuarioLogado[0]["senha"] = "";
            $_SESSION["usuarioAutenticado"] = $usuarioLogado;
        }
        header("Location:/projeto15/index.php");
    }
    
    /**
     * @desc Verifica se existe a sessão de usuarioAutenticado
     */
    public function verificaLogin(){
        if(!isset($_SESSION["usuarioAutenticado"])){
            header("Location:/projeto15/src/view/login.php");
        }
    }

    /**
     * @desc Retira do Session todas as sessões abertas
     */
    public function sair(){
        session_destroy();
        header("Location:/projeto15/src/view/login.php");
    }
    
    public function getUsuarioLogado(){
        return $_SESSION["usuarioAutenticado"];
    }
}
