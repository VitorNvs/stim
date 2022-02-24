<?php
session_start();
$_SESSION['carrinho'] = [];
$_SESSION['itens_carrinho'] = 0;
header("location:pagina_inicial.php");
?>