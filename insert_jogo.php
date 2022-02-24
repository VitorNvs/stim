<?php include "header.php"?>
<?php 
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $imagem_tabela = $_POST['imagem_tabela'];
    $descricao = $_POST['descricao'];
    $desenvolvedora = $_POST['des'];
    $distribuidora = $_POST['dis'];
    $data_lancamento = $_POST['data_lancamento'];

    $consulta = mysqli_query($link,"insert into jogos (nome, preco, imagem, descricao,imagem_tabela,desenvolvedora,distribuidora, data_lancamento) values ('$nome', '$preco', 'img/$imagem', '$descricao', 'img/$imagem_tabela','$desenvolvedora','$distribuidora','$data_lancamento');");
    
    if($consulta){
        header("location:adicionar_jogo.php");
        die();
    }
    else{
        echo "Um erro ocorreu ao adicionar o jogo.";
    }
        
?>