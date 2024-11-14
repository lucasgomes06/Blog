<?php
include '../config.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Excluir o post
    $query = "DELETE FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);

    // Executar a exclusão
    if ($stmt->execute()) {
        // Redireciona de volta para a página inicial
        header('Location: ../index.php');
        exit();
    } else {
        // Se algo der errado
        echo "Erro ao excluir o post.";
    }
} else {
    echo "ID do post não fornecido.";
}
?>

    