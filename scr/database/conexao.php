<?php
// conexao.php - Conexão com o banco de dados MySQL (XAMPP)

$host = 'localhost';
$dbname = 'gestao_financeira';
$usuario = 'root';
$senha = '';
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit;
}
?>