<?php
include_once("templates/header.php");
?>

<div class="container" id="view-contato-container">
    <h1 class="titulo"><?= $contato["nome"] ?></h1>

    <h4 class="bold">Telefone:</h4>
    <p><?= $contato["telefone"] ?></p>
    <h4 class="bold">E-mail:</h4>
    <p><?= $contato["email"] ?></p>
    <h4 class="bold">Observações:</h4>
    <p><?= $contato["observacoes"] ?></p>
</div>

<?php
include_once("templates/footer.php");
?>