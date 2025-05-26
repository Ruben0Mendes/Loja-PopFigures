<?php session_start(); ?>


<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Loja de Pop Figures</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Estilos.css">
    <script defer src="script.js"></script>
</head>
<body>
    <a href="produtos.php" style="text-decoration: none">
    <div class="blackfriday text-center">
        <div class="container d-flex justify-content-between align-items-center">
            <span>Aproveita a nossa BLACK FRIDAY</span>
            <span class="text-underline">Só até 31 de Dezembro</span>
            <div class="right">
            </div>
        </div>
    </div>
    </a>



    <div class="topnav" id="myTopnav" style="display: flex;" >
        <a href="index.php" class="active">INÍCIO</a>
        <a href="produtos.php">PRODUTOS</a>
        <a href="curiosidades.php">CURIOSIDADES</a>
        <a href="sobre.php">SOBRE</a>
        <a href="contacto.php">CONTACTO</a>
        <a href="pesquisar.php">PESQUISAR</a>
        <?php
      if(isset($_SESSION["userName"])){ ?>

    <a href="perfil.php">PERFIL</a>
    <a href="includes/logout.inc.php" style="color: red">SAIR</a>  

    <?php }else{?>

    <a href="registo.php" style="color: cyan" >REGISTAR</a></li>
    <a href="login.php" style="Color: cyan">ENTRAR</a>


    <?php } ?>

        
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      </div> 



    <button onclick="topFunction()" id="Botão" title="SUBIR">&uArr;</button> 
</body>