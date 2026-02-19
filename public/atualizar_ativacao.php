<?php
require_once '../config/conexao.php';

$id     = $_POST['id'];
$numero = $_POST['numero_ativacao'];
$nome   = $_POST['nome'];
$cnpj   = $_POST['cnpj'];

$stmt = mysqli_prepare($conn,
"UPDATE ativacoes
 SET numero_ativacao=?, nome=?, cnpj=?
 WHERE id=?");

mysqli_stmt_bind_param($stmt, "sssi", $numero, $nome, $cnpj, $id);
mysqli_stmt_execute($stmt);

header("Location: ativacoes.php");
exit;