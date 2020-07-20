<?php
require_once "../model/connection.php";

$PDO = startConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rivito Móveis - Clientes</title>
</head>

<body>
    <h1>Lista de clientes cadastrados</h1>
    <?php
    $stmt_count = $PDO->prepare("SELECT COUNT(*) AS total FROM clientes");
    $stmt_count->execute();
    $stmt = $PDO->prepare("SELECT id_cliente, nome_cliente, sobrenome_cliente, cpf, telefone, endereco FROM clientes ORDER BY nome_cliente");
    $stmt->execute();
    $total = $stmt_count->fetchColumn();
    if ($total > 0) :
    ?>
        <table border=3>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td>
                            <?php echo $resultado['id_cliente'] ?>
                        </td>
                        <td><?php echo $resultado['nome_cliente'] ?></td>
                        <td><?php echo $resultado['sobrenome_cliente'] ?></td>
                        <td><?php echo $resultado['cpf'] ?></td>
                        <td><?php echo $resultado['telefone'] ?></td>
                        <td><?php echo $resultado['endereco'] ?></td>
                        <td>
                            <a href="alterar_cliente.php?id_cliente=<?php echo $resultado['id_cliente'] ?>">Atualizar</a>
                            <a href="excluir_cliente.php?id_cliente<?php echo $resultado['id_cliente'] ?>" onclick="return confirm('Tem certeza que deseja excluir esse cliente? (Esta ação não poderá ser desfeita)');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p>Total de clientes cadastrados: <?php echo $total ?></p>
    <?php else : ?>
        <p>Não há clientes cadastrados</p>
    <?php endif; ?>
    <p><a href="../index.php">Voltar para o inicio</a>
    </p>
</body>

</html>