<?php
require_once('../cabecalho.php');
require_once('../conexao.php');
?>

<div class="container mt-4">

    <h2 class="mb-4">
        <i class="bi bi-wrench-adjustable"></i>
        Gerenciamento de Serviços
    </h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <i class="bi bi-plus-circle fs-1 text-success"></i>
                    <h5 class="mt-3">Adicionar</h5>

                    <a href="novo_servico.php" class="btn btn-success">
                        Novo Serviço
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <i class="bi bi-search fs-1 text-primary"></i>
                    <h5 class="mt-3">Consultar</h5>

                    <a href="listar_servico.php" class="btn btn-primary">
                        Consultar
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="/principal.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Voltar
        </a>
    </div>

</div>

<?php require_once('../rodape.php'); ?>