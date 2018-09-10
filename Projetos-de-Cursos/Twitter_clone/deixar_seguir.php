<?php

session_start();

if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

include('bd.class.php');

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];

$sql = mysqli_query($conexao, " DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $seguir_id_usuario");

?>