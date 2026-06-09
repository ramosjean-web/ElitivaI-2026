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

$nome = $servico['nome'];
$descricao = $servico['descricao'];
$valor = $servico['valor'];
$status = $servico['status'];

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
        Tem certeza que deseja excluir este serviço?
    </div>

    <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
    <p><strong>Descrição:</strong> <?= htmlspecialchars($descricao) ?></p>
    <p><strong>Valor:</strong> R$ <?= number_format($valor, 2, ',', '.') ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($status) ?></p>

    <form method="POST">

        <button type="submit" class="btn btn-danger">
            Sim, excluir
        </button>

        <a href="listar_servico.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>