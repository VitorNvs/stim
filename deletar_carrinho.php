<?php include "header.php"?>

<?php
$delete = $_GET['delete'];
if ($delete == '0'){
    $game_id = $_GET['id'];
    $key = array_search($game_id, $_SESSION['carrinho']); 
    unset($_SESSION['carrinho'][$key]);
    $_SESSION['itens_carrinho']--;
    header("location:carrinho.php");
}else{
    $_SESSION['carrinho'] = [];
    $_SESSION['itens_carrinho'] = 0;
    header("location:carrinho.php");
}

?>
<?php include "footer.php"?>