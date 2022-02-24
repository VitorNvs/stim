<?php include "header.php"?>
<?php 
    $apelido = $_POST['apelido'];
    $bio = $_POST['bio'];
    $id_usuario = $_SESSION['id_usuario'];

    if($apelido != ''){
        $consulta = mysqli_query($link,"update usuario set apelido='$apelido' where id_usuario='$id_usuario';");
    }
    if($bio != ''){
        $consulta = mysqli_query($link,"update usuario set bio='$bio' where id_usuario='$id_usuario';");
    }
        
?>
<h2 style="color:white;">Perfil atualizado com sucesso</h2>
<?php include "footer.php"?>