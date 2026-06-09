<?php
require_once('../conexao.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_manutencao.php');
    exit;
}

$sql = "SELECT 
            m.id,
            e.nome AS equipamento,
            t.nome AS tecnico,
            s.nome AS servico,
            m.tipo,
            m.status
        FROM manutencoes m
        INNER JOIN equipamentos e ON m.equipamento_id = e.id
        INNER JOIN tecnicos t ON m.tecnico_id = t.id
        LEFT JOIN servicos s ON m.servico_id = s.id
        WHERE m.id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$manutencao = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$manutencao) {
    die("Manutenção não encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM manutencoes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: listar_manutencao.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2 class="text-danger">Excluir Manutenção</h2>

    <div class="alert alert-warning">
        Deseja realmente excluir esta manutenção?
    </div>

    <p><strong>Equipamento:</strong> <?= htmlspecialchars($manutencao['equipamento']) ?></p>
    <p><strong>Técnico:</strong> <?= htmlspecialchars($manutencao['tecnico']) ?></p>
    <p><strong>Serviço:</strong> <?= htmlspecialchars($manutencao['servico']) ?></p>
    <p><strong>Tipo:</strong> <?= htmlspecialchars($manutencao['tipo']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($manutencao['status']) ?></p>

    <form method="POST" id="formExcluir">

        <button type="button" class="btn btn-danger" onclick="confirmarExclusao()">
            Excluir
        </button>

        <a href="listar_manutencao.php" class="btn btn-secondary">
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