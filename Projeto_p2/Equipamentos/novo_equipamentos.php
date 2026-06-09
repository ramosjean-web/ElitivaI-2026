<?php
require_once('../cabecalho.php');
?>

<div class="container mt-4">

    <h2>Novo Equipamento</h2>

    <form action="inserir_equipamento.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Patrimônio</label>
            <input type="text" name="patrimonio" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Fabricante</label>
            <input type="text" name="fabricante" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Setor</label>
            <input type="text" name="setor" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Aquisição</label>
            <input type="date" name="data_aquisicao" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option value="Operacional">
                    Operacional
                </option>

                <option value="Em Manutenção">
                    Em Manutenção
                </option>

                <option value="Inativo">
                    Inativo
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i>
            Salvar
        </button>

        <a href="equipamentos.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Voltar
        </a>

    </form>



<?php
require_once('../rodape.php');
?>