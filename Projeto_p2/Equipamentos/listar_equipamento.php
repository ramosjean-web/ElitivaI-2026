<?php
require_once('../cabecalho.php');
require_once('../conexao.php');

$stmt = $pdo->query("SELECT * FROM equipamentos");
$resultado = $stmt->fetchAll();
?>

<h2>Equipamentos</h2>

<table class="table table-striped">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Patrimônio</th>
    <th>Ações</th>
</tr>

<?php foreach($resultado as $r): ?>

<tr>

    <td><?= $r['id'] ?></td>
    <td><?= $r['nome'] ?></td>
    <td><?= $r['patrimonio'] ?></td>

    <td>

            <a href="consultar_equipamento.php?id=<?= $r['id'] ?>"
                class="btn btn-info btn-sm">
                Consultar
            </a>

            <a href="alterar_equipamento.php?id=<?= $r['id'] ?>"
                 class="btn btn-warning btn-sm">
                    Alterar
            </a>

            <a href="excluir_equipamento.php?id=<?= $r['id'] ?>"
                 class="btn btn-danger btn-sm">
                      Excluir
            </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

<a href="equipamentos.php"
   class="btn btn-secondary">
   Voltar
</a>

<?php
require_once('../rodape.php');
?>