<?php
session_start();

if(!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false){
    header('Location: index.php');
    exit();
}

require_once('conexao.php');

/* CADASTRAR */

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $patrimonio = $_POST['patrimonio'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("
        INSERT INTO equipamentos
        (nome, patrimonio, status)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $nome,
        $patrimonio,
        $status
    ]);
}

/* EXCLUIR */

if(isset($_GET['excluir'])){

    $id = $_GET['excluir'];

    $stmt = $pdo->prepare("
        DELETE FROM equipamentos
        WHERE id = ?
    ");

    $stmt->execute([$id]);
}

/* EDITAR */

if(isset($_POST['editar'])){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $patrimonio = $_POST['patrimonio'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("
        UPDATE equipamentos
        SET nome=?, patrimonio=?, status=?
        WHERE id=?
    ");

    $stmt->execute([
        $nome,
        $patrimonio,
        $status,
        $id
    ]);
}
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="UTF-8">

<title>Equipamentos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

```
<h2 class="mb-4">
    Cadastro de Equipamentos
</h2>

<?php

$editando = false;

if(isset($_GET['editar'])){

    $editando = true;

    $stmt = $pdo->prepare("
        SELECT * FROM equipamentos
        WHERE id=?
    ");

    $stmt->execute([
        $_GET['editar']
    ]);

    $equipamento = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<form method="POST">

    <input type="hidden"
           name="id"
           value="<?= $equipamento['id'] ?? '' ?>">

    <div class="row">

        <div class="col-md-4">

            <label>Nome</label>

            <input type="text"
                   name="nome"
                   class="form-control"
                   required
                   value="<?= $equipamento['nome'] ?? '' ?>">

        </div>

        <div class="col-md-4">

            <label>Patrimônio</label>

            <input type="text"
                   name="patrimonio"
                   class="form-control"
                   required
                   value="<?= $equipamento['patrimonio'] ?? '' ?>">

        </div>

        <div class="col-md-4">

            <label>Status</label>

            <select name="status"
                    class="form-select">

                <option>Ativo</option>
                <option>Em Manutenção</option>
                <option>Inativo</option>

            </select>

        </div>

    </div>

    <br>

    <?php if($editando){ ?>

        <button class="btn btn-warning"
                name="editar">

            Atualizar

        </button>

    <?php } else { ?>

        <button class="btn btn-success"
                name="cadastrar">

            Cadastrar

        </button>

    <?php } ?>

    <a href="principal.php"
       class="btn btn-secondary">

       Voltar

    </a>

</form>

<hr>

<h3>Equipamentos Cadastrados</h3>

<table class="table table-bordered table-striped">

    <thead>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Patrimônio</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    </thead>

    <tbody>

    <?php

    $stmt = $pdo->query("
        SELECT * FROM equipamentos
        ORDER BY id DESC
    ");

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>

    <tr>

        <td><?= $linha['id'] ?></td>
        <td><?= $linha['nome'] ?></td>
        <td><?= $linha['patrimonio'] ?></td>
        <td><?= $linha['status'] ?></td>

        <td>

            <a href="?editar=<?= $linha['id'] ?>"
               class="btn btn-primary btn-sm">

                Editar

            </a>

            <a href="?excluir=<?= $linha['id'] ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Deseja excluir?')">

                Excluir

            </a>

        </td>

    </tr>

    <?php } ?>

    </tbody>

</table>
```

</div>

</body>
</html>
