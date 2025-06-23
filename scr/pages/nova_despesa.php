<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Despesa</title>
    <link rel="stylesheet" href="../css/despesa.css">
</head>
<body>

<header>
    <h1>Registrar Nova Despesa</h1>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <form action="../controllers/processa_despesa.php" method="POST">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" required>

            <label for="valor">Valor (R$):</label>
            <input type="number" step="0.01" name="valor" required>

            <label for="data">Data:</label>
            <input type="date" name="data" required>

            <button type="submit">Salvar Despesa</button>
        </form>
    </section>
</main>

<footer>
        <p>&copy; 2025 - Sistema de Gestão Financeira Pessoal | Desenvolvido por Muriel Lima</p>
</footer>

</body>
</html>