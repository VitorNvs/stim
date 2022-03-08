<?php session_start();?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Stim-Vitor Neves</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-ligh barra-nav">
    <a class="navbar-brand nav-text stim-nav" href="#">Stim</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link nav-text" href="pagina_inicial.php">Pagina principal <span class="sr-only">(current)</span></a>
        </li>
        
        <?php if(isset($_SESSION['login'])){?>

          <li class="nav-item">
          <a class="nav-link nav-text" href="pagina_usuario.php"><?php echo $_SESSION['login'];?></a>
          </li>
          <?php
            if($_SESSION['login'] == "admin"){
              echo"<li class='nav-item'>";
              echo "<a class='nav-link nav-text' href='controle.php'>Controle</a>";
              echo "</li>";
            }
          ?>
          <li class="nav-item">
          <a class="nav-link nav-text" href="deslogar.php">Encerrar Sessão</a>
          </li>

        <?php } else{ ?> 
          <li class="nav-item">
          <a class="nav-link nav-text" href="login.php">Iniciar Sessão</a>
          </li>
          <?php } ?>
          
          
  </nav>
  
  <div class="carrinho">
    <a href="carrinho.php">
      <button type="button" class="btn btn-secondary">
        Carrinho <span class="badge bg-success"><?=$_SESSION['itens_carrinho']?></span>
      </button>
    </a>
  </div>

  <section id="corpo">
  <div class="container">
  
<?php include "config_bd.php" ?>