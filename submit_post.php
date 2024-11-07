<?php
include 'app/db.conn.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "error";
    exit;
}

if (isset($_POST['content'])) {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Insertion dans la base de données
    $sql = "INSERT INTO posts (user_id, content, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$user_id, $content]);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
