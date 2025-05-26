<?php
if(isset($_POST['submit'])){
    //echo "Tá top";
    //die();

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    

    require_once 'functions.inc.php';
    require_once 'basedados.inc.php';


    if(camposVaziosLogin($user, $pass)!==false){
        header("location: ../login.php?error=camposVazios");
        exit();
    }

    efetuarLogin($conn, $user, $pass);{

    }

}else{
    header("location: ..login.php");
    exit();
}



