<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Gestão Financeira</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!-- Cabeçalho -->
   <header>
        <div class="header-container">
            <div class="branding">
                <h1 class="logo-title">Login no Sistema</h1>
                <p class="logo-subtitle">Controle suas finanças com facilidade</p>
            </div>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="cadastro.php">Cadastro</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Formulário de Login -->
    <main>
        <section>
            <h2>Digite suas credenciais</h2>
            <form action="../controllers/processa_login.php" method="POST">
                <label for="email">E-mail:</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" required><br><br>

                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2025 - Sistema de Gestão Financeira Pessoal | Desenvolvido por Muriel Lima</p>
    </footer>

</body>
</html>