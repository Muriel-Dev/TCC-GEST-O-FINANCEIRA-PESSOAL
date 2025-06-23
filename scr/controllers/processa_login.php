<?php

session_start();
require_once '../database/conexao.php';

// Recebendo os dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verificando se os campos foram preenchidos
if (empty($email) || empty($senha)) {
    echo "Preencha todos os campos.";
    exit;
}

// Consulta no banco
$stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {
    // Login bem-sucedido
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    header("Location: ../pages/dashboard.php");
    exit;
} else {
    // Falha no login
    echo "E-mail ou senha inválidos.";
    echo "<br><a href='../pages/login.php'>Voltar</a>";
}
?>