<?php

$conexao = mysqli_connect('localhost','root','') or die("Erro de conexão");
$banco = mysqli_select_db($conexao, 'twitter_clone') or die("Erro ao selecionar o banco de dados");

?>