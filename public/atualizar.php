<?php
require_once '../config/conexao.php';

$id = $_POST['id'];
$numero = $_POST['numeroSerie'];
$ativacao = $_POST['ativacao_id'];
$situacao_chip = $_POST['situacao_chip'];
$destino = $_POST['destinoMaquina'];
$descricao = $_POST['descricao'];

$sql = "UPDATE controle_maquinas SET
numero_serie=?, ativacao_id=?, situacao_chip=?,
destino=?, descricao=? WHERE id=?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sisssi",
$numero, $ativacao, $situacao_chip, $destino, $descricao, $id);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
