<?php
require_once('../conexao.php');

$sql = "SELECT * FROM tecnicos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Lista de Técnicos</h2>

    <a href="novo_tecnico.php" class="btn btn-success mb-3">
        Novo Técnico
    </a>

    <table class="table table-striped">

        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Especialidade</th>
                <th>Status</th>
                <th width="180">Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($tecnicos as $tecnico){ ?>

            <tr>

                <td><?= $tecnico['nome'] ?></td>
                <td><?= $tecnico['telefone'] ?></td>
                <td><?= $tecnico['email'] ?></td>
                <td><?= $tecnico['especialidade'] ?></td>
                <td><?= $tecnico['status'] ?></td>

                <td>
                    <a href="alterar_tecnico.php?id=<?= $tecnico['id'] ?>"
                       class="btn btn-warning btn-sm">
                       Alterar
                    </a>

                    <a href="excluir_tecnico.php?id=<?= $tecnico['id'] ?>"
                       class="btn btn-danger btn-sm">
                       Excluir
                    </a>
                </td>

            </tr>
            

            <?php } ?>

        </tbody>

    </table>
<div class="mt-3">
    <a href="tecnico.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>
</div>
</div>

<?php require_once('../rodape.php'); ?>