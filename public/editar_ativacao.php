<?php
require_once '../config/conexao.php';

$id = intval($_GET['id']);

$res = mysqli_query($conn,
"SELECT * FROM ativacoes WHERE id = $id");

$a = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Ativação</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="container" style="margin-top:30px;">

    <h2>Editar Ativação</h2>

    <form method="post" action="atualizar_ativacao.php">

        <input type="hidden" name="id" value="<?php echo $a['id']; ?>">

        <input type="text" name="numero_ativacao" class="form-control"
            value="<?php echo htmlspecialchars($a['numero_ativacao']); ?>">

        <br><br>

        <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($a['nome']); ?>"
            required>

        <br><br>

        <input type="text" name="cnpj" class="form-control" value="<?php echo htmlspecialchars($a['cnpj']); ?>">

        <br>

        <button class="btn btn-primary">Atualizar</button>
        <a href="ativacoes.php" class="btn btn-default">Cancelar</a>

    </form>

</body>

</html>