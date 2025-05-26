<?php 
include_once 'header.php';
require_once 'includes/functions.inc.php';
require_once 'includes/basedados.inc.php';
?>

<div>
  <h2>Apagar Produto?</h2>


  <?php

    if(isset($_GET["id"])){

    $lista = detalheProduto($conn, $_GET["id"]);


        if($lista){ ?>

        <div class = produto-cartao>
            <form action="includes/eliminarProdutos.inc.php" method="POST">

            <input type="hidden" name="produtosId" value="<?=$lista["produtosId"];?>">
            <p>Queres Mesmo Apagar este Produto: <?=$lista["produtosCodigo"];?>, <?=$lista["produtosNome"];?> ?</p>
            <button type="submit" name="submit">Eliminar</button>
            <p><a href="javascript: history.back()">Voltar</a></p>

            </form>
        </div>    

           <div class="produtos-container">
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

</div>

<?php include_once 'footer.php';?>
