<?php include "header.php"?>

<a href="controle.php"><button class="btn btn-primary">Voltar</button></a>
<h2 style="color: white;">Controle dos Usuários</h2>

<?php
if(!isset($_SESSION['login'])){
    header("location:login.php");
    die();
}
else{
    $consulta = mysqli_query($link,"select * from usuario;");
    if($consulta){
        $tupla = mysqli_fetch_assoc($consulta);
        if(!$tupla){
            echo"Ocorreu um erro no carregamento da página ;-;";
        }
        else{

            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='table-dark'>id_usuário</th>";
            echo "<th scope='col' class='table-dark'>Login</th>";
            echo "<th scope='col' class='table-dark'>Apelido</th>";
            echo "<th scope='col' class='table-dark'>Email</th>";
            echo "<th scope='col'class='table-dark'>Data de Admissão</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            while($tupla){
            
            $id_usuario = $tupla['id_usuario'];
            $login = $tupla['login'];
            $apelido = $tupla['apelido'];
            $email = $tupla['email'];
            $admissao = $tupla['admissao'];
            
            echo "<tr>";
            echo "<td class='table-dark'>$id_usuario</td>";
            echo "<td class='table-dark'>$login</td>";
            echo "<td class='table-dark'>$apelido</td>";
            echo "<td class='table-dark'>$email</td>";
            echo "<td class='table-dark'>$admissao</td>";
            echo "</tr>";

            

            $tupla = mysqli_fetch_assoc($consulta);
            }
            echo "</tbody>";
            echo "</table>";
        }
    }
    else{
        echo"Ocorreu um erro no carregamento da página ;-;";
    }
    
    
}
?>
<?php include "footer.php"?>