<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$numero_serie = $_POST['numeroSerie'];
$ativacao = $_POST['ativacaoMaquina'];
$situacao_chip = $_POST['situacaoChip'];
$destino = $_POST['destinoMaquina'];

$sql = "INSERT INTO controle_maquinas 
(numero_serie, ativacao, situacao_chip, destino)
VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
  "ssss",
  $numero_serie,
  $ativacao,
  $situacao_chip,
  $destino
);

$stmt->execute();

header("Location: index.php");
