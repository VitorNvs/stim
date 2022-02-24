<?php include "header.php"?>
<?php   
$id_usuario = $_SESSION['id_usuario'];
$consulta = mysqli_query($link, "select apelido,bio from usuario where id_usuario=$id_usuario") ;  
$tupla = mysqli_fetch_assoc($consulta);
$bio = $tupla['bio'];
$apelido = $tupla['apelido'];
?>        
    
    <form class="login" action="perfil_bd.php" method="POST">
        
        <h2 class="texto-nasa titulo">Editar Perfil</h2>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label class="texto-nasa" for="apelido">Apelido</label>
                <input type="text" class="form-control" id="apelido" name="apelido" placeholder= "Atual: <?=$tupla['apelido']?>" >
            </div>     
        </div> 
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label class="texto-nasa"for="bio">Bio</label>
                <textarea type="text" class="form-control" id="bio" name="bio" placeholder= "Atual: <?=$tupla['bio']?>" ></textarea>
            </div>     
        </div> 
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>     
        </div> 

    </form> 

<?php include "footer.php"?>