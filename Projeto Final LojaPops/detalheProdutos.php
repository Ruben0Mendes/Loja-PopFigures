<?php 
include_once 'header.php';
require_once 'includes/functions.inc.php';
require_once 'includes/basedados.inc.php';
?>

<div>
  <h2>Detalhes do Produto</h2>

    <section>
  <?php

    if(isset($_GET["id"])){

    $lista = detalheProduto($conn, $_GET["id"]);


        if($lista){ ?>

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
            echo "<p> Essa Pop Figure não Existe. </p>";
        }

    }
    else{

        echo "<p>Não foi possivel encontrar Essa Pop Figure. </p>";

    }


?>

</section>

<?php include_once 'footer.php';?>