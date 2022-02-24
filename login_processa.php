<?php include "header.php"?>
<?php   $login = $_POST['login'];
        $senha = $_POST['senha'];
        
        $consulta = mysqli_query($link, "select id_usuario,login,senha from usuario;");
        if($consulta){
            $tupla = mysqli_fetch_assoc($consulta);
            if(!$tupla){
                header("Location:login.php");die();
            }
            else{ 
                while($tupla){
                    if($tupla['login'] == $login && $tupla['senha'] == sha1($senha)){
                        $_SESSION['login'] = $login;
                        $_SESSION['id_usuario'] = $tupla['id_usuario'];
                        header("Location: pagina_usuario.php");
                        die();
                    };
                    $tupla = mysqli_fetch_assoc($consulta);
                }
                $_SESSION['error'] = 4;//login inválido
                header("Location:login.php");die();
            }
        }
        

    ?>
<?php include "footer.php"?>