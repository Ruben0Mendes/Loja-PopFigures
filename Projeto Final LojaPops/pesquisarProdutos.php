<?php 
include_once 'header.php';
require_once 'includes/functions.inc.php';
require_once 'includes/basedados.inc.php';
?>

<div>

<section>
  <h2>Resultados:</h2>
  
    
<?php

    $pesquisa = $_POST["pesquisa"];


    if (empty($pesquisa)) {
        header("location: ../produtos.php?error=emptyPesquisa");
        exit();

    }

$Listar = pesquisa($conn, $pesquisa);

if ($Listar) {
    foreach ($Listar as $Lista): ?>

        <a href="detalheProdutos.php?id=<?= $Lista["produtosId"];?>" style="text-decoration: none;" >
            <div class="produto-cartao">
                <img src="./images/<?=$Lista["produtosimage"];?>" alt="" width="150">
                <h3><?=$Lista["produtosNome"];?></h3>
                <p class="preco"><?=$Lista["produtosPreco"];?>€</p>
                <p><?=$Lista["produtosCaract"];?></p>
                <p style="font-size:large; color:brown; font-weight: bold;  " ><?=$Lista["produtosDisp"];?></p>
                <p>Disponiveis</p>
                <p style="align-items: center;"><a href="editarProdutos.php?id=<?= $Lista["produtosId"];?> " style="text-decoration: none; display: inline-block; color: orange;" >Editar</a> |   | <a href="eliminarProdutos.php?id=<?= $Lista["produtosId"];?> " style="text-decoration: none; display: inline-block; color: orange;">Eliminar</a></p>
            </div>
        </a>
<?php endforeach;
} else { ?>
    <p>Esta Pop Figure não está disponivel</p>
<?php } ?>  

    </div>
    </section>

    <section></section>
    <br><br>
    <br>

<?php include_once 'footer.php';?>
