<?php
if(isset($_POST['submit'])){
    //echo "está a funcionar";
    //die();
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $caract = $_POST['caract'];
    $image = $_POST['image'];
    $disp = $_POST['disp'];
    $preco = $_POST['preco'];
   

    require_once 'functions.inc.php';
    require_once 'basedados.inc.php';


   



    addProduto($conn, $codigo, $nome, $caract, $image, $disp, $preco);
    //echo "terminou";
    header("location: ../produtos.php");

}else{
    header("location: ../AddProduto.php");
}