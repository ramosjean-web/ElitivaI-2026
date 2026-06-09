<?php
require_once('../conexao.php');

$sql = "SELECT * FROM tecnicos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2><i class="bi bi-person-gear"></i> Relatório de Técnicos</h2>

    <table class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Especialidade</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tecnicos as $tecnico) { ?>
                <tr>
                    <td><?= $tecnico['id'] ?></td>
                    <td><?= htmlspecialchars($tecnico['nome']) ?></td>
                    <td><?= htmlspecialchars($tecnico['telefone']) ?></td>
                    <td><?= htmlspecialchars($tecnico['email']) ?></td>
                    <td><?= htmlspecialchars($tecnico['especialidade']) ?></td>
                    <td><?= htmlspecialchars($tecnico['status']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="/principal.php" class="btn btn-secondary">Voltar</a>

</div>

<?php require_once('../rodape.php'); ?>