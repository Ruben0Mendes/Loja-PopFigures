<?php 
include_once 'header.php';
require_once 'includes/functions.inc.php';
require_once 'includes/basedados.inc.php';
?>


<section id="home">
        <h1>PRODUTOS</h1>
        <img src="images/Banner.jpg" alt="Pop Figures Banner">
        <p>Descobre a nossa coleção exclusiva de Pop Figures!</p>
    </section>

    <section id="produtos"> 
        <h2>Os Nossos Produtos</h2>
        
        <h3 style="display: flex; align-items:end;" ><a href="addProdutos.php" style="text-decoration:none; color:red; background-color:orange; padding:10px; border-radius:10px;" >Adicionar Produto</a></h3>
        <br>
        <div class="produtos-container">
        
        <?php
$Listar = mostrarProdutos($conn);

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
    <p>Ups Vendi Tudo ahaha.</p>
<?php } ?>  

    </div>
    </section>

<?php include_once "footer.php"; ?>