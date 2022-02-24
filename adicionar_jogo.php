<?php include "header.php"?>

<a href="controle_jogos.php"><button class="btn btn-primary">Voltar</button></a>
<?php

    if(!isset($_SESSION['login'])){
        header("location:login.php");
        die();
    }
    else{?>
        <form action="insert_jogo.php" method="POST">
            <div class="container py-2">
                <div class="row justify-content-center">
                    <div class="col-4"> 
                        <label for="nome" class="texto-nasa">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"required>
                    </div>
                    <div class="col-2"> 
                        <label for="preco" class="texto-nasa">Preço</label>
                        <input type="number" class="form-control" id="preco" name="preco" required>
                    </div>
                </div>   
                <div class="row justify-content-center">
                    
                    <div class="col-3"> 
                        <label for="imagem" class="texto-nasa">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" required>
                    </div>
                    <div class="col-3"> 
                        <label for="imagem_tabela" class="texto-nasa">Imagem da tabela</label>
                        <input type="file" class="form-control" id="imagem_tabela" name="imagem_tabela" required>
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-6"> 
                        <label for="descricao" class="texto-nasa">Descrição</label>
                        <textarea type="text" class="form-control" id="descricao" name="descricao" required></textarea>
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-3"> 
                        <label for="des" class="texto-nasa">Desenvolvedora</label>
                        <input type="text" class="form-control" id="des" name="des" required>
                    </div>
                    <div class="col-3"> 
                        <label for="dis" class="texto-nasa">Distribuidora</label>
                        <input type="text" class="form-control" id="dis" name="dis" required>
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-3" style="transform:translateX(-137px)"> 
                        <label for="data_lancamento" class="texto-nasa">Data de Lançamento</label>
                        <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" required>
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-6"  style="padding-top: 10px;"> 
                        <button type="submit"class="btn btn-success">Adicionar</button>   
                    </div>
                </div>

            </div>   
        </form>
    <?php      
    }
?>
<?php include "footer.php"?>