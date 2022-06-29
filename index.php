<?php
include_once("templates/header.php");
?>

<div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="titulo">Minha Agenda</h1>
    <?php if(count($contatos) > 0 ): ?>
        <table class="table" id="contatos-tabela">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telofone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contatos as $contato): ?>
                    <tr>
                        <td scope="row" class="col-id"><?= $contato["id"] ?></td>
                        <td scope="row"><?= $contato["nome"] ?></td>
                        <td scope="row"><?= $contato["telefone"] ?></td>
                        <td scope="row"><?= $contato["email"] ?></td>
                        <td class="actions">
                            <a href="#"><i class="fas fa-eye check-icon"></i></a>
                            <a href="#"><i class="far fa-edit edit-icon"></i></a>
                            <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p id="lista-vazia">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">Clique aqui para adicionar</a></p>
    <?php endif;?>
</div>

<?php
include_once("templates/footer.php");
?>