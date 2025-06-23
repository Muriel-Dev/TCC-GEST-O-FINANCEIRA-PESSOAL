<?php
// processa_cadastro.php - Processa os dados enviados pelo formulário de cadastro

require_once '../database/conexao.php';

// Recebe os dados do formulário
$nome  = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Validação básica
if (empty($nome) || empty($email) || empty($senha)) {
    echo "Por favor, preencha todos os campos.";
    echo "<br><a href='../pages/cadastro.php'>Voltar</a>";
    exit;
}

// Verifica se o e-mail já existe
$stmt = $db->prepare("SELECT id FROM usuarios WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->fetch()) {
    echo "E-mail já cadastrado. Tente outro.";
    echo "<br><a href='../pages/cadastro.php'>Voltar</a>";
    exit;
}

// Criptografa a senha
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

// Insere no banco de dados
$stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha_criptografada);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
    echo "<br><a href='../pages/login.php'>Ir para o login</a>";
} else {
    echo "Erro ao cadastrar. Tente novamente.";
    echo "<br><a href='../pages/cadastro.php'>Voltar</a>";
}
?>