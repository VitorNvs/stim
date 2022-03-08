<?php include "header.php"?>

<a href="controle.php"><button class="btn btn-primary">Voltar</button></a>
<h2 style="color: white;">Controle dos Jogos</h2>
<?php
if(!isset($_SESSION['login'])){
    header("location:login.php");
    die();
}
else{
    $consulta = mysqli_query($link,"select * from jogos;");
    if($consulta){
        $tupla = mysqli_fetch_assoc($consulta);
        if(!$tupla){
            echo"Ocorreu um erro no carregamento da página ;-;";
        }
        else{

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='table-dark'>game_id</th>";
            echo "<th scope='col' class='table-dark'>Nome</th>";
            echo "<th scope='col' class='table-dark'>Preço</th>";
            echo "<th scope='col' class='table-dark'>Descrição</th>";
            echo "<th scope='col' class='table-dark'>Imagem</th>";
            echo "<th scope='col' class='table-dark'>Desenvolvedora</th>";
            echo "<th scope='col' class='table-dark'>Distribuidora</th>";
            echo "<th scope='col' class='table-dark'>Controle</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            while($tupla){
            
            $game_id = $tupla['game_id'];
            $nome = $tupla['nome'];
            $preco = $tupla['preco'];
            $descricao = $tupla['descricao'];
            $img = $tupla['imagem_tabela'];
            $des = $tupla['desenvolvedora'];
            $dis = $tupla['distribuidora'];

            echo "<tr>";
            echo "<td class='table-dark'>$game_id</td>";
            echo "<td class='table-dark'>$nome</td>";
            echo "<td class='table-dark'>$preco</td>";
            echo "<td class='table-dark'>$descricao</td>";
            echo "<td class='table-dark'><img src='$img' width=120px></td>";
            echo "<td class='table-dark'>$des</td>";
            echo "<td class='table-dark'>$dis</td>";
            echo "<td class='table-dark'><a href='editar_jogo.php?id=$game_id'><button class='btn btn-success'>Editar</button></td>";
            echo "</tr>";

            

            $tupla = mysqli_fetch_assoc($consulta);
            }
            echo "</tbody>";
            echo "</table>";
            echo "<a href='adicionar_jogo.php'><button class='btn btn-primary'>Adicionar Jogo</button></a>";
        }
    }
    else{
        echo"Ocorreu um erro no carregamento da página ;-;";
    }
    
    
}
?>
<?php include "footer.php"?>