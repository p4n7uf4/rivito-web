<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rivito Móveis - Cadastro Cliente</title>
</head>

<body>
    <h1>Cadastro de cliente</h1>
    <form action="../model/inserir_cliente.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">
        <br>
        <br>
        <h3>Endereço:</h3>
        <label for="rua">Rua/Avenida:</label>
        <input type="text" name="rua" id="rua">
        <label for="numero">Numero:</label>
        <input type="text" name="numero" id="numero" size="4">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade">
        <br>
        <br>
        <input type="submit" value="Envia">
        <input type="reset" value="Reset">
    </form>
</body>

</html>