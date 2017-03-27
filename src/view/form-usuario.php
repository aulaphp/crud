<?php
include '../../autoload.php';

use src\Model\Entity\Usuario;
use src\Model\Auth;

$auth = new Auth();
$auth->verificaLogin();

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $objUsuario = new Usuario();
    $usuario = $objUsuario->findById($_GET["id"]);
}
?>

<link rel="stylesheet" href="css/bootstrap.css"> 
<form action="../controller/usuarioController.php" method="post">
    <div class="col-md-6">
        <label for="nome">Nome</label>
        <input type="hidden" name="id" value="<?= isset($usuario[0]["id"]) ? $usuario[0]["id"] : "" ?>" />
        <input type="text" name="nome" 
               value="<?= isset($usuario[0]["nome"]) ? utf8_encode($usuario[0]["nome"]) : "" ?>"
               class="form-control"placeholder="Nome"
               oninvalid="setCustomValidity('Por favor preencha o aaa ')"
               required>
    </div>
    <div class="col-md-6">
        <label for="idade">Idade</label>
        <input type="number" name="idade"
               value="<?= isset($usuario[0]["idade"]) ? utf8_encode($usuario[0]["idade"]) : "" ?>"
               class="form-control" placeholder="Idade">
    </div>
    <a class="btn btn-default" href="lista-usuario.php">Voltar</a>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

