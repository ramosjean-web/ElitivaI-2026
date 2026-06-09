<?php
require_once('../conexao.php');

$id = $_GET['id'];

$sql = "SELECT * FROM tecnicos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$tecnico = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "UPDATE tecnicos
            SET nome=?,
                telefone=?,
                email=?,
                especialidade=?,
                status=?
            WHERE id=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['nome'],
        $_POST['telefone'],
        $_POST['email'],
        $_POST['especialidade'],
        $_POST['status'],
        $id
    ]);

    header('Location: listar_tecnico.php');
    exit;
}

require_once('../cabecalho.php');
?>

<div class="container mt-4">

<form method="POST">

<input type="text" name="nome"
       value="<?= $tecnico['nome'] ?>"
       class="form-control mb-3">

<input type="text" name="telefone"
       value="<?= $tecnico['telefone'] ?>"
       class="form-control mb-3">

<input type="email" name="email"
       value="<?= $tecnico['email'] ?>"
       class="form-control mb-3">

<input type="text" name="especialidade"
       value="<?= $tecnico['especialidade'] ?>"
       class="form-control mb-3">

<select name="status" class="form-control mb-3">

<option value="Ativo"
<?= $tecnico['status']=='Ativo'?'selected':'' ?>>
Ativo
</option>

<option value="Inativo"
<?= $tecnico['status']=='Inativo'?'selected':'' ?>>
Inativo
</option>

</select>

<button class="btn btn-success">
Salvar Alteração
</button>

</form>

</div>

<?php require_once('../rodape.php'); ?>