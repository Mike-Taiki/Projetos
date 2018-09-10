<?php

session_start();

if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

include('bd.class.php');

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];

$sql = mysqli_query($conexao, " INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario)values($id_usuario, $seguir_id_usuario) ");

?>