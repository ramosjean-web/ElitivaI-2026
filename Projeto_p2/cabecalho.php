<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCME - Sistema de Controle de Manutenção</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            padding-top: 80px;
            background-color: #f8f9fa;
        }

        .card-dashboard{
            transition: .3s;
        }

        .card-dashboard:hover{
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">

    <a class="navbar-brand" href="principal.php">
      SCME
    </a>

    <button class="navbar-toggler" type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" href="principal.php">
            Início
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
             href="#"
             id="cadastros"
             role="button"
             data-bs-toggle="dropdown">
            Cadastros
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="equipamentos.php">Equipamentos</a></li>
            <li><a class="dropdown-item" href="tecnicos.php">Técnicos</a></li>
            <li><a class="dropdown-item" href="servicos.php">Serviços</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
             href="#"
             id="manutencoes"
             role="button"
             data-bs-toggle="dropdown">
            Manutenções
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="manutencao_nova.php">Nova Manutenção</a></li>
            <li><a class="dropdown-item" href="manutencoes.php">Consultar Manutenções</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
             href="#"
             id="relatorios"
             role="button"
             data-bs-toggle="dropdown">
            Relatórios
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="rel_equipamentos.php">Equipamentos</a></li>
            <li><a class="dropdown-item" href="rel_tecnicos.php">Técnicos</a></li>
            <li><a class="dropdown-item" href="rel_manutencoes.php">Manutenções</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            Sair
          </a>
        </li>

      </ul>

    </div>
  </div>
</nav>

<div class="container">

    <div class="row mb-4">
        <div class="col">
            <h1>Bem-vindo ao SCME</h1>
            <p class="text-muted">
                Sistema de Controle de Manutenção de Equipamentos
            </p>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow card-dashboard">
                <div class="card-body text-center">
                    <h2>35</h2>
                    <p>Equipamentos</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow card-dashboard">
                <div class="card-body text-center">
                    <h2>8</h2>
                    <p>Técnicos</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow card-dashboard">
                <div class="card-body text-center">
                    <h2>12</h2>
                    <p>Serviços</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow card-dashboard">
                <div class="card-body text-center">
                    <h2>18</h2>
                    <p>Manutenções</p>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
