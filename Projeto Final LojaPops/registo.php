<?php include_once "header.php"; ?>





<section>
<div>
  <h1>Registo</h1>

  <form action="includes/registo.inc.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id='nome' name="nome" placeholder="Nome Completo"><br/>
    <label for="email">Email:</label>
    <input type="text" id='email' name="email" placeholder="Email"><br/>
    <label for="user">Nome De Utilizador:</label>
    <input type="text" id='user' name="user" placeholder="Nome de Utilizador"><br/>
    <label for="pass">Password:</label>
    <input type="password" id='pass' name="pass" placeholder="Password"><br/>
    <label for="repass">Repetir Password:</label>
    <input type="password" id='repass' name="repass" placeholder="Password"><br/>
    <button type="submit" name="submit">Registar</button>
  </form>
 </section> 
  
<?php
if (isset($_GET['error'])) {
  if($_GET['error']=="camposVazios"){
    echo "Erro Campos Vazios";
  }elseif($_GET["error"]== "userInvalido"){
    echo "Erro User Inválido";
  }else if($_GET['error']=="emailInvalido"){
    echo "Erro Email Inválido";
  }else if($_GET['error']=="none"){
    echo "Sucesso: Utilizador registado";
  }elseif($_GET["error"]== "userExiste"){
    echo "Erro o Utilizador já existe";
  }elseif($_GET["error"]=="passDiferente"){
    echo "Erro Password Não é igual";
  }
}
?>


</div>



<?php include_once "footer.php";  ?>








