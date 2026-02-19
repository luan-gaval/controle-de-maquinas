<?php
require_once '../config/conexao.php';

$id = intval($_GET['id']);

mysqli_query($conn, "DELETE FROM ativacoes WHERE id = $id");

header("Location: ativacoes.php");
exit;