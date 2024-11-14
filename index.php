<?php
include 'config.php';

// Buscar todos os posts
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$stmt = $pdo->query($query);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Blog</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<h1>Bem-vindo ao Meu Blog!</h1>

<a href="posts/create.php">Criar Novo Post</a>

<?php foreach ($posts as $post): ?>
    <div class="post">
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars(substr($post['content'], 0, 300))) . '...'; ?></p>
        <a href="post.php?id=<?php echo $post['id']; ?>">Leia mais</a> |
        <a href="posts/edit.php?id=<?php echo $post['id']; ?>">Editar</a> |
        <a href="posts/delete.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
    </div>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>

</body>
</html>
