<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SCME - Cadastro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    height:100vh;
}

.cadastro-card{
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

            <div class="card cadastro-card">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="logo">🛠️</div>
                        <h2 class="fw-bold">SCME</h2>
                        <p class="text-muted">
                            Cadastro de Usuário
                        </p>
                    </div>

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" placeholder="Digite seu nome">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" placeholder="Digite seu e-mail">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-control" placeholder="Crie uma senha">
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Cadastrar
                        </button>

                        <div class="text-center mt-3">
                            Já possui uma conta?
                            <a href="index.php" class="text-decoration-none fw-bold">
                                Fazer Login
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