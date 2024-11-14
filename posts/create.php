<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Inserir o post no banco de dados
    $query = "INSERT INTO posts (title, content) VALUES (:title, :content)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();

    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<h1>Criar Novo Post</h1>

<form action="create.php" method="POST">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="content">Conteúdo:</label><br>
    <textarea id="content" name="content" rows="10" required></textarea><br><br>

    <button type="submit">Criar Post</button>
</form>

<a href="../index.php">Voltar para a página inicial</a>

<?php include '../includes/footer.php'; ?>

</body>
</html>
