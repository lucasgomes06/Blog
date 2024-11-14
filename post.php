<?php
include 'config.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Buscar o post
    $query = "SELECT * FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die('Post não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<h1><?php echo htmlspecialchars($post['title']); ?></h1>
<p><strong>Publicado em:</strong> <?php echo $post['created_at']; ?></p>
<p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

<a href="index.php">Voltar</a>

<?php include 'includes/footer.php'; ?>

</body>
</html>
