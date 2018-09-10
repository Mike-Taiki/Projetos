<?php

include('bd.class.php');

$usuario = ucwords($_POST['usuario']);
$senha   = md5($_POST['senha']);

$sql = mysqli_query($conexao, " SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ");
$linhas = mysqli_num_rows($sql);

if($linhas == ''){
	echo 'Usuario/senha inválidos.';
	header("Location: index.php?erro=1");
} else {
	while($dados = mysqli_fetch_assoc($sql)){
		session_start();
		$_SESSION['id_usuario'] = $dados['id'];
		$_SESSION['usuario'] = $dados['usuario'];
		$_SESSION['email'] = $dados['email'];
		header("Location: home.php");
	}
}

?>