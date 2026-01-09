<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$id = (int) $_GET['id'];

$stmt = $conn->prepare(
  "DELETE FROM controle_maquinas WHERE id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
