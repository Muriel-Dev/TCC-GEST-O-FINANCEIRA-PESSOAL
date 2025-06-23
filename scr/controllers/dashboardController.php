<?php
require_once '../database/conexao.php';

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Obtem mês e ano atual
$mesAtual = date('m');
$anoAtual = date('Y');

// Total de receitas
$sqlReceitas = "SELECT SUM(valor) AS total FROM receitas WHERE usuario_id = :id AND MONTH(data) = :mes AND YEAR(data) = :ano";
$stmtReceita = $db->prepare($sqlReceitas);
$stmtReceita->execute([':id' => $usuario_id, ':mes' => $mesAtual, ':ano' => $anoAtual]);
$totalReceitas = $stmtReceita->fetchColumn() ?: 0;

// Total de despesas
$sqlDespesas = "SELECT SUM(valor) AS total FROM despesas WHERE usuario_id = :id AND MONTH(data) = :mes AND YEAR(data) = :ano";
$stmtDespesa = $db->prepare($sqlDespesas);
$stmtDespesa->execute([':id' => $usuario_id, ':mes' => $mesAtual, ':ano' => $anoAtual]);
$totalDespesas = $stmtDespesa->fetchColumn() ?: 0;

// Saldo
$saldo = $totalReceitas - $totalDespesas;

// Retornar dados
return [
    'total_receitas' => $totalReceitas,
    'total_despesas' => $totalDespesas,
    'saldo' => $saldo,
];