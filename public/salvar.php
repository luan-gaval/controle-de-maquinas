<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$numero_serie = isset($_POST['numero_serie']) ? $_POST['numero_serie'] : '';
$ativacao_id = isset($_POST['ativacao_id']) ? intval($_POST['ativacao_id']) : 0;
$situacao_chip = isset($_POST['situacao_chip']) ? $_POST['situacao_chip'] : '';
$destino = isset($_POST['destino']) ? $_POST['destino'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';

$sql = "INSERT INTO controle_maquinas (numero_serie, ativacao_id, situacao_chip, destino, descricao) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sisss",
    $numero_serie,
    $ativacao_id,
    $situacao_chip,
    $destino,
    $descricao
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;