<?php 
    include_once "header.php";
    require_once 'includes/functions.inc.php';
    require_once 'includes/basedados.inc.php';
?>

<section>
    <h2>O Meu Perfil</h2>


<?php

if (isset($_GET["id"])) {
    $Listas = mostrarUser($conn, $_GET["id"]);

    if ($Listas) { ?>
        <p><?= $Listas["usersName"]; ?></p>
        <p><?= $Listas["usersEmail"]; ?></p>
        <p><?= $Listas["usersUser"]; ?></p>
    <?php 
    } else { ?>
        <p>O Perfil não existe.</p>
        <?php
     } 
} 
?>








<?php include_once "footer.php"; ?>