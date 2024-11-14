<?php
include '../config.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Buscar o post para edição
    $query = "SELECT * FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Atualizar o post no banco de dados
    $query = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
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
    <title>Editar Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<h1>Editar Post</h1>

<form action="edit.php?id=<?php echo $post['id']; ?>" method="POST">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

    <label for="content">Conteúdo:</label><br>
    <textarea id="content" name="content" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

    <button type="submit">Atualizar Post</button>
</form>

<a href="../index.php">Voltar para a página inicial</a>

<?php include '../includes/footer.php'; ?>

</body>
</html>
