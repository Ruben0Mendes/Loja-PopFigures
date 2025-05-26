<?php

function camposVaziosRegisto($nome, $email, $user, $pass, $passRepeat){
    $result = false;
    if(empty($nome)||empty($email)||empty($user)||empty($pass)||empty($pass)||empty($passRepeat)){
        $result=true;
    }
    return $result;
}


function userInvalido($user){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $user))
    {
        $result=true;
    }
    return $result;
}

function emailInvalido($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    return $result;
}

function passDiferente($pass, $passRepeat){
    $result = false;
    if($pass !== $passRepeat){
        $result=true;
    }
    return $result;
}

function criarUser($conn, $nome, $email, $user, $pass){
    $sql = "INSERT INTO users(usersName, usersEmail, usersUser, usersPass)VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn); 

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../registo.php?error=stmtcreatuser");
        exit();
    }
    $passSegura=password_hash($pass, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss",$nome, $email, $user, $passSegura);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../registo.php?error=none");
    exit();
}

function userExiste($conn, $user, $email){

        $sql = "SELECT * FROM users WHERE usersUser = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn); 

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../registo.php?error=userExiste");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $user, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if($row= mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}

function camposVaziosLogin($user, $pass){
    $result = false;
    if(empty($user)||(empty($pass))){
        $result = true;
    }
    return $result;

}


function efetuarLogin($conn, $user, $pass){
    $userExiste = userExiste($conn, $user, $user);
    if($userExiste == false){
        header("location: ../login.php?error=utilizadorEmailerrados");
        exit();
    }

    $passSegura = $userExiste["usersPass"];
    $checkPwd = password_verify($pass, $passSegura);
    if($checkPwd == false){
        header("location: ../login.php?error=passErrada");
        exit();
    }
    elseif($checkPwd == true){
        session_start();
        $_SESSION["userId"] = $userExiste;["usersId"];
        $_SESSION["userName"] = $userExiste["usersName"];
        header("location: ../index.php");
        exit();
    }
}

    function mostrarProdutos($conn){

        $sql = "SELECT * FROM produtos";
        
        if($resultData = mysqli_query($conn, $sql)){
            return $resultData;
    } 
    else {
        $result = false;
        return $result;
    }
}


// Adicionar Produtos

function addProduto($conn, $codigo, $nome, $caract, $image, $disp, $preco){
    
    $sql="INSERT INTO produtos(produtosCodigo, produtosNome, produtosCaract, produtosimage, produtosDisp, produtosPreco)VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn,);


    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../AddProduto.php?error=ProdutoNotAdd");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $codigo, $nome, $caract, $image, $disp, $preco);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}



function detalheProduto($conn, $id){

    $sql= "SELECT * FROM produtos WHERE produtosId=$id";
    $query = mysqli_query($conn, $sql);

    if($resultaData = mysqli_fetch_assoc($query)){
        return $resultaData;
    }

    else{
        $result = false;
        return $result; 
    }

}


function deleteproduto($conn, $produtosId){

    $sql="DELETE FROM produtos WHERE produtosId=?";
    $stmt = mysqli_stmt_init($conn,);


    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../produtos.php?error=deleteProduto");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $produtosId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../produtos.php");

}


 function camposVaziosEditar($produtosId, $produtosimage, $produtosNome, $produtosPreco, $produtosCaract, $produtosDisp, $produtosCodigo){

    $result=false;

    if(empty($produtosId) || empty($produtosimage) || empty($produtosNome) || empty($produtosPreco) || empty($produtosCaract) || empty($produtosDisp) || empty($produtosCodigo)){
        $result=true;
    }

    return $result;
}


function editarProduto($conn, $produtosId, $produtosimage, $produtosNome, $produtosPreco, $produtosCaract, $produtosDisp, $produtosCodigo){
    
    $sql= "UPDATE produtos SET produtosCodigo = ?, produtosNome = ?, produtosPreco = ?, produtosCaract = ?, produtosimage =?, produtosDisp = ? WHERE produtosId = ?;";
    $stmt = mysqli_stmt_init($conn,);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../editarPordutos.php?error=stmteditarProdutos");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssssii", $produtosCodigo, $produtosNome, $produtosPreco, $produtosCaract, $produtosDisp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../detalheProdutos.php?id=produtosId&error=none");
    exit();

    
}


function apagarProduto($conn, $produtosId){

    $sql="DELETE FROM produtos WHERE produtosId=?";
    $stmt = mysqli_stmt_init($conn,);


    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../produtos.php?error=deleteProduto");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $produtosId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../produtos.php");

}


function pesquisa($conn, $pesquisa){
    $pesquisa = mysqli_real_escape_string($conn, $pesquisa);
    $sql = "SELECT * FROM produtos WHERE produtosCodigo LIKE '%$pesquisa%' OR produtosNome LIKE '%$pesquisa%'";


    if($resultData = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($resultData) > 0){
            return $resultData; 
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}


function mostrarUser($conn, $id) {

    $sql= "SELECT * FROM users WHERE userId=$id";
    $query = mysqli_query($conn, $sql);

    if($resultaData = mysqli_fetch_assoc($query)){
        return $resultaData;
    }

    else{
        $result = false;
        return $result; 
    }

}