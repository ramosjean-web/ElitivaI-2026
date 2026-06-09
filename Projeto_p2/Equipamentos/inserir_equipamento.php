<?php

require_once('../conexao.php');

$stmt = $pdo->prepare("
INSERT INTO equipamentos
(
nome,
quantidade,
modelo,
fabricante,
setor,
data_aquisicao,
status
)
VALUES
(
?,?,?,?,?,?,?
)
");

$stmt->execute([
$_POST['nome'],
$_POST['quantidade'],
$_POST['modelo'],
$_POST['fabricante'],
$_POST['setor'],
$_POST['data_aquisicao'],
$_POST['status']
]);

header("Location:equipamentos.php");
exit;