<link rel="stylesheet" href="css/bootstrap.css"> 
<?php
include '../../autoload.php';
use src\Model\Entity\Usuario;
$id = $_GET["id"];
$objUsuario = new Usuario();
$usuario = $objUsuario->findById($id);
?>
<h2> Você tem certeza que vai excluir o
     <?= $usuario[0]["nome"] ?> ?</h2> 
<form action="../controller/usuarioController.php">
    <a class="btn btn-default" href="lista-usuario.php">Não</a>
    <input type="hidden" name="id" value="<?= $usuario[0]["id"]?>" />
    <input type="hidden" name="deletar" value="deletar" />
    <input type="submit" class="btn btn-danger" value="Sim" />
</form>

