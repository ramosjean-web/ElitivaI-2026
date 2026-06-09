 <?php
require_once('../conexao.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_equipamento.php');
    exit;
}

$sql = "SELECT * FROM equipamentos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$equipamento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$equipamento) {
    die("Equipamento não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM equipamentos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: listar_equipamento.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2 class="text-danger">Excluir Equipamento</h2>

    <div class="alert alert-warning">
        Deseja realmente excluir este equipamento?
    </div>

    <p><strong>Nome:</strong> <?= htmlspecialchars($equipamento['nome']) ?></p>
    <p><strong>Quantidade:</strong> <?= htmlspecialchars($equipamento['quantidade']) ?></p>

    <form method="POST" id="formExcluir">

        <button type="button" class="btn btn-danger" onclick="confirmarExclusao()">
            Excluir
        </button>

        <a href="listar_equipamento.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<script>
function confirmarExclusao() {
    Swal.fire({
        title: 'Tem certeza?',
        text: 'Esta ação não poderá ser desfeita.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formExcluir').submit();
        }
    });
}
</script>

<?php require_once('../rodape.php'); ?>