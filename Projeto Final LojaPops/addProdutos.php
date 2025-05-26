<?php include_once "header.php"; ?>







<div>
  <h2>Adicionar Produto</h2>
<BR>
  <form action="includes/addProdutos.inc.php" method="POST">
    <label for="codigo">Código:</label>
    <input type="text" id='codigo' name="codigo" placeholder="Código do Produto"><br/>
    <label for="nome">Nome:</label>
    <input type="text" id='nome' name="nome" placeholder="Nome do Produto"><br/>
    <label for="caract">Descrição:</label>
    <input type="text" id='caract' name="caract" placeholder="Caracteristicas do Produto"><br/>
    <label for="image">Imagem:</label>
    <input type="text" id="image" name="image" placeholder="Introduz o nome e formato da imagem">
    <br>
    <label for="preco">Preço:</label>
    <input type="text" id='preco' name="preco" placeholder="Preço do Produto"><br/>
    <br>
    <label for="disp">Disponíbilidade:</label>
    <input type="text" id='disp' name="disp" placeholder="Stock do Produto"><br/>
    <button type="submit" name="submit">Adicionar Produto</button>
  </form>
  
<br>


</div>
















<?php include_once "footer.php"; ?>