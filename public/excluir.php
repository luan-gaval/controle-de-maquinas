<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$id = intval($_GET['id']);

mysqli_query($conn, "DELETE FROM controle_maquinas WHERE id = $id");

header("Location: index.php");
exit;
