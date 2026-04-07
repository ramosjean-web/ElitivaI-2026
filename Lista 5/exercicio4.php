<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Itens com Imposto</title>
</head>
<body>

    <h2>Exercício 4</h2>

    <form method="post">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Nome do item $i: <input type='text' name='nome[]' required><br><br>";
            echo "Preço do item $i: <input type='number' name='preco[]' step='0.01' required><br><br>";
        }
        ?>
        <input type="submit" value="Calcular">
    </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomes = $_POST["nome"];
        $precos = $_POST["preco"];
        $mapa = [];
        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $precoFinal = $precos[$i] + ($precos[$i] * 0.15);
            $mapa[$nome] = $precoFinal;
        }       
        asort($mapa);
        echo "<h3>Lista Ordenada pelos Preços com Imposto</h3>";
        foreach ($mapa as $chave => $valor) {
            echo "<p>Item: $chave - Preço final: R$ " 
                . number_format($valor, 2, ',', '.') . "</p>";
        }
    }
    ?>
</body>
</html>