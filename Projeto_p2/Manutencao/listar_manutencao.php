<?php
require_once('../conexao.php');

$sql = "SELECT 
            m.id,
            e.nome AS equipamento,
            t.nome AS tecnico,
            s.nome AS servico,
            m.tipo,
            m.descricao,
            m.data_abertura,
            m.data_conclusao,
            m.status
        FROM manutencoes m
        INNER JOIN equipamentos e ON m.equipamento_id = e.id
        INNER JOIN tecnicos t ON m.tecnico_id = t.id
        LEFT JOIN servicos s ON m.servico_id = s.id
        ORDER BY m.id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$manutencoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>
        <i class="bi bi-list-check"></i>
        Lista de Manutenções
    </h2>

    <a href="nova_manutencao.php" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i>
        Nova Manutenção
    </a>

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Equipamento</th>
                <th>Técnico</th>
                <th>Serviço</th>
                <th>Tipo</th>
                <th>Abertura</th>
                <th>Conclusão</th>
                <th>Status</th>
                <th width="180">Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($manutencoes as $manutencao) { ?>

                <tr>
                    <td><?= $manutencao['id'] ?></td>
                    <td><?= htmlspecialchars($manutencao['equipamento']) ?></td>
                    <td><?= htmlspecialchars($manutencao['tecnico']) ?></td>
                    <td><?= htmlspecialchars($manutencao['servico'] ?? '') ?></td>
                    <td><?= htmlspecialchars($manutencao['tipo']) ?></td>
                    <td><?= htmlspecialchars($manutencao['data_abertura']) ?></td>
                    <td><?= htmlspecialchars($manutencao['data_conclusao'] ?? '') ?></td>
                    <td><?= htmlspecialchars($manutencao['status']) ?></td>

                    <td>
                        <a href="alterar_manutencao.php?id=<?= $manutencao['id'] ?>"
                           class="btn btn-warning btn-sm">
                            Alterar
                        </a>

                        <a href="excluir_manutencao.php?id=<?= $manutencao['id'] ?>"
                           class="btn btn-danger btn-sm">
                            Excluir
                        </a>
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>

    <a href="manutencoes.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

</div>

<?php require_once('../rodape.php'); ?>