<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 5</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 5</h1>
<form method="post">
<div class="mb-3">
              <label for="mes" class="form-label">Digite o valor do mês de 1 A 12</label>
              <input type="text" id="mes" name="mes" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
    <?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $mes = $_POST['mes'];
    switch($mes)
    { 
    case 1: echo "Janeiro"; return; case 2: echo "Fevereiro"; return; case 3: echo "Março"; return;
    case 4: echo "Abril"; return; case 5: echo "Maio"; return; case 6: echo "Junho"; return;
    case 7: echo "Julho"; return; case 8: echo "Agosto"; return; case 9: echo "Setembro"; return;
    case 10: echo "Outubro"; return; case 11: echo "Novembro"; return; case 12: echo "Dezembro";
    }
} 
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>