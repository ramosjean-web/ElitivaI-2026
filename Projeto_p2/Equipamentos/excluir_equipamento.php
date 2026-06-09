<?php
require_once('../cabecalho.php');
require_once('../conexao.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_equipamento.php');
    exit;
}

$sql = "SELECT * FROM equipamentos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($equipamentos as $equipamento) {
    $nome = $equipamento['nome'];
    $patrimonio = $equipamento['patrimonio'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM equipamentos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: listar_equipamento.php');
    exit;
}
?>

<div class="container mt-4">

    <h2 class="text-danger">Excluir Equipamento</h2>

    <div class="alert alert-warning">
        Tem certeza que deseja excluir este equipamento?
    </div>

    <p><strong>Nome:</strong> <?= $nome ?></p>
    <p><strong>Patrimônio:</strong> <?= $patrimonio ?></p>

    <form method="POST">

        <button type="submit" class="btn btn-danger">
            Sim, excluir
        </button>

        <a href="listar_equipamento.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>