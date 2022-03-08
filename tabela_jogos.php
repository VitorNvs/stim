<?php include "header.php"?>
<?php 
$search = $_GET['search'];
$pag = $_GET['pag'];
$qtd_pag = 5 * $pag;
$inicio = $qtd_pag - 5;

if($search == 0){
    $sql1 = "select * from jogos ORDER BY nome LIMIT $inicio,$qtd_pag"; 
    $sql2 = "";
}
else if($search == 1){
    $busca = $_POST['busca'];
    $_SESSION['busca'] = $busca;
    $sql1 = "select * FROM `jogos` WHERE nome LIKE '$busca%' ORDER BY nome;"; 
    $sql2 = "select * FROM `jogos` WHERE nome LIKE '%$busca%' AND nome NOT LIKE '$busca%' ORDER BY nome;";
}

$consulta = mysqli_query($link, $sql1);
if($consulta){
    $tupla = mysqli_fetch_assoc($consulta);
    ?>
    <form action="tabela_jogos.php?search=1" method="POST">
        <div class="row">
            <div class="col-2 barra-pesquisa">
                <input type='text' class='form-control' name="busca" id="search-bar">
            </div>
        </div>
    </form>
    <?php
    if(!$tupla){
        echo "vazio";
    }
    else{
        echo "<table class='table table-dark'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col' class='table-dark'></th>";
        echo "<th scope='col' class='table-dark'>Nome</th>";
        echo "<th scope='col' class='table-dark'>Desenvolvedora</th>";
        echo "<th scope='col' class='table-dark'>Preço</th>";     
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($tupla){
            $imagem = $tupla['imagem_tabela'];
            $game_id = $tupla['game_id'];
            $nome = $tupla['nome'];
            $preco = $tupla['preco'];
            $des = $tupla['desenvolvedora'];
            echo "<a href='pagina_jogo.php?id=$game_id'>";
            echo "<tr>";
            echo "<td class='table-dark'><a href='pagina_jogo.php?id=$game_id'><img src='$imagem' width=120px></a></td>";
            echo "<td class='table-dark'>$nome</td>";
            echo "<td class='table-dark'>$des</td>";
            echo "<td class='table-dark'>R$$preco,00</td>";
            echo "</tr>";
            echo "</a>";
            $tupla = mysqli_fetch_assoc($consulta);
        }

        if($search == 1){
            $consulta = mysqli_query($link, $sql2);
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                echo "vazio";
            }
            else{
                while($tupla){
                    $imagem = $tupla['imagem_tabela'];
                    $game_id = $tupla['game_id'];
                    $nome = $tupla['nome'];
                    $preco = $tupla['preco'];
                    $des = $tupla['desenvolvedora'];
                    echo "<a href='pagina_jogo.php?id=$game_id'>";
                    echo "<tr>";
                    echo "<td class='table-dark'><a href='pagina_jogo.php?id=$game_id'><img src='$imagem' width=120px></a></td>";
                    echo "<td class='table-dark'>$nome</td>";
                    echo "<td class='table-dark'>$des</td>";
                    echo "<td class='table-dark'>R$$preco</td>";
                    echo "</tr>";
                    echo "</a>";
                    $tupla = mysqli_fetch_assoc($consulta);
                }
            }
        }
        else{
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    
                    <li class="page-item"><a class="page-link" href="tabela_jogos.php?search=0&pag=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="tabela_jogos.php?search=0&pag=2">2</a></li>
    
                </ul>
            </nav>
            <?php
        }
        echo "</tbody>";
        echo "</table>";
    }
}
else{
    echo mysqli_connect_error();
    die();
}
mysqli_close($link);
?> 
<?php include "footer.php"?>  