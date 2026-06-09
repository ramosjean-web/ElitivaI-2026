<?php
require_once('../conexao.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_servico.php');
    exit;
}

$sql = "SELECT * FROM servicos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$servico = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$servico) {
    die("Serviço não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM servicos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: listar_servico.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2 class="text-danger">Excluir Serviço</h2>

    <div class="alert alert-warning">
        Deseja realmente excluir este serviço?
    </div>

    <p><strong>Nome:</strong> <?= htmlspecialchars($servico['nome']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($servico['status']) ?></p>

    <form method="POST" id="formExcluir">

        <button type="button" class="btn btn-danger" onclick="confirmarExclusao()">
            Excluir
        </button>

        <a href="listar_servico.php" class="btn btn-secondary">
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