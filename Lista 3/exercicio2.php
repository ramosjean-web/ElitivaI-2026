<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exercício 1</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
    <body> 
    <div class="container py-3">
        <h1>Exercício 2</h1>
        <form method="post">
            <?php
            for($i=0;$i<2;$i++)
                echo '<div class="mb-3">
                    <label for="valor'.$i.'" class="form-label">Informe a valor de entrada</label>
                    <input type="text" id="valor'.$i.'" name="valor[]" class="form-control" required="">
                </div>';
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $mapa = $_POST['valor'];
                $copia_mapa = $mapa;
                $a = $copia_mapa[0];
                $b = $copia_mapa[1];
                $copia_mapa = $mapa;
                $soma = $a + $b;
                $soma3 = ($a+$b) *3

                if($a == $b){
                    echo "<p> Os valores são iguais, retornando o Triplo: $soma3 </p>"
                } 
                else{
                    echo "<p> o valor da soma é: $soma .</p>"
                }
                echo "<p>Na posição $posicao </p>";
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>