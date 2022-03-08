<?php include "header.php"?>

<a href="controle_jogos.php"><button class="btn btn-primary">Voltar</button></a>
<?php

    if(!isset($_SESSION['login'])){
        header("location:login.php");
        die();
    }
    else{

        $game_id = $_GET['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $consulta = mysqli_query($link,"select * from jogos where game_id = $game_id;");
        if($consulta){
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                echo"Ocorreu um erro no carregamento da página ;-;";
            }
            else{?>
                <form action="atualiza_jogo.php" style="text-align:left;" method="POST">
                    <div class="container py-2">
                        <div class="row justify-content-center">
                            <div class="col-4"> 
                                <label for="nome" class="texto-nasa">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Atual: <?=$tupla['nome']?>">
                            </div>
                            <div class="col-2"> 
                                <label for="preco" class="texto-nasa">Preço</label>
                                <input type="number" class="form-control" id="preco" name="preco" placeholder="Atual: <?=$tupla['preco']?>">
                            </div>
                        </div>   
                        <div class="row justify-content-center">
                            <div class="col-3"> 
                                <label for="imagem" class="texto-nasa">Imagem</label>
                                <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Atual: <?=$tupla['imagem']?>">
                            </div>
                            <div class="col-3"> 
                                <label for="imagem-tabela" class="texto-nasa" >Imagem da tabela</label>
                                <input type="file" class="form-control" id="imagem-tabela" name="imagem-tabela" placeholder="Atual: <?=$tupla['imagem_tabela']?>">
                            </div>
                        </div> 
                        <div class="row justify-content-center">
                            <div class="col-6"> 
                                <label for="descricao" class="texto-nasa">Descrição</label>
                                <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Atual: <?=$tupla['descricao']?>"></textarea>
                            </div>
                        </div> 
                        <div class="row justify-content-center">
                            <div class="col-3"> 
                                <label for="des" class="texto-nasa">Desenvolvedora</label>
                                <input type="text" class="form-control" id="des" name="des" placeholder="Atual: <?=$tupla['desenvolvedora']?>">
                            </div>
                            <div class="col-3"> 
                                <label for="dis" class="texto-nasa">Distribuidora</label>
                                <input type="text" class="form-control" id="dis" name="dis" placeholder="Atual: <?=$tupla['distribuidora']?>">
                            </div>
                        </div> 
                        <div class="row justify-content-center">
                            <div class="col-3" style="transform:translateX(-137px)"> 
                                <label for="data_lancamento" class="texto-nasa">Data de Lançamento</label>
                                <input type="date" class="form-control" id="data_lancamento" name="data_lancamento">
                            </div>
                        </div> 
                        <div class="row justify-content-center">
                            <div class="col-6"  style="padding-top: 10px;"> 
                                <button type="submit"class="btn btn-success">Atualizar</button>   
                            </div>
                            <input type="hidden" name="game_id" value=<?=$game_id?> >
                        </div>

                    </div>   
                </form>
            <?php
            }
        }
        else{
            echo"Ocorreu um erro no carregamento da página ;-;";
        }
          
    }
?>
<?php include "footer.php"?>