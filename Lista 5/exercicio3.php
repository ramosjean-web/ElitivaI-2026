<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>

    <h2>Cadastro de 5 Produtos</h2>

    <form method="post">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Código: <input type='text' name='codigo[]' required><br><br>";
            echo "Nome: <input type='text' name='nome[]' required><br><br>";
            echo "Preço: <input type='number' name='preco[]' step='0.01' required><br><br><hr>";
        }
        ?>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigos = $_POST["codigo"];
        $nomes = $_POST["nome"];
        $precos = $_POST["preco"];

        $mapa = [];

        for ($i = 0; $i < 5; $i++) {
            $codigo = trim($codigos[$i]);
            $nome = trim($nomes[$i]);
            $preco = $precos[$i];

            // desconto de 10% se maior que 100
            if ($preco > 100) {
                $preco = $preco - ($preco * 0.10);
            }

            $mapa[$codigo] = [
                "nome" => $nome,
                "preco" => $preco
            ];
        }

        // ordenar pelo nome do produto
        uasort($mapa, function($a, $b) {
            return strcmp($a["nome"], $b["nome"]);
        });

        echo "<h3>Lista Ordenada por Nome</h3>";

        foreach ($mapa as $codigo => $produto) {
            echo "<p>Código: $codigo - Nome: {$produto['nome']} - Preço: R$ " 
                . number_format($produto['preco'], 2, ',', '.') . "</p>";
        }
    }
    ?>

</body>
</html>