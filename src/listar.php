<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/conexao.php';

$result = $conn->query("SELECT * FROM controle_maquinas ORDER BY id DESC");
