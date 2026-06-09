<?php
require_once('../conexao.php');
require_once('../cabecalho.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>window.location='listar_tecnico.php';</script>";
    exit;
}

$sql = "SELECT * FROM tecnicos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$tecnico = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tecnico) {
    echo "<script>
        alert('Técnico não encontrado.');
        window.location='listar_tecnico.php';
    </script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "SELECT COUNT(*) FROM manutencoes WHERE tecnico_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $total = $stmt->fetchColumn();

    if ($total > 0) {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Não foi possível excluir!',
                text: 'Este técnico possui manutenções cadastradas.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location='listar_tecnico.php';
            });
        </script>";
        exit;
    }

    $sql = "DELETE FROM tecnicos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Excluído!',
            text: 'Técnico excluído com sucesso.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location='listar_tecnico.php';
        });
    </script>";
    exit;
}
?>

<div class="container mt-4">

    <h2 class="text-danger">Excluir Técnico</h2>

    <div class="alert alert-warning">
        Deseja realmente excluir este técnico?
    </div>

    <p><strong>Nome:</strong> <?= $tecnico['nome'] ?></p>

    <form method="POST" id="formExcluir">

        <button type="button"
                class="btn btn-danger"
                onclick="confirmarExclusao()">
            Excluir
        </button>

        <a href="listar_tecnico.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

<script>
function confirmarExclusao(){

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

        if(result.isConfirmed){
            document.getElementById('formExcluir').submit();
        }

    });

}
</script>

<?php require_once('../rodape.php'); ?>