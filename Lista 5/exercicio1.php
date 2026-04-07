<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mapa de Contatos</title>
</head>
<body>

    <h2>Exercício 1</h2>

    <form method="post">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Nome $i: <input type='text' name='nome[]' required><br><br>";
            echo "Telefone $i: <input type='text' name='telefone[]' required><br><br>";
        }
        ?>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomes = $_POST["nome"];
        $telefones = $_POST["telefone"];

        $mapa = [];

        for ($i = 0; $i < 5; $i++) {
            $nome = trim($nomes[$i]);
            $telefone = trim($telefones[$i]);
           
            if (isset($mapa[$nome])) {
                echo "<p>Nome duplicado: $nome</p>";
                continue;
            }
            
            if (in_array($telefone, $mapa)) {
                echo "<p>Telefone duplicado: $telefone</p>";
                continue;
            }
           
            $mapa[$nome] = $telefone;
        }
        
        ksort($mapa);
        echo "<h3>Lista Ordenada</h3>";
        foreach ($mapa as $chave => $valor) {
            echo "<p>Telefone de $chave: $valor</p>";
        }
    }
    ?>

</body>
</html>