<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mapa de Médias</title>
</head>
<body>

    <h2>Exercicio 2</h2>

    <form method="post">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Nome do aluno $i: <input type='text' name='nome[]' required><br><br>";
            echo "Nota 1: <input type='number' name='nota1[]' step='0.1' required><br><br>";
            echo "Nota 2: <input type='number' name='nota2[]' step='0.1' required><br><br>";
            echo "Nota 3: <input type='number' name='nota3[]' step='0.1' required><br><br>";
        }
        ?>
        <input type="submit" value="Calcular Médias">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomes = $_POST["nome"];
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];

        $mapa = [];

        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;

            $mapa[$nome] = $media;
        }

         arsort($mapa);

        echo "<h3>Lista de Médias (Maior para Menor)</h3>";

        foreach ($mapa as $chave => $valor) {
            echo "<p>Aluno: $chave - Média: " . number_format($valor, 2) . "</p>";
        }
    }
    ?>

</body>
</html>