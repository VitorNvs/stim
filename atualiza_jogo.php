<?php include "header.php"?>
<?php 
    $game_id = $_POST['game_id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $imagem_tabela = $_POST['imagem-tabela'];
    $descricao = $_POST['descricao'];
    $desenvolvedora = $_POST['des'];
    $distribuidora = $_POST['dis'];
    $data_lancamento = $_POST['data_lancamento'];
    
    if($nome != ''){
        $consulta = mysqli_query($link,"update jogos set nome='$nome' where game_id='$game_id';");
    }
    if($preco != ''){
        $consulta = mysqli_query($link,"update jogos set preco='$preco' where game_id='$game_id';");
    }
    if($imagem != ''){
        $consulta = mysqli_query($link,"update jogos set imagem='img/$imagem' where game_id='$game_id';");
    }
    if($imagem_tabela != ''){
        $consulta = mysqli_query($link,"update jogos set imagem_tabela='img/$imagem_tabela' where game_id='$game_id';");
    }
    if($descricao != ''){
        $consulta = mysqli_query($link,"update jogos set descricao='$descricao' where game_id='$game_id';");
    }
    if($desenvolvedora != ''){
        $consulta = mysqli_query($link,"update jogos set desenvolvedora='$desenvolvedora' where game_id='$game_id';");
    }
    if($distribuidora != ''){
        $consulta = mysqli_query($link,"update jogos set distribuidora='$distribuidora' where game_id='$game_id';");
    }
    if($data_lancamento != ''){
        $consulta = mysqli_query($link,"update jogos set data_lancamento='$data_lancamento' where game_id='$game_id';");
    }
        
?>
<h2 style="color:white;">Jogo atualizado com sucesso</h2>
<?php include "footer.php"?>