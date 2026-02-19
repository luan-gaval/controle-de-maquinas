<?php
require_once '../config/conexao.php';

$res = mysqli_query($conn, "SELECT * FROM ativacoes ORDER BY nome");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ativações (CNPJ)</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="container" style="margin-top:30px;">

    <h2>Ativações / CNPJ</h2>

    <a href="index.php" class="btn btn-default">← Voltar</a>

    <hr>

    <form method="post" action="salvar_ativacao.php" class="form-inline">

        <input type="text" name="numero_ativacao" class="form-control" placeholder="Nº ativação (6 dígitos)">

        <input type="text" name="nome" class="form-control" placeholder="Nome da ativação" required>

        <input type="text" name="cnpj" class="form-control" placeholder="CNPJ (opcional)">

        <button class="btn btn-success">Cadastrar</button>
    </form>

    <hr>

    <table class="table table-bordered">
        <tr>
            <th>Nº Ativação</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Ações</th>
        </tr>

        <?php while ($a = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?php echo htmlspecialchars($a['numero_ativacao']); ?></td>
            <td><?php echo htmlspecialchars($a['nome']); ?></td>
            <td><?php echo htmlspecialchars($a['cnpj']); ?></td>
            <td>
                <a class="btn btn-xs btn-warning" href="editar_ativacao.php?id=<?php echo $a['id']; ?>">Editar</a>

                <a class="btn btn-xs btn-danger" href="excluir_ativacao.php?id=<?php echo $a['id']; ?>"
                    onclick="return confirm('Excluir ativação?');">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

</body>

</html>