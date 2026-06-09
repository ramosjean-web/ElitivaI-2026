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
            m.descricao,
            m.data_abertura,
            m.data_conclusao,
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
        Tem certeza que deseja excluir esta manutenção?
    </div>

    <p><strong>Equipamento:</strong> <?= htmlspecialchars($manutencao['equipamento']) ?></p>
    <p><strong>Técnico:</strong> <?= htmlspecialchars($manutencao['tecnico']) ?></p>
    <p><strong>Serviço:</strong> <?= htmlspecialchars($manutencao['servico'] ?? '') ?></p>
    <p><strong>Tipo:</strong> <?= htmlspecialchars($manutencao['tipo']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($manutencao['status']) ?></p>

    <form method="POST">

        <button type="submit" class="btn btn-danger">
            Sim, excluir
        </button>

        <a href="listar_manutencao.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>