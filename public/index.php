<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../src/listar.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Controle de Máquinas</title>
  <link rel="stylesheet" href="../arq/styles.css">
</head>

<body>

  <form method="post" action="salvar.php">
    <input type="text" id="numeroSerie" name="numeroSerie" placeholder="Digite o SN" required>

    <select id="ativacaoMaquina" name="ativacaoMaquina" required>
      <option value="" disabled selected>Ativada em qual CNPJ?</option>
      <option>Vale das Gerais</option>
      <option>Divipay Payments</option>
      <option>Divipay Finance</option>
      <option>Pay+</option>
      <option>Minazil</option>
      <option>G+ Entretenimento 1</option>
      <option>G+ Entretenimento 2</option>
    </select>

    <select id="situacaoChip" name="situacaoChip" required>
      <option value="" disabled selected>Selecione a situação</option>
      <option>Ok - 4G Funcionando</option>
      <option>NOk - Sem 4G</option>
    </select>

    <input type="text" id="destinoMaquina" name="destinoMaquina" placeholder="Cliente" required>

    <button type="submit">Salvar</button>
  </form>

  <table class="tabela-controle">
    <thead>
      <tr>
        <th>Nº Série</th>
        <th>Ativação</th>
        <th>Situação</th>
        <th>Destino</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['numero_serie']??'') ?></td>
          <td><?= htmlspecialchars($row['ativacao']??'') ?></td>
          <td><?= htmlspecialchars($row['situacao_chip']??'') ?></td>
          <td><?= htmlspecialchars($row['destino']??'') ?></td>
          <td><a class="btn-excluir" href="excluir.php?id=<?= $row['id'] ?>">Excluir</a></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

</body>

</html>
