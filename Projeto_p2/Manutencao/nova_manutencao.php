<?php
require_once('../conexao.php');

$sql = "SELECT id, nome FROM equipamentos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT id, nome FROM tecnicos ORDER BY nome";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tecnicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT id, nome FROM servicos ORDER BY nome";
$stmt = $pdo->prepare($sql);
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

    $sql = "INSERT INTO manutencoes
            (
                equipamento_id,
                tecnico_id,
                servico_id,
                tipo,
                descricao,
                data_abertura,
                data_conclusao,
                status
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $equipamento_id,
        $tecnico_id,
        $servico_id,
        $tipo,
        $descricao,
        $data_abertura,
        $data_conclusao,
        $status
    ]);

    header('Location: listar_manutencao.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>
        <i class="bi bi-tools"></i>
        Nova Manutenção
    </h2>

    <form method="POST" class="mt-4">

        <div class="mb-3">
            <label class="form-label">Equipamento</label>

            <select name="equipamento_id" class="form-control" required>

                <option value="">Selecione...</option>

                <?php foreach ($equipamentos as $equipamento) { ?>

                    <option value="<?= $equipamento['id'] ?>">
                        <?= $equipamento['nome'] ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Técnico</label>

            <select name="tecnico_id" class="form-control" required>

                <option value="">Selecione...</option>

                <?php foreach ($tecnicos as $tecnico) { ?>

                    <option value="<?= $tecnico['id'] ?>">
                        <?= $tecnico['nome'] ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Serviço</label>

            <select name="servico_id" class="form-control" required>

                <option value="">Selecione...</option>

                <?php foreach ($servicos as $servico) { ?>

                    <option value="<?= $servico['id'] ?>">
                        <?= $servico['nome'] ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>

            <select name="tipo" class="form-control">

                <option value="Preventiva">Preventiva</option>
                <option value="Corretiva">Corretiva</option>
                <option value="Preditiva">Preditiva</option>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>

            <textarea
                name="descricao"
                class="form-control"
                rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Abertura</label>

            <input
                type="date"
                name="data_abertura"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Conclusão</label>

            <input
                type="date"
                name="data_conclusao"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>

            <select name="status" class="form-control">

                <option value="Aberta">Aberta</option>
                <option value="Em Andamento">Em Andamento</option>
                <option value="Concluida">Concluída</option>
                <option value="Cancelada">Cancelada</option>

            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Salvar
        </button>

        <a href="manutencoes.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<?php require_once('../rodape.php'); ?>