<?php

require_once('../cabecalho.php');
require_once('../conexao.php');

try{

    $stmt = $pdo->prepare(
        "SELECT * FROM equipamentos WHERE id=?"
    );

    $stmt->execute([$_GET['id']]);

    $resultado = $stmt->fetch();

}catch(Exception $e){

    echo "Erro: ".$e->getMessage();

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_GET['id'];

    try{

        $sql = "DELETE FROM equipamentos WHERE id=?";

        $stmt = $pdo->prepare($sql);

        if($stmt->execute([$id])){

            header('Location:equipamentos.php');
            exit;

        }else{

            echo "Erro ao excluir.";

        }

    }catch(Exception $e){

        echo "Erro: ".$e->getMessage();

    }

}
?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card shadow rounded-4 border-0">

                <div class="card-header bg-dark text-white py-3 rounded-top-4">
                    <h5 class="mb-0 px-2">
                        Consultar Equipamento
                    </h5>
                </div>

                <div class="card-body p-4">

                    <form id="formExcluir"
                          method="post"
                          action="consultar_equipamento.php?id=<?= $resultado['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['nome'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Patrimônio</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['quantidade'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Modelo</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['modelo'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['fabricante'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Setor</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['setor'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data Aquisição</label>
                            <input type="date"
                                   class="form-control"
                                   value="<?= $resultado['data_aquisicao'] ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= $resultado['status'] ?>"
                                   readonly>
                        </div>

                        <div class="d-flex gap-2">

                            <a href="alterar_equipamento.php?id=<?= $resultado['id'] ?>"
                               class="btn btn-warning">
                                Alterar
                            </a>

                            <button type="button"
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalExcluir">
                                Excluir
                            </button>

                            <a href="equipamentos.php"
                               class="btn btn-secondary">
                                Voltar
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade"
     id="modalExcluir"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Confirmar Exclusão
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">
                Deseja realmente excluir este equipamento?
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancelar
                </button>

                <button type="button"
                        class="btn btn-danger"
                        onclick="document.getElementById('formExcluir').submit();">
                    Sim, Excluir
                </button>

            </div>

        </div>

    </div>

</div>

<?php
require_once('../rodape.php');
?>