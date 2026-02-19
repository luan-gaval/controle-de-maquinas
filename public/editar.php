<?php
require_once '../config/conexao.php';

$id = intval($_GET['id']);

$res = mysqli_query($conn,
"SELECT * FROM controle_maquinas WHERE id = $id");

$maq = mysqli_fetch_assoc($res);
?>

<form method="post" action="atualizar.php">
    <input type="hidden" name="id" value="<?php echo $maq['id']; ?>">

    <input type="text" name="numeroSerie" value="<?php echo htmlspecialchars($maq['numero_serie']); ?>" required>

    <select name="ativacao_id">
        <?php
            $ativacoes = mysqli_query($conn, "SELECT * FROM ativacoes");
            while ($a = mysqli_fetch_assoc($ativacoes)):
            $sel = ($a['id'] == $maq['ativacao_id']) ? "selected" : "";
        ?>
        <option value="<?php echo $a['id']; ?>" <?php echo $sel; ?>>
            <?php echo htmlspecialchars($a['nome']); ?>
        </option>
        <?php endwhile; ?>
    </select>

    <select name="situacao_chip">
        <option <?php if($maq['situacao_chip']=="Ok - 4G Funcionando") echo "selected"; ?>>
            Ok - 4G Funcionando
        </option>
        <option <?php if($maq['situacao_chip']=="NOk - Sem 4G") echo "selected"; ?>>
            NOk - Sem 4G
        </option>
    </select>

    <input type="text" name="destinoMaquina" value="<?php echo htmlspecialchars($maq['destino']); ?>">

    <input type="text" name="descricao" value="<?php echo htmlspecialchars($maq['descricao']); ?>">

    <button>Atualizar</button>
</form>