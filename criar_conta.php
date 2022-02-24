<?php include "header.php"?>

    
    <h2 class="centralize-text texto-nasa">Criando a conta</h2>
    <?php
        if($_SESSION['error'] == 1){
            echo "<div style='text-align: center; margin-left: 20%; margin-right: 20%;' class='alert alert-danger' role='alert'>Erro na confirmação da senha!</div>";
        }
        else if($_SESSION['error'] == 2){
            echo "<div style='text-align: center; margin-left: 20%; margin-right: 20%;' class='alert alert-danger' role='alert'>A senha escolhida já existe!</div>";
        }
        else if($_SESSION['error'] == 3){
            echo "<div style='text-align: center; margin-left: 20%; margin-right: 20%;' class='alert alert-danger' role='alert'>A senha precisa se adequar aos valores mínimos e máximos!</div>";
        }
    ?>
    <form class="cria-conta" action="conta_bd.php" method="POST">
        <div class="container py-2">
            <div class="row justify-content-center">
                <div class="col-3">
                    <label for="login" class="texto-nasa">Nome de usuário</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="col-3">
                    <label for="apelido" class="texto-nasa">Apelido</label>
                    <input type="text" class="form-control" id="apelido" name="apelido" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <label for="email" class="texto-nasa">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>    
            </div>

            <div class="row justify-content-center">
                <div class="col-3">
                    <label for="senha" class="texto-nasa">Senha <span style="font-size:10px; color: red;">(No mínimo 4 e no máximo 14 caracteres)</span></label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="col-3">
                    <label for="senhaconf" class="texto-nasa">Confirme a senha</label>
                    <input type="password" class="form-control" id="senhaconf" name="senhaconf" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <label for="nascimento" class="texto-nasa">Data de Nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                </div>    
            </div>
            <div class="row justify-content-center">
                <div class="col-6" style="padding-top: 15px;">
                    <button type="submit" class="btn btn-primary">Criar conta</button>
                </div>    
            </div>
        </div>
    </form>

<?php include "footer.php"?>