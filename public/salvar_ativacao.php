<?php
require_once '../config/conexao.php';

$numero = $_POST['numero_ativacao'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];

$stmt = mysqli_prepare($conn, "INSERT INTO ativacoes (numero_ativacao, nome, cnpj) VALUES (?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sss", $numero, $nome, $cnpj);
mysqli_stmt_execute($stmt);

header("Location: ativacoes.php");
exit;