<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SCME - Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    height:100vh;
}

.login-card{
    border:none;
    border-radius:20px;
    box-shadow:0px 10px 30px rgba(0,0,0,0.2);
}

.logo{
    font-size:60px;
}

</style>

</head>
<body>

<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">

        <div class="col-md-5">

            <div class="card login-card">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="logo">🛠️</div>
                        <h2 class="fw-bold">SCME</h2>
                        <p class="text-muted">
                            Sistema de Controle de Manutenção de Equipamentos
                        </p>
                    </div>

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Usuário</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control">
                        </div>

                        <button class="btn btn-primary w-100">
                            Entrar
                        </button>
                        <div class="text-center mt-4">
                        <a href="cadastro.html" class="btn btn-outline-primary w-100">
                        Criar Nova Conta
                            </a>
                            </div>
                    </form>

                </div>

            </div>

            <div class="text-center text-white mt-3">
                © 2026 - Jean Ramos da Silva
            </div>

        </div>

    </div>
</div>

</body>
</html>