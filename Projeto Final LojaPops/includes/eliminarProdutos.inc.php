<?php
if(isset($_POST['submit'])){
    //echo "está Top";
    //die();


    $produtosId = $_POST['produtosId'];


    require_once 'functions.inc.php';
    require_once 'basedados.inc.php';

    if(empty($produtosId)){

        header("location: ../produtos.php?error=NaotemId");
        exit();
    }

    
    apagarProduto($conn, $produtosId);

}