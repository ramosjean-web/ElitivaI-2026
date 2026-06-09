<?php
session_start();

if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false) {
    header('Location: /index.php');
    exit;
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SCME - Sistema de Controle de Manutenção</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-scme shadow">
        <div class="container">

            <a class="navbar-brand" href="/principal.php">
                <i class="bi bi-tools"></i>
                SCME
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Alternar navegação">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/principal.php">
                            <i class="bi bi-house-door"></i>
                            Início
                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="cadastrosDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-clipboard-data"></i>
                            Cadastros
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="cadastrosDropdown">

                            <li>
                                <a class="dropdown-item" href="/Equipamentos/equipamentos.php">
                                    <i class="bi bi-cpu"></i>
                                    Cadastrar Equipamento
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/Tecnico/tecnico.php">
                                    <i class="bi bi-person-gear"></i>
                                    Novo Técnico
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/Servico/servico.php">
                                    <i class="bi bi-wrench-adjustable"></i>
                                    Novo Serviço
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="manutencaoDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-tools"></i>
                            Manutenções
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="manutencaoDropdown">

                            <li>
                                <a class="dropdown-item" href="/Manutencao/nova_manutencao.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Nova Manutenção
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/Manutencao/manutencoes.php">
                                    <i class="bi bi-list-check"></i>
                                    Consultar Manutenções
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            id="relatoriosDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <i class="bi bi-file-earmark-bar-graph"></i>
                            Relatórios
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="relatoriosDropdown">

                            <li>
                                <a class="dropdown-item" href="/Relatorios/relatorio_equipamentos.php">
                                    <i class="bi bi-cpu"></i>
                                    Relatório de Equipamentos
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/Relatorios/relatorio_tecnicos.php">
                                    <i class="bi bi-person-gear"></i>
                                    Relatório de Técnicos
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/Relatorios/relatorio_manutencoes.php">
                                    <i class="bi bi-tools"></i>
                                    Relatório de Manutenções
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            Sair
                        </a>
                    </li>

                </ul>

            </div>
            
        </div>
    </nav>

    <div class="container-fluid p-0">