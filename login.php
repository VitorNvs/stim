<?php include "header.php"?>
<?php 
?>         
            <?php
            if($_SESSION['error'] == 4){
                echo "<div style='text-align: center; margin-left: 20%; margin-right: 20%;' class='alert alert-danger' role='alert'>Nome de usuário ou senha inválidos!</div>";
            }
            $_SESSION['error'] = 0 
            ?>

                <form class="login" action="login_processa.php" method="POST">
                    <h2 class="texto-nasa titulo">Login</h2>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4">
                            <label class="texto-nasa" for="login">Usuário</label>
                            <input type="text" class="form-control" id="login" name="login" required>
                        </div>     
                    </div> 
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4">
                            <label class="texto-nasa"for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>     
                    </div> 
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary">Iniciar Sessão</button>
                            <a href="criar_conta.php">Crie uma conta</a> 
                        </div>     
                    </div> 

                </form> 

<?php include "footer.php"?>