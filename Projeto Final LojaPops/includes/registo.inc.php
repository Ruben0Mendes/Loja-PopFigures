<?php
if(isset($_POST['submit'])){
    //echo "está a funcionar";
    //die();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $passRepeat = $_POST['repass'];

    require_once 'functions.inc.php';
    require_once 'basedados.inc.php';


    if(camposVaziosRegisto($nome, $email, $user, $pass, $passRepeat)!==false){
        header("location: ../registo.php?error=camposVazios");
        exit();
    }

    if(userInvalido($user)!==false){
        header("location: ../registo.php?error=userInvalido");
        exit();
    }

    if(emailInvalido($email)!==false){
        header("location: ../registo.php?error=emailInvalido");
        exit();
    }

    if(passDiferente($pass, $passRepeat)!==false){
        header("location: ../registo.php?error=passDiferente");
        exit();
    }


    if (userExiste($conn, $user, $email)!==false){
        header("location: ../registo.php?error=userExiste");
    }

    criarUser($conn, $nome, $email, $user, $pass);
    echo "terminou";

}else{
    header("location: ../registo.php");
}