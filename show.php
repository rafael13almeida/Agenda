<?php
include_once("templates/header.php");
?>

<div class="container" id="view-contato-container">
    <h1 class="titulo"><?= $contato["nome"] ?></h1>

    <p class="bold">Telefone:</p>
    <p><?= $contato["telefone"] ?></p>
    <p class="bold">E-mail:</p>
    <p><?= $contato["email"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contato["observacoes"] ?></p>

    <?php include_once("templates/backbtn.php"); ?>
</div>


<?php
include_once("templates/footer.php");
?>