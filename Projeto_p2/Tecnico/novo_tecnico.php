<?php
require_once('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $especialidade = $_POST['especialidade'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tecnicos
            (nome, telefone, email, especialidade, status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $nome,
        $telefone,
        $email,
        $especialidade,
        $status
    ]);

    header('Location: listar_tecnico.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Novo Técnico</h2>

    <form method="POST">

        <input type="text" name="nome" class="form-control mb-3" placeholder="Nome" required>

        <input type="text" name="telefone" class="form-control mb-3" placeholder="Telefone">

        <input type="email" name="email" class="form-control mb-3" placeholder="Email">

        <input type="text" name="especialidade" class="form-control mb-3" placeholder="Especialidade">

        <select name="status" class="form-control mb-3">
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>

        <button class="btn btn-success me-2">
    Salvar
        </button>

<a href="tecnico.php" class="btn btn-secondary">
    <i class="bi bi-arrow-left"></i>
    Voltar
</a>
            </div>

    </form>

</div>

<?php require_once('../rodape.php'); ?>