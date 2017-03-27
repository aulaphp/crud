<?php
include '../../autoload.php';
use src\Model\Entity\Usuario;
$objUsuario = new Usuario();
$usuarios = $objUsuario->listarUsuario();
use src\Model\Auth;
$auth = new Auth();
$auth->verificaLogin();
?>
<a href="form-usuario.php">Novo usuário</a>
<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?= utf8_encode($usuario["nome"]) ?></td>
            <td><?= $usuario["idade"] ?></td>
            <td>
                <a href="form-usuario.php?id=<?= $usuario["id"]?>">Editar</a>
            </td>
            <td>
                <a href="deletar-usuario.php?id=<?= $usuario["id"]?>">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>




