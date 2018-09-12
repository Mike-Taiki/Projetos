<?php

include('config.php');

$nome  = $_POST['nome'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);


$usuario_existe = false;
$email_existe = false;

$valida_user  = mysqli_query($conexao, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");

if($resultado_validacao = $valida_user){
	$dados_retorno = mysqli_fetch_array($resultado_validacao);
	if(isset($dados_retorno['usuario'])){
		$usuario_existe = true;
		echo 'Usuário já existe, tente outro por favor.';
	}
} else{
	echo "Erro ao tentar localizar o registro de usuários no banco de dados";
}

$valida_email = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email'");

if($resultado_validacao = $valida_email){
	$dados_retorno = mysqli_fetch_array($resultado_validacao);
	if(isset($dados_retorno['email'])){
		$email_existe = true;
		echo 'Email já cadastrado';
	}
} else{
	echo "Erro ao tentar localizar o registro de usuários no banco de dados";
}


if($usuario_existe || $email_existe){

	$retorno_get = '';

	if($usuario_existe){
		$retorno_get.="erro_usuario=1&";
	}

	if($email_existe){
		$retorno_get.="erro_email=1&";
	}

	header("Location: inscrever.php?".$retorno_get);
	die();
}


$registra = mysqli_query($conexao, "INSERT INTO usuarios(nome, usuario, email, senha)VALUES('$nome', '$usuario', '$email', '$senha')");

if($registra){
	echo 'Registro concluído';
} else {
	echo 'Erro ao registrar';
}

?>