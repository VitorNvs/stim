<?php include "header.php"?>

<?php
    if(!isset($_SESSION['login'])){
        header("location:login.php");
        die();
    }
    else{
        if (isset($_GET['id'])) {
            $game_id = $_GET['id'];
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = [];
            }
            
            if (!in_array($game_id, $_SESSION['carrinho'])){
                $_SESSION['carrinho'][] = $game_id;
                $_SESSION['itens_carrinho']++;
                header("location:carrinho.php?id=$game_id");
            }
        } 
        ?>
        <h2 class="texto-nasa">Seu Carrinho</h2>
        
        <?php
        $carrinho = implode(",",$_SESSION['carrinho']);
        $consulta = mysqli_query($link,"select * from jogos where game_id in ($carrinho);");
        if($consulta){
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                echo"Ocorreu um erro no carregamento da página ;-;";
            }
            else{?>
                <table class='table table-dark'>
                <thead>
                    <tr>
                        <th scope='col' class='table-dark'>Nome</th>
                        <th scope='col' class='table-dark'>Preço</th>
                        <th scope='col' class='table-dark'></th>
                        <th scope='col' class='table-dark'></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $array_carrinho = $_SESSION['carrinho'];

                while($tupla){
                $game_id = $tupla['game_id'];
                $nome = $tupla['nome'];
                $preco = $tupla['preco'];
                $img = $tupla['imagem_tabela'];
    
                echo "<tr>";
                echo "<td class='table-dark'>$nome</td>";
                echo "<td class='table-dark'>$preco</td>";
                echo "<td class='table-dark'><img src='$img' width=120px></td>";
                echo "<td class='table-dark'><a href='deletar_carrinho.php?delete=0?id=$game_id'><button class='btn btn-danger' >Deletar</button></a>";
                echo "</tr>";
    

    
                $tupla = mysqli_fetch_assoc($consulta);
                }
                echo "</tbody>";
                echo "</table>";
                echo "<a href='comprar_jogos.php'><button class='btn btn-success'>Finalizar compra</button></a>";
                echo "<a href='deletar_carrinho.php?delete=1'><button class='btn btn-danger' >Deletar</button></a>";
            }
        }
        else{
            echo"<p style='color:white;'>O seu carrinho está vazio.</p>";
        }  
    }  


?>
        </tbody>
    </table>

<?php include "footer.php"?>