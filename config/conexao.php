<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "controle_de_maquinas";

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

mysqli_query($conn, "SET NAMES 'utf8'");
