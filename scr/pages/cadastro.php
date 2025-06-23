<?php
// cadastro.php - Tela de cadastro de novos usuários
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Gestão Financeira</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    
<!-- Cabeçalho -->
<header>
    <div class="header-container">
        <div>
            <h1>Gestão Financeira</h1>
            <div class="logo-subtitle">Sistema de Controle Pessoal</div>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="login.php">Entrar</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Formulário de Cadastro -->
<main>
    <div class="form-container">
        <div class="form-header">
            <h2>Criar Conta</h2>
            <p class="form-subtitle">Preencha os dados para começar</p>
        </div>

        <form action="../controllers/processa_cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" 
                        id="nome" 
                        name="nome" 
                        required 
                        minlength="2"
                        maxlength="100"
                        placeholder="Digite seu nome completo">
                <div class="field-hint">Digite seu nome completo</div>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" 
                        id="email" 
                        name="email" 
                        required 
                        maxlength="150"
                        placeholder="seu@email.com">
                <div class="field-hint">Digite um endereço de e-mail válido</div>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" 
                        id="senha" 
                        name="senha" 
                        required 
                        minlength="6"
                        maxlength="50"
                        placeholder="Mínimo 6 caracteres">
                <div class="field-hint">Use no mínimo 6 caracteres para maior segurança</div>
            </div>

            <button type="submit" class="btn-primary">Criar Conta</button>
        </form>

        <div class="form-links">
            <p>Já possui uma conta? <a href="login.php">Fazer login</a></p>
        </div>
    </div>
</main>

<!-- Rodapé -->
<footer>
        <p>&copy; 2025 - Sistema de Gestão Financeira Pessoal | Desenvolvido por Muriel Lima</p>
</footer>
</body>
</html>