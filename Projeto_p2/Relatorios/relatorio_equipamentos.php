<?php
require_once('../conexao.php');

$sql = "SELECT * FROM equipamentos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2><i class="bi bi-cpu"></i> Relatório de Equipamentos</h2>

    <table class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Modelo</th>
                <th>Fabricante</th>
                <th>Setor</th>
                <th>Data Aquisição</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($equipamentos as $equipamento) { ?>
                <tr>
                    <td><?= $equipamento['id'] ?></td>
                    <td><?= htmlspecialchars($equipamento['nome']) ?></td>
                    <td><?= htmlspecialchars($equipamento['quantidade']) ?></td>
                    <td><?= htmlspecialchars($equipamento['modelo']) ?></td>
                    <td><?= htmlspecialchars($equipamento['fabricante']) ?></td>
                    <td><?= htmlspecialchars($equipamento['setor']) ?></td>
                    <td><?= htmlspecialchars($equipamento['data_aquisicao']) ?></td>
                    <td><?= htmlspecialchars($equipamento['status']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="/principal.php" class="btn btn-secondary">Voltar</a>

</div>

<?php require_once('../rodape.php'); ?>