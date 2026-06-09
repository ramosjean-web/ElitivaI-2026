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

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    $sql = "UPDATE servicos 
            SET nome = ?, descricao = ?, valor = ?, status = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $descricao, $valor, $status, $id]);

    header('Location: listar_servico.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Alterar Serviço</h2>

    <form method="POST" class="mt-4">

        <div class="mb-3">
            <label class="form-label">Nome do Serviço</label>
            <input type="text" name="nome" class="form-control"
                   value="<?= htmlspecialchars($nome) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4"><?= htmlspecialchars($descricao) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control"
                   value="<?= htmlspecialchars($valor) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Ativo" <?= $status == 'Ativo' ? 'selected' : '' ?>>Ativo</option>
                <option value="Inativo" <?= $status == 'Inativo' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Salvar Alteração
        </button>

        <a href="listar_servico.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>