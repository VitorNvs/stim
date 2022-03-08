    <?php include "header.php"?>

        <?php 
            $_SESSION['error'] = 0;
            $_SESSION['search'] = "";
        ?>
        <section id="pagina-principal">
            <div class="flex-container">
                <p id="titulo-inicio">STIM</p>
                <p class="texto-nasa">Essa é a <b>STIM</b>, uma loja de jogos extremamente famosa no território brasileiro e internacional. Juntando jogos das maiores empresas do ramo, como Nintendo, Sony e Ubisoft, a Stim segue oferencendo as melhores opções do mercado de games! Crie hoje sua conta e compre os games mais bem avaliados pelo público e pela crítica!</p>
            </div>
            <p style="color:red;font-size:15px;text-align:center;">Obs.: Este é um site com objetivos de aprendizagem, portanto nenhum produto é vendido e não se deve utilizar informações pessoais reais.</p>
            
            <div class='flex-container btn-jogos'>
                <a href="tabela_jogos.php?search=0&pag=1"><button class='btn btn-info'>Ver todos os jogos</button></a>
            </div>
            
            <?php include "jogos.php"?>
        </section>
    <?php include "footer.php"?>