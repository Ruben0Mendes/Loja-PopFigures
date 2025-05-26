<?php
if(isset($_POST['submit'])){
    //echo "está top";
    //die();


    $produtosId = $_POST['produtosId'];
    $produtosimage = $_POST['produtosimage'];
    $produtosNome = $_POST['produtosNome'];
    $produtosPreco = $_POST['produtosPreco'];
    $produtosCaract = $_POST['produtosCaract'];
    $produtosDisp = $_POST['ProdutosDisp'];
    $produtosCodigo = $_POST['produtosCodigo'];


    require_once 'functions.inc.php';
    require_once 'basedados.inc.php';

    if(camposVaziosEditar($produtosId, $produtosimage, $produtosNome, $produtosPreco, $produtosCaract, $produtosDisp, $produtosCodigo)){

        header("location: ../editarProdutos.php?id=$produtosId&error=emptyFields");
        exit();
    }

    
    editarProduto($conn, $produtosId, $produtosimage, $produtosNome, $produtosPreco, $produtosCaract, $produtosDisp, $produtosCodigo);{

        header("location: ../editarProdutos.php");
        exit();

    }

}