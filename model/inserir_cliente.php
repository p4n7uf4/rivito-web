<?php

require_once "connection.php";

// Coleta as informações do form
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$rua = isset($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;

$endereco = $rua . ", " . $numero . ". " . $bairro . " / " . $cidade;

// Verifica se todos os campos estão preenchidos

if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($telefone) || empty($rua)|| empty($numero)|| empty($bairro)|| empty($cidade)) {
    echo "É preciso preencher todos os campos do formulário!";
    exit;
}

// Insere as informações no banco de dados
$PDO = startConnection();
$sql = "INSERT INTO 
    clientes(nome_cliente, sobrenome_cliente, cpf, telefone, endereco)
    VALUES(:nome, :sobrenome, :cpf, :telefone, :endereco)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":sobrenome", $sobrenome);
$stmt->bindParam(":cpf", $cpf);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":endereco", $endereco);

if ($stmt->execute()) {
    header("Location: ../index.php");
} else {
    echo "Ocorreu um erro na inclusão do registro.";
    print_r($stmt->errorInfo());
}