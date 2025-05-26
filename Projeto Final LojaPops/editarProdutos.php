<?php 
include_once 'header.php';
require_once 'includes/functions.inc.php';
require_once 'includes/basedados.inc.php';
?>

<section>
  <h1>Editar Produto</h1>
    
  <?php

    if(isset($_GET["id"])){

    $lista = detalheProduto($conn, $_GET["id"]);


        if($lista){ ?>
            <div style="display: flex; justify-content: start ; align-items: center ; flex-wrap: wrap; " >
                
            <form action="includes/editarProdutos.inc.php" method="post">

                <input type="hidden" name="produtosId" value="<?=$lista["produtosId"];?>">
                <input type="hidden" name="produtosimage" value="<?=$lista["produtosimage"];?>">

                <p>Código: <input type="text" name="produtosCodigo" value="<?=$lista["produtosCodigo"];?>"></p>
                <p>Nome: <input type="text" name="produtosNome" value="<?=$lista["produtosNome"];?>"></p>
                <p>Preço: <input type="text" name="produtosPreco" value="<?=$lista["produtosPreco"];?>"></p>
                <p>Descrição: <input type="text" name="produtosCaract" value="<?=$lista["produtosCaract"];?>"></p>
                <p>Stock: <input type="text" name="produtosDisp" value="<?=$lista["produtosDisp"];?>"></p>



                <button type="submit" name="submit">Confirmar</button>
                


            </form>

            <div class="produto-cartao">
                    <img src="./images/<?=$lista["produtosimage"];?>" alt="Iron Man" width="150">
                    <h3><?=$lista["produtosNome"];?></h3>
                    <p class="preco"><?=$lista["produtosPreco"];?>€</p>
                    <p><?=$lista["produtosCaract"];?></p>
                    <p style="font-size:large; color:brown; font-weight: bold; "><?=$lista["produtosDisp"];?></p>
                    <p>Disponiveis</p>
                    <p>Código: <?=$lista["produtosCodigo"];?></p>
                    
                </div>

        </div>

<?php
        }
        else{
            echo "<p> O Produto não existe </p>";
        }

    }
    else{

        echo "<p>Não foi possivél Identificar o Produto</p>";

    }


?>


</section>

<?php include_once 'footer.php';?>
