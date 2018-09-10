<?php

session_start();

if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

include('bd.class.php');

$id_usuario = $_SESSION['id_usuario'];
$tweet = $_POST['txt_tweet'];

$sql = mysqli_query($conexao, " INSERT INTO tweet(id_usuario, tweet)values($id_usuario, '$tweet') ");

?>