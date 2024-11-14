<?php
$host = 'localhost';
$dbname = 'Blog';
$username = 'root'; // Usuário padrão do MySQL
$password = ''; // Senha (deixe em branco se não houver senha)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
