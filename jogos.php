
    <?php 

        $consulta = mysqli_query($link, "select * FROM jogos ORDER BY RAND() LIMIT 5; ");
        
        if($consulta){
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                echo "vazio";
            }
            else{
                echo "<div class='flex-container wrap jogos_tela_inicial'>";
                while($tupla){
                    $imagem = $tupla['imagem'];
                    $game_id = $tupla['game_id'];
                    $nome = $tupla['nome'];
                    $descricao = $tupla['descricao'];
                    $preco = $tupla['preco'];
                    echo"<a href='pagina_jogo.php?id=$game_id'>";
                    echo "<img src='$imagem' class='image' width='250px' height='250px'>";
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

