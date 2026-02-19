<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$sql = "SELECT m.*, a.nome AS ativacao_nome
FROM controle_maquinas m
INNER JOIN ativacoes a ON a.id = m.ativacao_id
ORDER BY m.id DESC";

$result = mysqli_query($conn, $sql);
