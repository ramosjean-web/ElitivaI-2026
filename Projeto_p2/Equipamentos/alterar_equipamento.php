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

$nome = $equipamento['nome'];
$patrimonio = $equipamento['patrimonio'];
$modelo = $equipamento['modelo'];
$fabricante = $equipamento['fabricante'];
$setor = $equipamento['setor'];
$data_aquisicao = $equipamento['data_aquisicao'];
$status = $equipamento['status'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $patrimonio = $_POST['patrimonio'];
    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $setor = $_POST['setor'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $status = $_POST['status'];

    $sql = "UPDATE equipamentos 
            SET nome = ?,
                patrimonio = ?,
                modelo = ?,
                fabricante = ?,
                setor = ?,
                data_aquisicao = ?,
                status = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $nome,
        $patrimonio,
        $modelo,
        $fabricante,
        $setor,
        $data_aquisicao,
        $status,
        $id
    ]);

    header('Location: listar_equipamento.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Alterar Equipamento</h2>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control"
                   value="<?= htmlspecialchars($nome) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Patrimônio</label>
            <input type="text" name="patrimonio" class="form-control"
                   value="<?= htmlspecialchars($patrimonio) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control"
                   value="<?= htmlspecialchars($modelo) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Fabricante</label>
            <input type="text" name="fabricante" class="form-control"
                   value="<?= htmlspecialchars($fabricante) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Setor</label>
            <input type="text" name="setor" class="form-control"
                   value="<?= htmlspecialchars($setor) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Aquisição</label>
            <input type="date" name="data_aquisicao" class="form-control"
                   value="<?= htmlspecialchars($data_aquisicao) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Operacional" <?= $status == 'Operacional' ? 'selected' : '' ?>>
                    Operacional
                </option>

                <option value="Em Manutenção" <?= $status == 'Em Manutenção' ? 'selected' : '' ?>>
                    Em Manutenção
                </option>

                <option value="Inativo" <?= $status == 'Inativo' ? 'selected' : '' ?>>
                    Inativo
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Salvar Alteração
        </button>

        <a href="listar_equipamento.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>