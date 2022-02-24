<?php include "header.php"?>

<?php
    $array_carrinho = $_SESSION['carrinho'];
    $id_usuario = $_SESSION['id_usuario'];

    foreach($array_carrinho as $item){
        $consulta = mysqli_query($link,"insert into user_jogos (game_id, id_usuario) values ($item, $id_usuario);");
    }
    
    header("location:deletar_carrinho.php");
    

?>
<?php include "footer.php"?>