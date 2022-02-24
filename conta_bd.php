<?php include "header.php"?>
    <?php
        
        $login = $_POST['login'];
        $apelido = $_POST['apelido'];
        $senha = $_POST['senha'];
        $senhaconf = $_POST['senhaconf'];
        $email = $_POST['email'];
        $nascimento = $_POST['nascimento'];
          
        if($senha != $senhaconf){
            $_SESSION['error'] = 1;
            header("location:criar_conta.php");
        }
        else{
            if(strlen($senha) >= 5 && strlen($senha) <= 14){
                $senhacript = sha1($senha);
                $consulta = mysqli_query($link,"select senha from usuario where senha = '$senhacript';");
                if($consulta){
                    $tupla = mysqli_fetch_assoc($consulta);
                    if(empty($tupla['senha'])){
                        echo "senha correta";
                    }else{
                        $_SESSION['error'] = 2;
                        header("location:criar_conta.php");
                    }
                }
            }else{
                $_SESSION['error'] = 3;
                header("location:criar_conta.php");    
            }
            
            
        /*   
            $script=<<<FIM
                insert into usuario(login,apelido,senha,email,nascimento) 
                values ('$login','$apelido','$senhacript','$email','$nascimento');
        FIM;

            $consulta = mysqli_multi_query($link, $script);
            
            if($consulta){
                header("location:login.php");
                die();
            }
            else{
                echo "Um erro ocorreu na criação da sua conta.";
            }
        */ 
        }
    ?>
<?php include "footer.php"?>