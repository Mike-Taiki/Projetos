<?php

$host = 'localhost';

$usuario = 'root';

$senha = '';

$database = 'projeto_crud';

$conexao = mysqli_connect($host, $usuario, $senha) or die("Erro de conexão");
$banco = mysqli_select_db($conexao, $database) or die("Erro ao selecionar o banco de dados");

?>