<?php
include '../../autoload.php';
use src\Model\Auth;
$auth = new Auth();
if (isset($_GET["sair"])) {
    $auth->sair();
} else {
    $dadosLogin = $_POST;
    $auth->login($dadosLogin["login"], $dadosLogin["senha"]);
}

