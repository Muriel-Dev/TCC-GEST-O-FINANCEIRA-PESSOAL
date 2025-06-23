<?php
require_once '../controllers/dashboardController.php';

$dadosFinanceiros = [
    'total_receitas' => number_format($totalReceitas, 2, ',', '.'),
    'total_despesas' => number_format($totalDespesas, 2, ',', '.'),
    'saldo' => number_format($saldo, 2, ',', '.'),
];

$corSaldo = $saldo >= 0 ? '#10B981' : '#EF4444';
?>

<<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestão Financeira</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-section">
                <h1><i class="fas fa-chart-line"></i> Painel Financeiro</h1>
                <span class="user-greeting">Bem-vindo, <strong>Nome do Usuário</strong></span>
            </div>
            <nav>
                <ul>
                    <li><a href="nova_receita.php" class="btn-receita">
                        <i class="fas fa-plus-circle"></i> Nova Receita
                    </a></li>
                    <li><a href="nova_despesa.php" class="btn-despesa">
                        <i class="fas fa-minus-circle"></i> Nova Despesa
                    </a></li>
                    <li><a href="relatorio.php" class="btn-relatorio">
                        <i class="fas fa-file-alt"></i> Relatório
                    </a></li>
                    <li><a href="logout.php" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <div class="container">
                <span><i class="fas fa-home"></i> Dashboard</span>
                <span class="current-period">Junho 2025</span>
            </div>
        </div>

        <!-- Resumo Financeiro -->
        <section class="dashboard-summary">
            <div class="container">
                <div class="section-header">
                    <h2><i class="fas fa-chart-pie"></i> Resumo Financeiro</h2>
                    <div class="period-selector">
                        <select>
                            <option value="06/2025">Junho 2025</option>
                            <option value="05/2025">Maio 2025</option>
                            <option value="04/2025">Abril 2025</option>
                        </select>
                    </div>
                </div>

                <div class="cards-grid">
                    <div class="financial-card receitas">
                        <div class="card-icon">
                            <i class="fas fa-arrow-trend-up"></i>
                        </div>
                        <div class="card-content">
                            <h3>Total de Receitas</h3>
                            <p class="card-value positive">R$ 5.420,00</p>
                            <span class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +12% vs mês anterior
                            </span>
                        </div>
                        <div class="card-progress">
                            <div class="progress-bar receitas-progress"></div>
                        </div>
                    </div>

                    <div class="financial-card despesas">
                        <div class="card-icon">
                            <i class="fas fa-arrow-trend-down"></i>
                        </div>
                        <div class="card-content">
                            <h3>Total de Despesas</h3>
                            <p class="card-value negative">R$ 3.280,50</p>
                            <span class="card-change negative">
                                <i class="fas fa-arrow-up"></i> +8% vs mês anterior
                            </span>
                        </div>
                        <div class="card-progress">
                            <div class="progress-bar despesas-progress"></div>
                        </div>
                    </div>

                    <div class="financial-card saldo">
                        <div class="card-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="card-content">
                            <h3>Saldo do Mês</h3>
                            <p class="card-value positive">R$ 2.139,50</p>
                            <span class="card-change positive">
                                <i class="fas fa-arrow-up"></i> +15% vs mês anterior
                            </span>
                        </div>
                        <div class="card-progress">
                            <div class="progress-bar saldo-progress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <!-- Resumo Visual -->
        <section class="visual-summary">
            <div class="container">
                <div class="summary-grid">
                    <div class="summary-item">
                        <h3>Meta do Mês</h3>
                        <div class="goal-progress">
                            <div class="goal-bar">
                                <div class="goal-fill" style="width: 78%"></div>
                            </div>
                            <span>78% alcançado</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <h3>Maior Receita</h3>
                        <p class="highlight-value positive">R$ 2.500,00</p>
                        <span class="detail">Salário - 01/06</span>
                    </div>
                    <div class="summary-item">
                        <h3>Maior Despesa</h3>
                        <p class="highlight-value negative">R$ 890,00</p>
                        <span class="detail">Aluguel - 05/06</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

   <footer>
    <div class="container">
        <p>&copy; 2025 - Sistema de Gestão Financeira Pessoal | Desenvolvido por Muriel Lima</p>
    </div>
    </footer>

</body>
</html>