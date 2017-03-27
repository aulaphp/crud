<?php
/**
 * Recebe requisições de algum formulário e envia para a model
 * tratar o dado.
 */
include '../../autoload.php';
use src\Model\Entity\Usuario;
$usuario = $_REQUEST;
$objUsuario = new Usuario();
if(isset($usuario["deletar"]) && $usuario["deletar"] == "deletar" ){
    $objUsuario->deletar($usuario["id"]);
}else{
    $objUsuario = $objUsuario->hidratarObjeto($usuario, $objUsuario);
    if (empty($usuario["id"])) {
        $objUsuario->salvar($objUsuario);
    }else{
        $objUsuario->editar($objUsuario);
    }
}
header("Location:../view/lista-usuario.php");
?>




