<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

include '../src/listar.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Controle de Máquinas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="container" style="margin-top:30px;">

    <h2>Controle de Máquinas</h2>

    <form method="get" class="form-inline" style="margin-bottom:15px;">
        <input type="text" name="busca" class="form-control" placeholder="Buscar por SN"
            value="<?php echo htmlspecialchars($busca, ENT_QUOTES, 'UTF-8'); ?>">

        <button class="btn btn-primary">Buscar</button>

        <a href="ativacoes.php" class="btn btn-info" style="margin-bottom:15px;">
            Gerenciar Ativações (CNPJ)
        </a>

    </form>

    <form method="post" action="salvar.php" class="form-inline">

        <input type="text" name="numeroSerie" class="form-control" placeholder="Número de Série" required>

        <select name="ativacao_id" class="form-control" required>
            <option value="">Ativação</option>
            <?php $ativacoes = mysqli_query($conn, "SELECT * FROM ativacoes ORDER BY nome"); 
            while ($a = mysqli_fetch_assoc($ativacoes)): ?>
            <option value="<?php echo $a['id']; ?>">
                <?php echo htmlspecialchars($a['nome']); ?>
            </option>
            <?php endwhile; ?>
        </select>

        <select name="situacao_chip" class="form-control" required>
            <option value="">Situação do Chip</option>
            <option>Ok - 4G Funcionando</option>
            <option>NOk - Sem 4G</option>
        </select>

        <input type="text" name="destinoMaquina" class="form-control" placeholder="Destino" required>

        <input type="text" name="descricao" class="form-control" placeholder="Descrição">

        <button class="btn btn-success">Salvar</button>
    </form>

    <hr>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SN</th>
                <th>Ativação</th>
                <th>Situação</th>
                <th>Destino</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars(isset($row['numero_serie']) ? $row['numero_serie'] : ''); ?></td>
                <td><?php echo htmlspecialchars(isset($row['ativacao_nome']) ? $row['ativacao_nome'] : ''); ?></td>
                <td><?php echo htmlspecialchars(isset($row['situacao_chip']) ? $row['situacao_chip'] : ''); ?></td>
                <td><?php echo htmlspecialchars(isset($row['destino']) ? $row['destino'] : ''); ?></td>
                <td><?php echo htmlspecialchars(isset($row['descricao']) ? $row['descricao'] : ''); ?></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>

                    <a class="btn btn-xs btn-danger" href="excluir.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Excluir?');">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>