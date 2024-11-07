<?php
session_start();
include '../db.conn.php';

$message = $_POST['message'];
$file = $_FILES['file'];
$to_id = $_POST['to_id'];
$from_id = $_SESSION['user_id'];
$message_type = 'text';
$file_path = '';

// Gestion des fichiers
if ($file['size'] > 0) {
    $file_path = 'uploads/' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $file_path);

    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $message_type = 'image';
    } elseif (in_array($extension, ['mp4', 'avi', 'mov'])) {
        $message_type = 'video';
    } else {
        $message_type = 'file';
    }
}

$query = "INSERT INTO messages (from_id, to_id, content, file_path, message_type) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$from_id, $to_id, $message, $file_path, $message_type]);
?>
