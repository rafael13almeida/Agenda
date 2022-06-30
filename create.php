<?php
include_once("templates/header.php");
?>

<div class="container">
    <h1 id="titulo">Adicionar Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/processo.php" method="post">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone do Contato:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(xx) xxxxx- xxxx">
        </div>
        <div class="form-group">
            <label for="email">Email do Contato:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="3"></textarea>
        </div>
        <button type="submit" id="adicionar" class="btn btn-outline-primary">Adicionar</button>
        <?php include_once("templates/backbtn.php"); ?>
    </form>

</div>


<?php
include_once("templates/footer.php");
?>