<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Senha Aleatória</title>
</head>
<body>

<form method="post">    
    <div class="mb-3">
    <label for="valor" class="form-label">Click a baixo para gerar uma senha</label>
    <br><button type="submit">Gerar Senha</button>
</div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $mapa = "";

    for ($i = 0; $i < 8; $i++) {
        $posicao = rand(0, strlen($caracteres) - 1);
        $mapa .= $caracteres[$posicao];
    }

    echo "<br> Senha gerada: " . $mapa;
}
?>

</body>
</html>