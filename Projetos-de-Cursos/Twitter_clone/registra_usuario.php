<?php

include('bd.class.php');

//$_POST
//$_GET

$usuario = $_POST['usuario'];
$email   = $_POST['email'];
$senha   = md5($_POST['senha']);

$usuario_existe = false;
$email_existe = false;


$sql = mysqli_query($conexao, " SELECT * FROM usuarios where usuario = '$usuario' ");
if($resultado_id = $sql){
	$dados = mysqli_fetch_array($resultado_id);
	if(isset($dados['usuario'])){
		$usuario_existe = true;
		echo 'Usuário já cadastrado';
	}
}else{
	echo 'Erro ao tentar localizar o registro de usuário no banco de dados';
}

$sql = mysqli_query($conexao, " SELECT * FROM usuarios where email = '$email' ");
if($resultado_id = $sql){
	$dados = mysqli_fetch_array($resultado_id);
	if(isset($dados['usuario'])){
		$email_existe = true;
	}
}else{
	echo 'Erro ao tentar localizar o registro de email no banco de dados';
}

if($usuario_existe || $email_existe){

	$retorno_get = '';

	if($usuario_existe){
		$retorno_get.="erro_usuario=1&";
	}

	if($email_existe){
		$retorno_get.="erro_email=1&";
	}

	header("Location: inscrevase.php?".$retorno_get);
	die();
}

$sin = mysqli_query($conexao, "insert into usuarios(usuario, email, senha)values('$usuario','$email','$senha')");

if($sin){
	echo 'Usuario foi registrado com sucesso!';
}else{
	echo 'Erro ao tentar inserir o registro';
}

?>