<?php include "header.php"?>
<?php
    if(!isset($_SESSION['login'])){
        header("location:login.php");
        die();
    }
    else{
        $id_usuario = $_SESSION['id_usuario'];
        $consulta = mysqli_query($link,"select * from usuario where id_usuario = $id_usuario;");
        if($consulta){
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                echo"Ocorreu um erro no carregamento da página ;-;";
            }
            else{?>
                <div class="flex-container botao-perfil">
                    <a href="editar_perfil.php"><button class="btn btn-success ">Editar Perfil</button></a>
            </div>   
                <div id="pagina-user">
                    <h1><?=$tupla['apelido']?></h1>
                    <h4 style="margin-left:20px; color:grey; margin-bottom:30px;"><?=$tupla['login']?></h4>
                    <h3>Descrição:</h3>
                    <?php
                    if ($tupla['bio'] == NULL){
                        echo "<p style='color:grey;'>Adicione uma descrição para você!</p>";
                    }
                    else{
                        $bio = $tupla['bio'];
                        echo "<p style='color:grey;'>$bio</p>";
                    }
                    ?>
                    <h3>Informações:</h3>
                    <p><b>Email:</b> <?=$tupla['email']?> / <b>Data de Admissão:</b> <?=$tupla['admissao']?> </p>
                    <h3>Seus jogos:</h3>
                    <?php
                        
                        $sql = "select j.game_id, uj.id_usuario, j.imagem FROM jogos j JOIN user_jogos uj ON j.game_id = uj.game_id WHERE uj.id_usuario = $id_usuario;";
                        $consulta = mysqli_query($link, $sql);
                        if($consulta){
                            $tupla = mysqli_fetch_assoc($consulta);
                            if(!$tupla){
                                echo "vazio";
                            }
                            else{
                                echo "<div class='flex-container wrap'>";
                                while($tupla){
                                    $imagem = $tupla['imagem'];
                                    $game_id = $tupla['game_id'];
                                    echo"<a href='pagina_jogo.php?id=$game_id'>";
                                    echo "<img src='$imagem' class='image' width='100px' height='100px'>";
                                    echo"</a>";
                                    
                                    $tupla = mysqli_fetch_assoc($consulta);
                                }
                                echo"</div>";
                            }
                        }
                        else{
                            echo mysqli_connect_error();
                            die();
                        }
                        mysqli_close($link);
                    ?>
                </div>
            <?php   
            }
        }
        else{
            echo"Ocorreu um erro no carregamento da página ;-;";
        }
        
        
    }
?>
<?php include "footer.php"?>