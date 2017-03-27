<?php
include './autoload.php';
use src\Model\Auth;
$auth = new Auth();
$auth->verificaLogin();
$usuario = $auth->getUsuarioLogado();

?>

<h2>Seja bem vindo(a) <?= $usuario[0]["nome"]?></h2>
<a href="src/view/lista-usuario.php">Usuários</a>
<a href="src/view/lista-aluno.php">Aluno</a>
<a href="src/view/lista-escola.php">Escola</a>
<a href="src/controller/authController.php?sair=sair">Sair</a>