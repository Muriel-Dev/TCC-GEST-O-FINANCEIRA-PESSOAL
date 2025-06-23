<?php
session_start();
require_once '../database/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

$id = $_SESSION['usuario_id'];

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

$stmt = $db->prepare("INSERT INTO despesas (usuario_id, descricao, valor, data) VALUES (?, ?, ?, ?)");
$stmt->execute([$id, $descricao, $valor, $data]);

header("Location: ../pages/dashboard.php");
exit;