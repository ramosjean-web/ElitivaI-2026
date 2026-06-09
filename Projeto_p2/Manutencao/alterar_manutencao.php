<?php
require_once('../conexao.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_manutencao.php');
    exit;
}

$sql = "SELECT * FROM manutencoes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$manutencao = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$manutencao) {
    die("Manutenção não encontrada.");
}

$stmt = $pdo->prepare("SELECT id, nome FROM equipamentos ORDER BY nome");
$stmt->execute();
$equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT id, nome FROM tecnicos ORDER BY nome");
$stmt->execute();
$tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT id, nome FROM servicos ORDER BY nome");
$stmt->execute();
$servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $equipamento_id = $_POST['equipamento_id'];
    $tecnico_id = $_POST['tecnico_id'];
    $servico_id = $_POST['servico_id'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $data_abertura = $_POST['data_abertura'];
    $data_conclusao = $_POST['data_conclusao'] ?: null;
    $status = $_POST['status'];

    $sql = "UPDATE manutencoes 
            SET equipamento_id = ?,
                tecnico_id = ?,
                servico_id = ?,
                tipo = ?,
                descricao = ?,
                data_abertura = ?,
                data_conclusao = ?,
                status = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $equipamento_id,
        $tecnico_id,
        $servico_id,
        $tipo,
        $descricao,
        $data_abertura,
        $data_conclusao,
        $status,
        $id
    ]);

    header('Location: listar_manutencao.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Alterar Manutenção</h2>

    <form method="POST" class="mt-4">

        <div class="mb-3">
            <label class="form-label">Equipamento</label>
            <select name="equipamento_id" class="form-control" required>
                <?php foreach ($equipamentos as $equipamento) { ?>
                    <option value="<?= $equipamento['id'] ?>"
                        <?= $manutencao['equipamento_id'] == $equipamento['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($equipamento['nome']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Técnico</label>
            <select name="tecnico_id" class="form-control" required>
                <?php foreach ($tecnicos as $tecnico) { ?>
                    <option value="<?= $tecnico['id'] ?>"
                        <?= $manutencao['tecnico_id'] == $tecnico['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($tecnico['nome']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Serviço</label>
            <select name="servico_id" class="form-control" required>
                <?php foreach ($servicos as $servico) { ?>
                    <option value="<?= $servico['id'] ?>"
                        <?= $manutencao['servico_id'] == $servico['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($servico['nome']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-control">
                <option value="Preventiva" <?= $manutencao['tipo'] == 'Preventiva' ? 'selected' : '' ?>>Preventiva</option>
                <option value="Corretiva" <?= $manutencao['tipo'] == 'Corretiva' ? 'selected' : '' ?>>Corretiva</option>
                <option value="Preditiva" <?= $manutencao['tipo'] == 'Preditiva' ? 'selected' : '' ?>>Preditiva</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4"><?= htmlspecialchars($manutencao['descricao']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Abertura</label>
            <input type="date" name="data_abertura" class="form-control"
                   value="<?= htmlspecialchars($manutencao['data_abertura']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Conclusão</label>
            <input type="date" name="data_conclusao" class="form-control"
                   value="<?= htmlspecialchars($manutencao['data_conclusao']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="Aberta" <?= $manutencao['status'] == 'Aberta' ? 'selected' : '' ?>>Aberta</option>
                <option value="Em Andamento" <?= $manutencao['status'] == 'Em Andamento' ? 'selected' : '' ?>>Em Andamento</option>
                <option value="Concluida" <?= $manutencao['status'] == 'Concluida' ? 'selected' : '' ?>>Concluída</option>
                <option value="Cancelada" <?= $manutencao['status'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Salvar Alteração
        </button>

        <a href="listar_manutencao.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>