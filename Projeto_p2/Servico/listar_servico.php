<?php
require_once('../conexao.php');

$sql = "SELECT * FROM servicos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>
        <i class="bi bi-wrench-adjustable"></i>
        Lista de Serviços
    </h2>

    <a href="novo_servico.php" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i>
        Novo Serviço
    </a>

    <table class="table table-striped table-bordered">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Status</th>
                <th width="180">Ações</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($servicos as $servico) { ?>

                <tr>

                    <td><?= $servico['id'] ?></td>

                    <td><?= htmlspecialchars($servico['nome']) ?></td>

                    <td><?= htmlspecialchars($servico['descricao']) ?></td>

                    <td>
                        R$ <?= number_format($servico['valor'], 2, ',', '.') ?>
                    </td>

                    <td><?= $servico['status'] ?></td>

                    <td>

                        <a href="alterar_servico.php?id=<?= $servico['id'] ?>"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>
                            Alterar
                        </a>

                        <a href="excluir_servico.php?id=<?= $servico['id'] ?>"
                           class="btn btn-danger btn-sm">

                            <i class="bi bi-trash"></i>
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

    <a href="servico.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

</div>

<?php require_once('../rodape.php'); ?>