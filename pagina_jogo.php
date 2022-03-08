<?php include "header.php"?>
    <?php
    $game_id = $_GET['id'];
    
    $consulta = mysqli_query($link,"select * from jogos where game_id=$game_id");
    if($consulta){
        $tupla = mysqli_fetch_assoc($consulta);
    }
    ?>
    <h2 class="titulo_jogo"> <?=$tupla['nome']?> </h2>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="img/<?=$game_id?>/1.jpg" height="350px" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/<?=$game_id?>/2.jpg" height="350px" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/<?=$game_id?>/3.jpg" height="350px" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/<?=$game_id?>/4.jpg" height="350px" alt="Fourth slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/<?=$game_id?>/5.jpg" height="350px" alt="Fifth slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/<?=$game_id?>/6.jpg" height="350px" alt="Sixth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <img src= <?=$tupla['imagem']?> height="200px">
                <p style="color:white; font-size:14px;"> <?=$tupla['descricao']?> </p>
                <p style="color:#c0bebe; font-size:15px;">Desenvolvedora: <b><?=$tupla['desenvolvedora']?></b> </p>
                <p style="color:#c0bebe; font-size:15px;">Distribuidora: <b><?=$tupla['distribuidora']?> </b></p>
                <p style="color:#c0bebe; font-size:15px;">Data de Lançamento: <b><?=$tupla['data_lancamento']?> </b></p>
            </div> 
        </div> 
        <br> 
        <div class="row">
            <div class="col-8">
                <div class="compra">
                    <h4 > Comprar <?=$tupla['nome']?></h4> 
                    <div class="flex-container">
                        <div class="flex-container bg-dark preco-compra">
                            <span style="color:#d8dfdd;">R$ <?=$tupla['preco']?>,00</span>    
                        </div>
                        <?php
                        if(isset($_SESSION['id_usuario'])){
                            $id_usuario = $_SESSION['id_usuario'];
                            $consulta2 = mysqli_query($link,"select * from user_jogos where game_id=$game_id and id_usuario=$id_usuario");
                            if($consulta2){
                                $tupla2 = mysqli_fetch_assoc($consulta2);
                                if(!$tupla2){
                                    echo "<a href='carrinho.php?id=$game_id'><button type='button' class='btn btn-success botao-compra'>Comprar</button></a>";
                                }
                                else{
                                    echo "<button type='button' class='btn btn-secondary botao-compra'>Comprado</button>";
                                }
                            }
                        }
                        else{
                            echo "<a href='login.php'><button type='button' class='btn btn-success botao-compra'>Comprar</button></a>";
                        }
                        
                        ?>
                        
                    </div>
                </div>   
            </div>
        </div>   
                
    </div>
<?php include "footer.php"?>
