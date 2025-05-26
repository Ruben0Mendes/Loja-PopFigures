<?php include_once "header.php"; ?>




<section>
<div>
  <h1>Entrar<h1>

  <br>

  <form action="includes/login.inc.php" method="POST">
    
    <label for="user">Nome de Utilizador:</label>
    <input type="text" id='user' name="user" placeholder="Utilizador/Email"><br/>

    <label for="pass">Password:</label>
    <input type="password" id='pass' name="pass" placeholder="password"><br/>
    
    <button type="submit" name="submit">Entrar</button>
  </form>
</div>
</section>


<?php
if(isset($_GET["error"]))
if($_GET['error']=="camposVazios"){
  echo "Erro Campos Vazios";
}else if($_GET['error']=="utilizadorEmailerrados"){
  echo "Erro o Utilizador ou Email estão errados";
}else if($_GET['error']=="passErrada"){
  echo "Erro Password Errada";
}

?>






<?php include_once "footer.php"; ?>