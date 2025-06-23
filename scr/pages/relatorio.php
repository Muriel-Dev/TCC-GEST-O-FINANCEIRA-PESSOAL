<?php
session_start();
require_once '../database/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['usuario_id'];
$nome = $_SESSION['usuario_nome'];

$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$ano = isset($_GET['ano']) ? $_GET['ano'] : date('Y');

$sqlReceitas = "SELECT * FROM receitas WHERE usuario_id = :id AND MONTH(data) = :mes AND YEAR(data) = :ano ORDER BY data DESC";
$receitas = $db->prepare($sqlReceitas);
$receitas->execute([':id' => $id, ':mes' => $mes, ':ano' => $ano]);

$sqlDespesas = "SELECT * FROM despesas WHERE usuario_id = :id AND MONTH(data) = :mes AND YEAR(data) = :ano ORDER BY data DESC";
$despesas = $db->prepare($sqlDespesas);
$despesas->execute([':id' => $id, ':mes' => $mes, ':ano' => $ano]);

$anosDisponiveis = $db->query("SELECT DISTINCT YEAR(data) as ano FROM (
    SELECT data FROM receitas WHERE usuario_id = $id
    UNION
    SELECT data FROM despesas WHERE usuario_id = $id
) as todas_datas ORDER BY ano DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório Financeiro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/relatorio.css">
</head>
<body>
<div class="container">
    <header class="header">
        <div class="header-content">
            <h1>Relatório Financeiro</h1>
            <p class="subtitle">Acompanhe suas receitas e despesas mensalmente</p>
            <div class="nav-buttons">
                <a href="dashboard.php" class="btn-nav">Dashboard</a>
                <a href="logout.php" class="btn-nav logout">Sair</a>
            </div>
        </div>
    </header>

    <main class="content">
        <section class="resumo">
            <div class="resumo-blocos">
                <div class="bloco bloco-receita">
                    <h2>Receitas</h2>
                    <ul>
                        <?php while ($r = $receitas->fetch(PDO::FETCH_ASSOC)) : ?>
                            <li>
                                <strong><?php echo date('d/m/Y', strtotime($r['data'])); ?></strong> - 
                                <?php echo htmlspecialchars($r['descricao']); ?> - 
                                <span class="valor">R$ <?php echo number_format($r['valor'], 2, ',', '.'); ?></span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>

                <div class="bloco bloco-despesa">
                    <h2>Despesas</h2>
                    <ul>
                        <?php while ($d = $despesas->fetch(PDO::FETCH_ASSOC)) : ?>
                            <li>
                                <strong><?php echo date('d/m/Y', strtotime($d['data'])); ?></strong> - 
                                <?php echo htmlspecialchars($d['descricao']); ?> - 
                                <span class="valor">R$ <?php echo number_format($d['valor'], 2, ',', '.'); ?></span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2025 - Sistema de Gestão Financeira Pessoal | Desenvolvido por Muriel Lima</p>
    </footer>
</div>
</body>
</html>